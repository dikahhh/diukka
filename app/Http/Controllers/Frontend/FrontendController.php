<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Kendaraan;
use App\Models\Riwayat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{
    // Halaman Utama (Landing Page)
    public function index()
    {
        return view('frontend.index');
    }

    // Halaman Data Kendaraan
    public function kendaraan()
    {
        $user = Auth::user();
        $kendaraan = Kendaraan::where('ktp', $user->ktp)->get();
        $kendaraanAdmin = Kendaraan::all();
        return view('frontend.index.kendaraan', compact('user', 'kendaraan'));
    }

    // Halaman Jadwal Service
    public function jadwalService()
    {
        $user = Auth::user();
        $bookings = Booking::where('ktp', $user->ktp)->get();
        return view('frontend.index.service', compact('user', 'bookings'));
    }

    // Halaman Riwayat Service
    public function riwayatService()
    {
        $user = Auth::user();
        $riwayats = Riwayat::where('ktp', $user->ktp)->get();
        return view('frontend.index.riwayat', compact('user', 'riwayats'));
    }
}
