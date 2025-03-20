<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Libur;
use Illuminate\Http\Request;

class LiburController extends Controller
{
    public function index(Request $request)
    {
        // Default filter: bulan ini (format "YYYY-MM")
        $search = $request->input('search', \Carbon\Carbon::now()->format('Y-m'));

        $libur = \App\Models\Libur::where('tanggal', 'like', $search . '%')->orderby('tanggal', 'asc')->get();
        
        return view('backend.libur.index', compact('libur', 'search'));
    }

    public function create()
    {
        return view('backend.libur.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date|unique:libur,tanggal',
            'keterangan' => 'nullable|string'
        ]);
        Libur::create($request->only('tanggal', 'keterangan'));
        return redirect()->route('libur.index')->with('sukses selamat libur');
    }

    public function edit(Libur $libur)
    {
        return view('backend.libur.edit', compact('libur'));
    }

    public function update(Request $request, Libur $libur)
    {
        $request->validate([
            'tanggal' => 'required|date|unique:libur,tanggal,' . $libur->id,
            'keterangan' => 'nullable|string'
        ]);

        $libur->update($request->only('tanggal', 'keterangan'));
        return redirect()->route('libur.index')->with('sukses', 'Data libur berhasil diperbarui');
    }

    public function destroy(Libur $libur)
    {
        $libur->delete();
        return redirect()->route('libur.index')->with('yahh libur berkurang');
    }
}
