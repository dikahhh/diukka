<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sparepart;

class SparepartController extends Controller
{
     public function index()
     {
          if (!auth()->user()->can('sparepart.index')) {
               return redirect()->back()->with('error', 'Anda tidak memiliki izin ');
           }
          $spareparts = Sparepart::all();
          return view('backend.sparepart.index', compact('spareparts'));
     }

     public function create()
     {
          return view('backend.sparepart.create');
     }

     public function store(Request $request)
     {
          $request->validate([
               'nama'       => 'required|string',
               'stock'      => 'required|integer|min:0',
               'deskripsi'  => 'nullable|string',
               'image'      => 'nullable|image|max:2048',
          ]);
          $data = $request->all();
          if ($request->hasFile('image')) {
               $data['image'] = $request->file('image')->store('sparepart', 'public');
          }
          Sparepart::create($data);
          return redirect()->route('sparepart.index')->with('success', 'Sparepart berhasil ditambahkan.');
     }

     public function edit(Sparepart $sparepart)
     {
          return view('backend.sparepart.edit', compact('sparepart'));
     }

     public function update(Request $request, Sparepart $sparepart)
     {
          $request->validate([
               'nama'       => 'required|string',
               'stock'      => 'required|integer|min:0',
               'deskripsi'  => 'nullable|string',
               'image'      => 'nullable|image|max:2048',
          ]);
          $data = $request->all();
          if ($request->hasFile('image')) {
               $data['image'] = $request->file('image')->store('sparepart', 'public');
          }
          $sparepart->update($data);
          return redirect()->route('sparepart.index')->with('success', 'Sparepart berhasil diperbarui.');
     }


     public function destroy(Sparepart $sparepart)
     {
          $sparepart->delete();
          return redirect()->route('sparepart.index')->with('success', 'Sparepart berhasil dihapus.');
     }
}
