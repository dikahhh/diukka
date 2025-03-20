<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Riwayat;
use App\Models\Sparepart;
use App\Models\Service;
use Illuminate\Support\Facades\Log;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        if (!auth()->user()->can('riwayat.index')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin ');
        }

        $search = $request->input('search', \Carbon\Carbon::today()->format('Y-m-d'));

        if ($search) {
            // Lakukan pencarian berdasarkan kolom-kolom yang relevan
            $riwayats = Riwayat::where('ktp', 'LIKE', "%{$search}%")
                ->orWhere('kendaraan', 'LIKE', "%{$search}%")
                ->orWhere('jenis_service', 'LIKE', "%{$search}%")
                ->orWhere('tanggal', 'LIKE', "%{$search}%")
                ->orWhereHas('kendaraanRel', function ($query) use ($search) {
                    $query->where('merk', 'LIKE', "%{$search}%");
                })
                ->orWhereHas('karyawan', function ($query) use ($search) {
                    $query->where('nama', 'LIKE', "%{$search}%");
                })
                ->with('karyawan')
                ->latest()
                ->get();
        }
        return view('backend.riwayat.index', compact('riwayats', 'search'));
    }

    public function Invoice(Riwayat $riwayat)
    {
        $kendaraanData = \App\Models\Kendaraan::where('no_plat', $riwayat->kendaraan)->first();
        return view('backend.riwayat.invoice', compact('riwayat', 'kendaraanData'));
    }

    public function create()
    {
        $cabangs = \App\Models\Cabang::all();
        $karyawans = \App\Models\Karyawan::all();
        $spareparts = \App\Models\Sparepart::all();
        $services   = \App\Models\Service::all(); // Ambil data service untuk dropdown
        return view('backend.riwayat.create', compact('karyawans', 'spareparts', 'services', 'cabangs'));
    }

    public function store(Request $request)
    {
        // Validasi semua input agar tidak ada kolom yang kosong
        $request->validate([
            'jenis_service' => 'required|string',
            'tanggal'       => 'required|date',
            'karyawan_id'   => 'required|exists:karyawan,id',
            'catatan'       => 'nullable|string',
            'keluhan'       => 'required|string',
            'cabang'        => 'required|string',
            'tempat'        => 'required|string',
            'no_antrian'    => 'required|integer',
            'ktp'           => 'required|string',
            'kendaraan'     => 'required|string',
            'harga_service' => 'required|numeric',
        ]);

        try {
            // Hitung total harga sparepart
            $totalSparepartPrice = 0;
            $sparepartsInput = $request->input('spareparts_id', []);
            $quantities = $request->input('quantities', []);
            foreach ($sparepartsInput as $index => $sparepart_id) {
                if (!empty($sparepart_id) && isset($quantities[$index]) && $quantities[$index] > 0) {
                    $sparepart = Sparepart::find($sparepart_id);
                    if ($sparepart) {
                        $qty = (float)$quantities[$index];
                        $totalSparepartPrice += $sparepart->harga * $qty;
                    }
                }
            }

            // Proses dana tambahan dan deskripsinya
            $additionalAmounts = $request->input('additional_amounts', []);
            $additionalDescriptions = $request->input('additional_descriptions', []);
            $totalAdditional = 0;
            $additionalDetails = [];
            foreach ($additionalAmounts as $index => $amt) {
                $amount = is_numeric($amt) ? (float)$amt : 0;
                $totalAdditional += $amount;
                $desc = isset($additionalDescriptions[$index]) ? $additionalDescriptions[$index] : '';
                $additionalDetails[] = ['description' => $desc, 'amount' => $amount];
            }

            // Total harga adalah spareparts + dana tambahan + harga service
            $totalHarga = $totalSparepartPrice + $totalAdditional + $request->input('harga_service');

            // Siapkan data untuk disimpan ke tabel riwayat
            $data = $request->only([
                'jenis_service',
                'tanggal',
                'karyawan_id',
                'catatan',
                'keluhan',
                'cabang',
                'tempat',
                'no_antrian',
                'ktp',
                'kendaraan',
                'harga_service'
            ]);
            $data['harga'] = $totalHarga;
            $data['dana_tambahan'] = $totalAdditional;
            $data['dana_tambahan_deskripsi'] = json_encode($additionalDetails);

            // Buat record Riwayat baru
            $riwayat = Riwayat::create($data);

            // Attach spareparts dengan quantity masing-masing
            foreach ($sparepartsInput as $index => $sparepart_id) {
                if (!empty($sparepart_id) && isset($quantities[$index]) && $quantities[$index] > 0) {
                    $qty = (float)$quantities[$index];
                    $riwayat->spareparts()->attach($sparepart_id, ['quantity' => $qty]);
                }
            }

            return redirect()->route('riwayat.index')->with('success', 'Riwayat berhasil dibuat.');
        } catch (\Exception $e) {
            Log::error('Error saat menyimpan riwayat: ' . $e->getMessage(), $request->all());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function updateStatus(Request $request, Riwayat $riwayat)
    {
        $request->validate([
            'status' => 'required|string'
        ]);

        $riwayat->update([
            'status' => $request->status
        ]);

        return redirect()->route('riwayat.index')->with('success', 'Status berhasil diperbarui.');
    }

    public function edit(Riwayat $riwayat)
    {
        $karyawans = \App\Models\Karyawan::all();
        $spareparts = Sparepart::all();
        return view('backend.riwayat.edit', compact('riwayat', 'karyawans', 'spareparts'));
    }

    public function update(Request $request, Riwayat $riwayat)
    {
        $request->validate([
            'jenis_service' => 'required|string',
            'tanggal'       => 'required|date',
            'karyawan_id'   => 'required|exists:karyawan,id',
            'catatan'       => 'nullable|string',
        ]);

        try {
            // Lepaskan data spareparts lama
            $riwayat->spareparts()->detach();

            // Hitung ulang total harga sparepart
            $totalSparepartPrice = 0;
            $sparepartsInput = $request->input('spareparts_id', []);
            $quantities = $request->input('quantities', []);
            foreach ($sparepartsInput as $index => $sparepart_id) {
                if (!empty($sparepart_id) && isset($quantities[$index]) && $quantities[$index] > 0) {
                    $sparepart = Sparepart::find($sparepart_id);
                    if ($sparepart) {
                        $qty = (float)$quantities[$index];
                        $totalSparepartPrice += $sparepart->harga * $qty;
                    }
                }
            }

            // Proses dana tambahan dan deskripsinya
            $additionalAmounts = $request->input('additional_amounts', []);
            $additionalDescriptions = $request->input('additional_descriptions', []);
            $totalAdditional = 0;
            $additionalDetails = [];
            foreach ($additionalAmounts as $index => $amt) {
                $amount = is_numeric($amt) ? (float)$amt : 0;
                $totalAdditional += $amount;
                $desc = isset($additionalDescriptions[$index]) ? $additionalDescriptions[$index] : '';
                $additionalDetails[] = ['description' => $desc, 'amount' => $amount];
            }

            // Hitung total harga keseluruhan
            $totalHarga = $totalSparepartPrice + $totalAdditional;

            // Siapkan data untuk update
            $data = $request->only(['jenis_service', 'tanggal', 'karyawan_id', 'catatan']);
            $data['harga'] = $totalHarga;
            $data['dana_tambahan'] = $totalAdditional;
            $data['dana_tambahan_deskripsi'] = json_encode($additionalDetails);

            $riwayat->update($data);

            // Reattach spareparts dengan quantity masing-masing
            foreach ($sparepartsInput as $index => $sparepart_id) {
                if (!empty($sparepart_id) && isset($quantities[$index]) && $quantities[$index] > 0) {
                    $qty = (float)$quantities[$index];
                    $riwayat->spareparts()->attach($sparepart_id, ['quantity' => $qty]);
                }
            }

            return redirect()->route('riwayat.index')->with('success', 'Riwayat berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Error saat mengupdate riwayat: ' . $e->getMessage(), $request->all());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function destroy(Riwayat $riwayat)
    {
        try {
            $riwayat->delete();
            return redirect()->route('riwayat.index')->with('success', 'Riwayat berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Error saat menghapus riwayat: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }

    public function laporanKeuangan(Request $request)
    {
        $start_date = $request->input('start_date') ?: \Carbon\Carbon::now()->startOfMonth()->format('Y-m-d');
        $end_date   = $request->input('end_date') ?: \Carbon\Carbon::now()->endOfMonth()->format('Y-m-d');

        $riwayats = \App\Models\Riwayat::whereBetween('tanggal', [$start_date, $end_date])->get();

        $totalHargaService  = $riwayats->sum('harga_service');
        $totalSpareparts    = $riwayats->sum('harga');
        $totalDanaTambahan  = $riwayats->sum('dana_tambahan');
        $totalPendapatan    = $totalHargaService + $totalSpareparts + $totalDanaTambahan;

        return view('backend.riwayat.laporan', compact(
            'riwayats',
            'start_date',
            'end_date',
            'totalHargaService',
            'totalSpareparts',
            'totalDanaTambahan',
            'totalPendapatan'
        ));
    }

    public function exportCsv(Request $request)
    {
        // Ambil filter tanggal atau gunakan default
        $start_date = $request->input('start_date', now()->startOfMonth()->format('Y-m-d'));
        $end_date   = $request->input('end_date', now()->endOfMonth()->format('Y-m-d'));

        // Ambil data laporan berdasarkan filter tanggal
        $riwayats = \App\Models\Riwayat::whereBetween('tanggal', [$start_date, $end_date])->get();

        // Header file CSV dengan charset UTF-8
        $headers = [
            'Content-type'        => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename=laporan_keuangan.csv',
            'Pragma'              => 'no-cache',
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Expires'             => '0'
        ];

        // Callback untuk menulis data CSV
        $callback = function () use ($riwayats) {
            $file = fopen('php://output', 'w');
            // Tambahkan BOM agar Excel mengenali file sebagai UTF-8
            fputs($file, "\xEF\xBB\xBF");
            // Tulis header kolom dengan delimiter titik koma
            fputcsv($file, ['#', 'Tanggal', 'No Plat', 'Service', 'Harga Service', 'Harga Sparepart', 'Dana Tambahan', 'Total'], ';');

            // Tulis data tiap baris
            foreach ($riwayats as $index => $riwayat) {
                $total = $riwayat->harga + $riwayat->harga_service + $riwayat->dana_tambahan;
                fputcsv($file, [
                    $index + 1,
                    $riwayat->tanggal,
                    $riwayat->kendaraan,
                    $riwayat->jenis_service,
                    number_format($riwayat->harga_service, 2, ',', '.'),
                    number_format($riwayat->harga, 2, ',', '.'),
                    number_format($riwayat->dana_tambahan, 2, ',', '.'),
                    number_format($total, 2, ',', '.'),
                ], ';');
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
