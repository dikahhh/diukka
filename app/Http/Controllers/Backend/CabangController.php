<?php

namespace App\Http\Controllers\Backend;

use App\Models\Cabang;
use App\Models\Tempat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CabangController extends Controller
{
    public function index()
    {
        if (!auth()->user()->can('cabang.index')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin ');
        }
        $cabangs = Cabang::with('tempat')->get(); // Ambil semua cabang beserta tempatnya
        return view('Backend.cabang.index', compact('cabangs'));
    }

    public function create()
    {
        return view('Backend.cabang.CreateCabang');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'tempat.*' => 'required|string', // Validasi tempat sebagai array
        ]);

        $cabang = Cabang::create(['nama' => $request->nama]);

        foreach ($request->tempat as $nama_tempat) {
            Tempat::create([
                'cabang_id' => $cabang->id,
                'nama_tempat' => $nama_tempat,
            ]);
        }

        return redirect()->route('cabang.index')->with('success', 'Cabang dan tempat berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $cabang = Cabang::with('tempat')->findOrFail($id);
        return view('backend.cabang.EditCabang', compact('cabang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'tempat.*' => 'required|string',
        ]);

        $cabang = Cabang::findOrFail($id);
        $cabang->update(['nama' => $request->nama]);

        // Hapus tempat lama dan tambahkan yang baru
        $cabang->tempat()->delete();

        foreach ($request->tempat as $nama_tempat) {
            Tempat::create([
                'cabang_id' => $cabang->id,
                'nama_tempat' => $nama_tempat,
            ]);
        }

        return redirect()->route('cabang.index')->with('success', 'Cabang dan tempat berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $cabang = Cabang::findOrFail($id);
        $cabang->delete();

        return redirect()->route('cabang.index')->with('success', 'Cabang berhasil dihapus');
    }
}
