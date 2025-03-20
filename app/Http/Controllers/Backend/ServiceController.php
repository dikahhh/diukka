<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Menampilkan daftar service.
     */
    public function index()
    {
        if (!auth()->user()->can('Service.index')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin ');
        }
        $services = Service::all();
        return view('backend.service.index', compact('services'));
    }

    /**
     * Menampilkan form untuk membuat service baru.
     */
    public function create()
    {
        return view('backend.service.create');
    }

    /**
     * Menyimpan service baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_service' => 'required|unique:service,jenis_service',
            'harga'         => 'required|numeric|min:0',
        ]);

        Service::create($request->only(['jenis_service', 'harga']));

        return redirect()->route('service.index')->with('success', 'Service berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail service (opsional).
     */
    public function show(Service $service)
    {
        return view('backend.service.show', compact('service'));
    }

    /**
     * Menampilkan form edit untuk service.
     */
    public function edit(Service $service)
    {
        return view('backend.service.edit', compact('service'));
    }

    /**
     * Memperbarui data service.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'jenis_service' => 'required|unique:service,jenis_service,' . $service->id,
            'harga'         => 'required|numeric|min:0',
        ]);

        $service->update($request->only(['jenis_service', 'harga']));

        return redirect()->route('service.index')->with('success', 'Service berhasil diperbarui.');
    }

    /**
     * Menghapus data service.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('service.index')->with('success', 'Service berhasil dihapus.');
    }
}
