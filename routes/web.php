<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\backend\BackendController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\KendaraanController;
use App\Http\Controllers\Backend\CabangController;
use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RoleController;
use App\Http\Controllers\Backend\SparePartController;
use App\Http\Controllers\Backend\RiwayatController;
use App\Http\Controllers\Backend\KaryawanController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Backend\TambahStockController;


Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::middleware(['auth'])->group(function () {
    Route::get('/kendaraan', [FrontEndController::class, 'kendaraan'])->name('frontend.kendaraan');
    Route::get('/jadwal-service', [FrontEndController::class, 'jadwalService'])->name('frontend.service');
    Route::get('/riwayat-service', [FrontEndController::class, 'riwayatService'])->name('frontend.riwayat');

    Route::get('/auth/edit', [ProfileController::class, 'edit'])->name('auth.edit');

    // Route untuk memproses update profil
    Route::put('/auth/profile', [ProfileController::class, 'update'])->name('auth.profile.update');

    
    Route::get('/kendaraan/create', [KendaraanController::class, 'create'])->name('kendaraan.create');
    Route::post('/kendaraan', [KendaraanController::class, 'store'])->name('kendaraan.store');
    Route::get('/kendaraan/{id}/edit', [KendaraanController::class, 'edit'])->name('kendaraan.edit');
    Route::put('/kendaraan/{id}', [KendaraanController::class, 'update'])->name('kendaraan.update');
    Route::delete('/kendaraan/{id}', [KendaraanController::class, 'destroy'])->name('kendaraan.destroy');

    Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
});


Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Dashboard    
    Route::get('/', [BackendController::class, 'index'])->name('backend.index');

    // Cabang
    Route::get('/cabang', [CabangController::class, 'index'])->name('cabang.index');
    Route::get('/cabang/create', [CabangController::class, 'create'])->name('cabang.create');
    Route::post('/cabang', [CabangController::class, 'store'])->name('cabang.store');
    Route::get('/cabang/{id}/edit', [CabangController::class, 'edit'])->name('cabang.edit');
    Route::put('/cabang/{id}', [CabangController::class, 'update'])->name('cabang.update');
    Route::delete('/cabang/{id}', [CabangController::class, 'destroy'])->name('cabang.destroy');

    // User (Admin Register & Management)
    Route::get('/adminregister', [UserController::class, 'AdminRegister'])->name('adminregister');
    Route::post('/adminregister', [UserController::class, 'adminRegisterProcess']);
    // Route untuk menampilkan form create user
    Route::get('adminregister/create', [UserController::class, 'create'])->name('admin.user.create');
    // Route untuk memproses penyimpanan user baru
    Route::post('adminregister', [UserController::class, 'store'])->name('admin.user.store');

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::patch('/user/{id}/update-role', [UserController::class, 'updateRole'])->name('admin.user.updateRole');

    // Role
    Route::resource('roles', RoleController::class);

    // Sparepart
    Route::get('/sparepart', [SparePartController::class, 'index'])->name('sparepart.index');
    Route::get('/sparepart/create', [SparePartController::class, 'create'])->name('sparepart.create');
    Route::post('/sparepart', [SparePartController::class, 'store'])->name('sparepart.store');
    Route::get('/sparepart/{sparepart}/edit', [SparePartController::class, 'edit'])->name('sparepart.edit');
    Route::put('/sparepart/{sparepart}', [SparePartController::class, 'update'])->name('sparepart.update');
    Route::delete('/sparepart/{sparepart}', [SparePartController::class, 'destroy'])->name('sparepart.destroy');

    // Kendaraan
    Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan.index');

    // Riwayat
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
    Route::get('/riwayat/create', [RiwayatController::class, 'create'])->name('riwayat.create');
    Route::post('/riwayat', [RiwayatController::class, 'store'])->name('riwayat.store');
    Route::get('/riwayat/{riwayat}', [RiwayatController::class, 'show'])->name('riwayat.show');
    Route::get('/riwayat/{riwayat}/edit', [RiwayatController::class, 'edit'])->name('riwayat.edit');
    Route::put('/riwayat/{riwayat}', [RiwayatController::class, 'update'])->name('riwayat.update');
    Route::delete('/riwayat/{riwayat}', [RiwayatController::class, 'destroy'])->name('riwayat.destroy');
    Route::get('/riwayat/{riwayat}/invoice', [RiwayatController::class, 'Invoice'])->name('riwayat.invoice');


    // Halaman laporan keuangan dengan filter range tanggal
    Route::get('/laporan', [RiwayatController::class, 'laporanKeuangan'])->name('laporan.index');
    Route::get('/export-laporan-csv', [RiwayatController::class, 'exportCsv'])->name('laporan.export.csv');



    // Karyawan
    Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
    Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
    Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
    Route::get('/karyawan/{karyawan}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::put('/karyawan/{karyawan}', [KaryawanController::class, 'update'])->name('karyawan.update');
    Route::delete('/karyawan/{karyawan}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

    // Booking
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::get('/booking/{booking}/edit', [BookingController::class, 'edit'])->name('booking.edit');
    Route::put('/booking/{booking}', [BookingController::class, 'update'])->name('booking.update');
    Route::delete('/booking/{booking}', [BookingController::class, 'destroy'])->name('booking.destroy');

    Route::get('/booking/createFormAdmin', [BookingController::class, 'createFormadmin'])->name('booking.createFormAdmin');
    Route::post('/booking/form-admin', [BookingController::class, 'storeFormadmin'])->name('booking.storeFormAdmin');
    Route::get('kendaraan/by-ktp/{ktp}', [KendaraanController::class, 'getByKTP']);



    // Route untuk AJAX: get tempat berdasarkan cabang
    Route::get('/tempat/by-cabang/{cabangId}', [BookingController::class, 'getTempatByCabang'])->name('tempat.byCabang');

    Route::patch('/booking/{booking}/status', [BookingController::class, 'updateStatus'])->name('booking.updateStatus');
    Route::patch('/booking/{booking}/update-jenis', [BookingController::class, 'updateJenis'])->name('booking.updateJenis');
    Route::patch('booking/update-waktu/{booking}', [BookingController::class, 'updateWaktu'])->name('booking.updateWaktu');


    // Proses penyelesaian booking
    Route::get('/booking/{booking}/selesaikan', [BookingController::class, 'selesaikan'])->name('booking.selesaikan');
    Route::post('/booking/{booking}/selesaikan', [BookingController::class, 'storeSelesai'])->name('booking.storeSelesai');


    Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
    Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/service', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/service/{service}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('/service/{service}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/service/{service}', [ServiceController::class, 'destroy'])->name('service.destroy');


    Route::get('tambah-stock', [TambahStockController::class, 'index'])->name('stock.index');
    Route::get('tambah-stock/create', [TambahStockController::class, 'create'])->name('stock.create');
    Route::post('tambah-stock', [TambahStockController::class, 'store'])->name('stock.store');
});
