<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function create()
    {
        return view('backend.kendaraan.CreateKendaraan');
    }

    public function getByKTP($ktp)
    {
        $kendaraan = Kendaraan::where('ktp', $ktp)->get();
        return response()->json($kendaraan);
    }

    public function store(Request $request)
    {
        // Validasi data input termasuk no_mesin
        $validated = $request->validate([
            'no_plat'   => 'required|string|unique:kendaraan,no_plat',
            'merk'      => 'required|string',
            'tipe'      => 'required|string',
            'transmisi' => 'required|string',
            'tahun'     => 'required|integer|min:1900|max:' . date('Y'),
            'no_mesin'  => 'required|string|unique:kendaraan,no_mesin',
            'ktp'       => 'required|integer|exists:users,ktp',
            'cc'        => 'required|integer|min:0',
        ]);

        // Menyimpan data ke database
        Kendaraan::create($validated);

        // Log aktivitas tambah kendaraan
        activity()
            ->causedBy(auth()->user())
            ->log('Menambah kendaraan dengan No Plat: ' . $validated['no_plat']);

        // Redirect dengan pesan sukses
        return redirect()->route('frontend.index')->with('success', 'Data kendaraan berhasil ditambahkan.');
    }

    public function index()
    {
        if (!auth()->user()->can('kendaraan.index')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk melihat daftar kendaraan.');
        }
        $kendaraan = Kendaraan::all();
        return view('backend.kendaraan.index', compact('kendaraan'));
    }

    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();


        $noPlat = $kendaraan->no_plat;
        // Log aktivitas hapus kendaraan
        activity()
            ->causedBy(auth()->user())
            ->log('Menghapus kendaraan dengan No Plat: ' . $noPlat);

        return redirect()->route('kendaraan.index')->with('success', 'Data kendaraan berhasil dihapus.');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id); // Cari data berdasarkan ID
        return view('backend.kendaraan.EditKendaraan', compact('kendaraan')); // Tampilkan form edit
    }

    // Update data kendaraan
    public function update(Request $request, $id)
    {
        // Validasi data input termasuk no_mesin
        $validated = $request->validate([
            'no_plat'   => 'required|string|unique:kendaraan,no_plat,' . $id,
            'merk'      => 'required|string',
            'tipe'      => 'required|string',
            'transmisi' => 'required|string',
            'tahun'     => 'required|integer|min:1900|max:' . date('Y'),
            'no_mesin'  => 'required|string|unique:kendaraan,no_mesin,' . $id,
            'ktp'       => 'required|integer|exists:users,ktp',
            'cc'        => 'required|integer|min:0',
        ]);

        // Cari data kendaraan dan update
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->update($validated);

        // Log aktivitas edit kendaraan
        activity()
            ->causedBy(auth()->user())
            ->log('Mengedit kendaraan dengan No Plat: ' . $validated['no_plat']);

        // Redirect dengan pesan sukses
        return redirect()->route('frontend.index')->with('success', 'Data kendaraan berhasil diperbarui.');
    }
}
