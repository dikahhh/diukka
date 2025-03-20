<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sparepart;
use App\Models\TambahStockSparepart;

class TambahStockController extends Controller
{
    /**
     * Menampilkan daftar transaksi penambahan stock sparepart.
     */
    public function index()
    {
        if (!auth()->user()->can('stock.index')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin ');
        }
        // Ambil semua transaksi penambahan stock dengan relasi sparepart
        $tambahStocks = TambahStockSparepart::with('sparepart')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.tambah_stock.index', compact('tambahStocks'));
    }

    /**
     * Menampilkan form untuk penambahan stock sparepart.
     */
    public function create()
    {
        // Ambil semua sparepart agar user dapat memilih sparepart yang akan ditambah stocknya
        $spareparts = Sparepart::all();
        return view('backend.tambah_stock.create', compact('spareparts'));
    }

    /**
     * Menyimpan data penambahan stock sparepart.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sparepart_id' => 'required|exists:sparepart,id',
            'quantity'     => 'required|integer|min:1',
            'keterangan'   => 'nullable|string|max:255',
        ]);

        // Simpan data penambahan ke tabel tambah_stock_spareparts
        $tambahStock = TambahStockSparepart::create([
            'sparepart_id' => $request->sparepart_id,
            'quantity'     => $request->quantity,
            'keterangan'   => $request->keterangan,
            'user_id'      => auth()->id(), // Catat user yang melakukan transaksi
        ]);

        // Update kolom stock di tabel sparepart, tambahkan stock sesuai input
        $sparepart = Sparepart::findOrFail($request->sparepart_id);
        $sparepart->increment('stock', $request->quantity);

        return redirect()->route('stock.index')
            ->with('success', 'Stock sparepart berhasil ditambahkan.');
    }
}
