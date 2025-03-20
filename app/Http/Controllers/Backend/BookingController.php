<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Kendaraan;
use App\Models\Cabang;
use App\Models\Tempat;
use App\Models\Libur;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Menampilkan daftar booking berdasarkan tanggal.
     * Jika tidak ada parameter tanggal, maka default adalah hari ini.
     */
    public function index(Request $request)
    {
        if (!auth()->user()->can('booking.index')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin ');
        }
        $tanggal = $request->input('tanggal', Carbon::today()->format('Y-m-d'));

        $bookings = Booking::where('tanggal', $tanggal)
            ->orderBy('no_antrian', 'asc')
            ->get();

        return view('backend.booking.index', compact('bookings', 'tanggal'));
    }

    /**
     * Menampilkan form input booking baru.
     * Catatan: Tidak menampilkan input untuk jenis_service karena semua service berdurasi 1 jam.
     */
    public function create()
    {
        // Ambil data hari libur dari tabel Libur dan konversi ke array tanggal (format Y-m-d)
        $liburs = Libur::all();
        $holidayDates = $liburs->map(function($item) {
            return \Carbon\Carbon::parse($item->tanggal)->format('Y-m-d');
        })->toArray();

        $cabangs   = Cabang::all();
        $kendaraan = Kendaraan::where('ktp', Auth::user()->ktp)->get();
        $tempats   = []; // Akan dimuat via AJAX berdasarkan cabang yang dipilih

        // Hitung tanggal minimal untuk booking
        $now = \Carbon\Carbon::now('Asia/Jakarta');
        $minDate = $now->hour >= 17 ? $now->copy()->addDay()->format('Y-m-d') : $now->format('Y-m-d');

        // Ambil daftar no_plat yang sudah terbooking pada tanggal $minDate
        $bookedNoPlat = Booking::where('tanggal', $minDate)->pluck('kendaraan')->toArray();

        // Hitung available times (slot waktu booking)
        $bookingDate = $minDate;
        $startOfDay = \Carbon\Carbon::parse($bookingDate . ' 07:00');
        $endOfDay   = \Carbon\Carbon::parse($bookingDate . ' 17:00');
        $latest     = $endOfDay->copy()->subHour();
        $availableTimes = [];
        $time = $startOfDay->copy();
        while ($time->lte($latest)) {
            // Cek konflik booking untuk slot tersebut
            $conflict = Booking::where('tanggal', $bookingDate)
                ->where('waktu', 'like', $time->format('H:i') . '%')
                ->exists();
            if (!$conflict) {
                $availableTimes[] = $time->format('H:i');
            }
            $time->addHour();
        }

        return view('backend.booking.CreateBooking', compact(
            'cabangs',
            'tempats',
            'kendaraan',
            'minDate',
            'bookedNoPlat',
            'availableTimes',
            'holidayDates'
        ));
    }


    public function createformadmin()
    {
        $cabangs   = Cabang::all();
        $kendaraan = Kendaraan::all();
        $tempats   = []; // Akan dimuat via AJAX berdasarkan cabang yang dipilih

        // Hitung tanggal minimal untuk booking
        $now = \Carbon\Carbon::now('Asia/Jakarta');
        $minDate = $now->hour >= 17 ? $now->copy()->addDay()->format('Y-m-d') : $now->format('Y-m-d');

        $allKTP = Kendaraan::select('ktp')->distinct()->get();
        $tanggal = old('tanggal', date('Y-m-d'));

        return view('backend.booking.CreateBookingFormAdmin', compact('cabangs', 'tempats', 'kendaraan', 'minDate', 'allKTP', 'tanggal'));
    }

    /**
     * Mengambil data Tempat berdasarkan cabang yang dipilih (dipanggil via AJAX).
     */
    public function getTempatByCabang($cabangId)
    {
        $tempats = Tempat::where('cabang_id', $cabangId)->get();
        return response()->json($tempats);
    }

    /**
     * Menyimpan booking baru ke database.
     * Waktu akan diisi secara otomatis dengan durasi 1 jam.
     */
    public function store(Request $request)
    {
        $request->validate([
            'keluhan'    => 'nullable|string',
            'cabang_id'  => 'required|exists:cabang,id',
            'tempat_id'  => 'required|exists:tempat,id',
            'no_plat'    => 'required|exists:kendaraan,no_plat',
            'tanggal'    => 'required|date',
        ]);

        // Hitung tanggal minimum booking berdasarkan waktu saat ini
        $now = Carbon::now();
        $minBookingDate = $now->hour >= 17 ? $now->copy()->addDay()->format('Y-m-d') : $now->format('Y-m-d');

        // Pastikan satu kendaraan hanya memiliki 1 jadwal booking per hari
        $existingBooking = Booking::where('kendaraan', $request->no_plat)
            ->where('tanggal', $request->tanggal)
            ->first();

        if ($existingBooking) {
            return redirect()->back()->withErrors([
                'no_plat' => 'Kendaraan ini sudah memiliki jadwal booking pada tanggal tersebut.'
            ]);
        }

        // Tentukan nomor antrian berdasarkan booking yang sudah ada pada tanggal tersebut
        $lastBookingForDate = Booking::where('tanggal', $request->tanggal)
            ->orderBy('no_antrian', 'desc')
            ->first();
        $no_antrian = $lastBookingForDate ? $lastBookingForDate->no_antrian + 1 : 1;

        $cabangData = Cabang::find($request->cabang_id);
        $tempatData = Tempat::find($request->tempat_id);
        $kendaraanData = Kendaraan::where('no_plat', $request->no_plat)->first();

        // Saat membuat booking, kolom waktu diset null
        Booking::create([
            'jenis_service' => null,
            'keluhan'       => $request->keluhan,
            'cabang'        => $cabangData ? $cabangData->nama : '',
            'tempat'        => $tempatData ? $tempatData->nama_tempat : '',
            'tanggal'       => $request->tanggal,
            'kendaraan'     => $kendaraanData ? $kendaraanData->no_plat : '',
            'ktp'           => Auth::user()->ktp,
            'no_antrian'    => $no_antrian,
            'status'        => 'waiting',
            'waktu'         => null,
        ]);

        // Log aktivitas input booking
        activity()
            ->causedBy(auth()->user())
            ->log('Menginput booking dengan No Plat: ' . ($kendaraanData ? $kendaraanData->no_plat : 'N/A'));


        return redirect()->route('frontend.index')->with('success', 'Data berhasil ditambahkan.');
    }


    public function storeFormAdmin(Request $request)
    {
        $request->validate([
            'keluhan'    => 'nullable|string',
            'cabang_id'  => 'required|exists:cabang,id',
            'tempat_id'  => 'required|exists:tempat,id',
            'no_plat'    => 'required|exists:kendaraan,no_plat', // pastikan validasi ini menggunakan kolom no_plat
            'tanggal'    => 'required|date',
        ]);

        // Hapus pembatasan satu kendaraan hanya memiliki 1 booking per hari
        // $existingBooking = Booking::where('kendaraan', $request->no_plat)
        //     ->where('tanggal', $request->tanggal)
        //     ->first();
        //
        // if ($existingBooking) {
        //     return redirect()->back()->withErrors([
        //         'no_plat' => 'Kendaraan ini sudah memiliki jadwal booking pada tanggal tersebut.'
        //     ]);
        // }

        // Hitung tanggal minimum booking berdasarkan waktu saat ini
        $now = Carbon::now();
        $minBookingDate = $now->hour >= 17 ? $now->copy()->addDay()->format('Y-m-d') : $now->format('Y-m-d');

        // Tentukan nomor antrian berdasarkan booking yang sudah ada pada tanggal tersebut
        $lastBookingForDate = Booking::where('tanggal', $request->tanggal)
            ->orderBy('no_antrian', 'desc')
            ->first();
        $no_antrian = $lastBookingForDate ? $lastBookingForDate->no_antrian + 1 : 1;

        $cabangData = Cabang::find($request->cabang_id);
        $tempatData = Tempat::find($request->tempat_id);
        $kendaraanData = Kendaraan::where('no_plat', $request->no_plat)->first();

        // Saat membuat booking, kolom waktu diisi null terlebih dahulu
        Booking::create([
            'jenis_service' => null,
            'keluhan'       => $request->keluhan,
            'cabang'        => $cabangData ? $cabangData->nama : '',
            'tempat'        => $tempatData ? $tempatData->nama_tempat : '',
            'tanggal'       => $request->tanggal,
            'kendaraan'     => $kendaraanData ? $kendaraanData->no_plat : '',
            'ktp'           => auth()->user()->ktp,
            'no_antrian'    => $no_antrian,
            'status'        => 'waiting',
            'waktu'         => null,
        ]);

        // Log aktivitas edit booking
        activity()
            ->causedBy(auth()->user())
            ->log('Menginput booking dengan No Plat: ' . ($kendaraanData ? $kendaraanData->no_plat : 'N/A'));


        return redirect()->route('booking.index')->with('success', 'Data berhasil ditambahkan.');
    }



    /**
     * Menampilkan form edit booking.
     */
    public function edit(Booking $booking)
    {
        $cabangs    = Cabang::all();
        $kendaraans = Kendaraan::all();
        // Mengambil Tempat berdasarkan cabang pada booking
        $tempats = Tempat::where('cabang_id', function ($query) use ($booking) {
            $query->select('id')->from('cabang')->where('nama', $booking->cabang)->limit(1);
        })->get();

        return view('backend.booking.EditBooking', compact('booking', 'cabangs', 'tempats', 'kendaraans'));
    }

    /**
     * Memperbarui booking secara umum.
     * Waktu tidak diupdate otomatis di sini; hanya informasi lain yang bisa diubah.
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'keluhan'       => 'nullable|string',
            'cabang_id'     => 'required|exists:cabang,id',
            'tempat_id'     => 'required|exists:tempat,id',
            'no_mesin'     => 'required|exists:kendaraan,id',
            'tanggal'       => 'required|date',
            'status'        => 'required|in:waiting,aprove,belum dikerjakan,dikerjakan,selesai'
        ]);

        $cabangData    = Cabang::find($request->cabang_id);
        $tempatData    = Tempat::find($request->tempat_id);
        $kendaraanData = Kendaraan::find($request->no_mesin);

        $booking->update([
            'keluhan'    => $request->keluhan,
            'cabang'     => $cabangData ? $cabangData->nama : '',
            'tempat'     => $tempatData ? $tempatData->nama_tempat : '',
            'tanggal'    => $request->tanggal,
            'status'     => $request->status,
            // Untuk update, Anda bisa menyimpan informasi kendaraan sesuai kebutuhan (misalnya merk)
            'kendaraan'  => $kendaraanData ? $kendaraanData->merk : '',
        ]);

        // Log aktivitas edit booking
        activity()
            ->causedBy(auth()->user())
            ->log('Mengedit booking dengan No Plat: ' . ($kendaraanData ? $kendaraanData->no_plat : 'N/A'));


        return redirect()->route('frontend.index')->with('success', 'Data berhasil ditambahkan.');
    }


    public function updateWaktu(Request $request, Booking $booking)
    {
        // Validasi input waktu: jika diisi, harus dalam format "H:i"
        $request->validate([
            'waktu' => 'nullable|date_format:H:i',
        ]);

        // Set status booking secara otomatis ke "aprove"
        $updateData = ['status' => 'aprove'];

        if ($request->filled('waktu')) {
            $selectedStart = $request->waktu;
            $startTime = \Carbon\Carbon::createFromFormat('H:i', $selectedStart, 'Asia/Jakarta');
            $finishTime = $startTime->copy()->addHour();
            $updateData['waktu'] = $startTime->format('H:i') . ' - ' . $finishTime->format('H:i');
        } else {
            $updateData['waktu'] = $booking->waktu;
        }

        $booking->update($updateData);

        return redirect()->route('booking.index')->with('success', 'Status dan waktu booking berhasil diperbarui.');
    }


    public function getAllWaktuSlots($tanggal)
    {
        $zone = 'Asia/Jakarta';
        $slots = [];

        // Tentukan waktu awal (07:00) dan waktu akhir (slot terakhir dimulai pukul 16:00)
        $startTime = \Carbon\Carbon::parse($tanggal . ' 07:00', $zone);
        $endTime   = \Carbon\Carbon::parse($tanggal . ' 17:00', $zone)->subHour();

        // Buat slot setiap 30 menit
        while ($startTime->lte($endTime)) {
            $slots[] = $startTime->format('H:i');
            $startTime->addMinutes(30);
        }

        return $slots;
    }





    /**
     * Memperbarui status booking saja.
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:waiting,aprove,belum dikerjakan,dikerjakan,selesai',
            'waktu'  => 'nullable|date_format:H:i', // input opsional
        ]);

        $updateData = ['status' => $request->status];
        $tanggal = $booking->tanggal;
        $zone = 'Asia/Jakarta';

        // Tentukan batas operasional
        $operationalStart = \Carbon\Carbon::parse($tanggal . ' 07:00', $zone);
        $operationalEnd   = \Carbon\Carbon::parse($tanggal . ' 17:00', $zone);

        if ($request->status === 'aprove') {
            if ($tanggal == \Carbon\Carbon::today($zone)->format('Y-m-d')) {
                $now = \Carbon\Carbon::now($zone);
                if ($now->lt($operationalStart)) {
                    // Jika sebelum operasional, gunakan jam 07:00
                    $proposedStart = $operationalStart;
                } else {
                    // Tambahkan 30 menit ke waktu saat ini
                    $proposedStart = $now->copy()->addMinutes(30);
                    // Lakukan pembulatan ke kelipatan 30 menit
                    $minute = $proposedStart->minute;
                    $mod = $minute % 30;
                    if ($mod > 0) {
                        $proposedStart->addMinutes(30 - $mod);
                    }
                    $proposedStart->second = 0;
                }
                if ($proposedStart->gte($operationalEnd)) {
                    return redirect()->back()->with('error', 'Tidak ada slot waktu yang tersedia untuk hari ini.');
                }

                $formattedStart = $proposedStart->format('H:i');
                $conflict = Booking::where('tanggal', $tanggal)
                    ->where('waktu', 'like', $formattedStart . '%')
                    ->where('id', '!=', $booking->id)
                    ->exists();
                if ($conflict) {
                    // Jika slot yang diusulkan sudah digunakan, cari slot berikutnya yang tersedia
                    $availableSlots = $this->getWaktuTersedia($tanggal, $booking);
                    $filteredSlots = array_filter($availableSlots, function ($slot) use ($proposedStart, $zone) {
                        $slotTime = \Carbon\Carbon::createFromFormat('H:i', $slot, $zone);
                        return $slotTime->gte($proposedStart);
                    });
                    if (!empty($filteredSlots)) {
                        $selectedSlot = array_shift($filteredSlots);
                        $startTime = \Carbon\Carbon::createFromFormat('H:i', $selectedSlot, $zone);
                    } else {
                        return redirect()->back()->with('error', 'Tidak ada slot waktu yang tersedia untuk hari ini.');
                    }
                } else {
                    $startTime = $proposedStart;
                }
            } else {
                // Untuk tanggal selain hari ini, ambil slot waktu paling awal yang tersedia
                $availableSlots = $this->getWaktuTersedia($tanggal, $booking);
                if (empty($availableSlots)) {
                    return redirect()->back()->with('error', 'Tidak ada slot waktu yang tersedia untuk tanggal ini.');
                }
                $startTime = \Carbon\Carbon::createFromFormat('H:i', $availableSlots[0], $zone);
            }

            // Durasi booking tetap 1 jam
            $finishTime = $startTime->copy()->addHour();
            if ($finishTime->gt($operationalEnd)) {
                $finishTime = $operationalEnd;
            }
            $updateData['waktu'] = $startTime->format('H:i') . ' - ' . $finishTime->format('H:i');
        }

        $booking->update($updateData);
        return redirect()->route('booking.index')->with('success', 'Status booking berhasil diperbarui.');
    }



    /**
     * Mengembalikan slot waktu (start time) yang tersedia dengan durasi 1 jam
     * dari jam 07:00 hingga 16:00 untuk tanggal tertentu.
     */
    private function getWaktuTersedia($tanggal, Booking $currentBooking = null)
    {
        $zone = 'Asia/Jakarta';
        $availableSlots = [];
        $operationalStart = \Carbon\Carbon::parse($tanggal . ' 07:00', $zone);
        $operationalEnd   = \Carbon\Carbon::parse($tanggal . ' 17:00', $zone);
        // Karena booking berdurasi 1 jam, slot terakhir dimulai paling lambat adalah operasionalEnd dikurangi 1 jam.
        $latestStart = $operationalEnd->copy()->subHour();
        $time = $operationalStart->copy();

        while ($time->lte($latestStart)) {
            $slotStart = $time->format('H:i');
            $query = Booking::where('tanggal', $tanggal)
                ->where('waktu', 'like', $slotStart . '%');
            if ($currentBooking) {
                $query->where('id', '!=', $currentBooking->id);
            }
            if (!$query->exists()) {
                $availableSlots[] = $slotStart;
            }
            $time->addMinutes(30);
        }
        return $availableSlots;
    }




    /**
     * Menghapus booking.
     */
    public function destroy(Booking $booking)
    {
        // Log aktivitas hapus booking
        activity()
            ->causedBy(auth()->user())
            ->log('Menghapus booking dengan No Plat: ' . $booking->kendaraan);

        $booking->delete();
        return redirect()->route('booking.index')->with('success', 'Booking berhasil dihapus.');
    }


    public function selesaikan(Booking $booking)
    {
        if ($booking->status !== 'selesai') {
            return redirect()->route('booking.index')->with('error', 'Booking belum berstatus selesai.');
        }

        $karyawans  = \App\Models\Karyawan::all();
        $spareparts = \App\Models\Sparepart::all();
        $services   = \App\Models\Service::all();  // Ambil data service dari tabel service

        return view('backend.booking.Finalisasi', compact('booking', 'karyawans', 'spareparts', 'services'));
    }


    /**
     * Menampilkan form penyelesaian booking.
     */
    public function storeSelesai(Request $request, Booking $booking)
    {
        $request->validate([
            'karyawan_id'             => 'required|exists:karyawan,id',
            'spareparts_id'           => 'nullable|array',
            'spareparts_id.*'         => 'nullable|exists:sparepart,id',
            'quantities'              => 'nullable|array',
            'quantities.*'            => 'nullable|integer|min:1',
            'additional_descriptions' => 'nullable|array',
            'additional_amounts'      => 'nullable|array',
            'additional_amounts.*'    => 'nullable|numeric|min:0',
            'catatan'                 => 'nullable|string',
            'jenis_service'           => 'required|string', // jenis_service harus diisi dari dropdown
        ]);

        // Hitung total harga sparepart 
        $totalSparepartPrice = 0;
        $sparepartsInput = $request->input('spareparts_id', []);
        $quantities = $request->input('quantities', []);
        if (is_array($sparepartsInput) && is_array($quantities)) {
            foreach ($sparepartsInput as $index => $sparepart_id) {
                if (!empty($sparepart_id) && isset($quantities[$index]) && $quantities[$index] > 0) {
                    $sparepart = \App\Models\Sparepart::find($sparepart_id);
                    if ($sparepart) {
                        $qty = (float)$quantities[$index];
                        $totalSparepartPrice += $sparepart->harga * $qty;
                    }
                }
            }
        }

        // Proses dana tambahan (jika ada)
        $additionalAmounts = $request->input('additional_amounts', []);
        $additionalDescriptions = $request->input('additional_descriptions', []);
        $totalAdditional = 0;
        $additionalDetails = [];
        if (is_array($additionalAmounts)) {
            foreach ($additionalAmounts as $index => $amt) {
                $amount = is_numeric($amt) ? (float)$amt : 0;
                $totalAdditional += $amount;
                $desc = isset($additionalDescriptions[$index]) ? $additionalDescriptions[$index] : '';
                $additionalDetails[] = ['description' => $desc, 'amount' => $amount];
            }
        }

        // Ambil harga service dari tabel service
        $service = \App\Models\Service::where('jenis_service', $request->input('jenis_service'))->first();
        $servicePrice = $service ? $service->harga : 0;

        // Total harga adalah jumlah sparepart + dana tambahan + harga service
        $totalHarga = $totalSparepartPrice + $totalAdditional + $servicePrice;

        // Siapkan data untuk disimpan ke riwayat, ambil data tambahan dari booking
        $data = [
            'jenis_service' => $request->input('jenis_service'),
            'tanggal'       => $booking->tanggal,      // ambil dari booking
            'karyawan_id'   => $request->karyawan_id,
            'catatan'       => $request->catatan,
            'keluhan'       => $booking->keluhan,        // ambil dari booking
            'cabang'        => $booking->cabang,         // ambil dari booking
            'tempat'        => $booking->tempat,         // ambil dari booking
            'no_antrian'    => $booking->no_antrian,     // ambil dari booking
            'ktp'           => $booking->ktp,            // ambil dari booking
            'kendaraan'     => $booking->kendaraan,      // ambil dari booking
        ];
        $data['harga'] = $totalHarga;
        $data['dana_tambahan'] = $totalAdditional;
        $data['dana_tambahan_deskripsi'] = json_encode($additionalDetails);
        // Simpan juga harga service (jika dibutuhkan)
        $data['harga_service'] = $servicePrice;

        // Buat record Riwayat baru
        $riwayat = \App\Models\Riwayat::create($data);

        // Attach spareparts jika ada input
        if (is_array($sparepartsInput) && is_array($quantities)) {
            foreach ($sparepartsInput as $index => $sparepart_id) {
                if (!empty($sparepart_id) && isset($quantities[$index]) && $quantities[$index] > 0) {
                    $qty = (float)$quantities[$index];
                    $sparepart = \App\Models\Sparepart::find($sparepart_id);
                    if ($sparepart) {
                        // Update stok sparepart
                        $newStock = $sparepart->stock - $qty;
                        if ($newStock < 0) {
                            throw new \Exception("Stok sparepart {$sparepart->nama} tidak mencukupi.");
                        }
                        $sparepart->update(['stock' => $newStock]);
                        $riwayat->spareparts()->attach($sparepart_id, ['quantity' => $qty]);
                    }
                }
            }
        }

        // Hapus booking setelah finalisasi
        $booking->delete();

        return redirect()->route('booking.index')->with('success', 'Booking telah diselesaikan dan dipindahkan ke riwayat.');
    }
}
