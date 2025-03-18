<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
     public function index()
     {
          if (!auth()->user()->can('karyawan.index')) {
               return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk melihat daftar booking.');
           }
          $karyawans = Karyawan::all();
          return view('backend.karyawan.index', compact('karyawans'));
     }

     public function create()
     {
          return view('backend.karyawan.create');
     }

     public function store(Request $request)
     {
          $request->validate([
               'nama'     => 'required|string',
               'email'    => 'required|email|unique:karyawan,email',
               'umur'     => 'required|integer|min:0',
               'alamat'   => 'required|string',
               'no_telp'  => 'required|string',
               'gender'   => 'required|in:male,female,other',
               'image'    => 'nullable|image|max:2048'
          ]);
          $data = $request->all();
          if ($request->hasFile('image')) {
               $data['image'] = $request->file('image')->store('karyawan', 'public');
          }
          Karyawan::create($data);
          return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
     }

     public function edit(Karyawan $karyawan)
     {
          return view('backend.karyawan.edit', compact('karyawan'));
     }

     public function update(Request $request, Karyawan $karyawan)
     {
          $request->validate([
               'nama'     => 'required|string',
               'email'    => 'required|email|unique:karyawan,email,' . $karyawan->id,
               'umur'     => 'required|integer|min:0',
               'alamat'   => 'required|string',
               'no_telp'  => 'required|string',
               'gender'   => 'required|in:male,female,other',
               'image'    => 'nullable|image|max:2048'
          ]);
          $data = $request->all();
          if ($request->hasFile('image')) {
               $data['image'] = $request->file('image')->store('karyawan', 'public');
          }
          $karyawan->update($data);
          return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diperbarui.');
     }


     public function destroy(Karyawan $karyawan)
     {
          $karyawan->delete();
          return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus.');
     }
}
