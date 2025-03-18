<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            // Frontend (tampilan umum)
            'frontend.index',
            'frontend.kendaraan',
            'frontend.service',
            'frontend.riwayat',

            // Autentikasi & Profil
            'auth.edit',
            'auth.profile.update',

            // Kendaraan (CRUD untuk user dan admin)
            'kendaraan.index',    // Untuk admin melihat daftar kendaraan
            'kendaraan.create',
            'kendaraan.store',
            'kendaraan.edit',
            'kendaraan.update',
            'kendaraan.destroy',

            // Booking (umum & admin)
            'booking.index',          // Tampilan daftar booking (admin)
            'booking.create',         // Untuk user (frontend) membuat booking
            'booking.store',          // Untuk user (frontend) menyimpan booking
            'booking.edit',           // Untuk admin mengedit booking
            'booking.update',
            'booking.destroy',
            'booking.updateStatus',
            'booking.updateJenis',
            'booking.updateWaktu',
            'booking.selesaikan',
            'booking.storeSelesai',
            'booking.createFormAdmin', // Pembuatan booking oleh admin
            'booking.storeFormAdmin',

            // Cabang
            'cabang.index',
            'cabang.create',
            'cabang.store',
            'cabang.edit',
            'cabang.update',
            'cabang.destroy',

            // Tempat (AJAX: berdasarkan cabang)
            'tempat.byCabang',

            // Backend Dashboard
            'backend.index',

            // Admin Register (proses pendaftaran admin)
            'adminregister',

            // Manajemen User
            'user.index',
            'user.create',
            'user.store',
            'user.edit',
            'user.update',
            'user.destroy',
            'admin.user.updateRole',

            // Manajemen Role (resource)
            'roles.index',
            'roles.create',
            'roles.store',
            'roles.show',
            'roles.edit',
            'roles.update',
            'roles.destroy',

            // Sparepart
            'sparepart.index',
            'sparepart.create',
            'sparepart.store',
            'sparepart.edit',
            'sparepart.update',
            'sparepart.destroy',

            // Riwayat
            'riwayat.index',
            'riwayat.create',
            'riwayat.store',
            'riwayat.show',
            'riwayat.edit',
            'riwayat.update',
            'riwayat.destroy',
            'riwayat.invoice',

            // Laporan Keuangan
            'laporan.index',
            'laporan.export.csv',

            // Karyawan
            'karyawan.index',
            'karyawan.create',
            'karyawan.store',
            'karyawan.edit',
            'karyawan.update',
            'karyawan.destroy',

            // Service
            'service.index',
            'service.create',
            'service.store',
            'service.edit',
            'service.update',
            'service.destroy',

            // Tambah Stock (Stock)
            'stock.index',
            'stock.create',
            'stock.store',
        ];

        // Buat atau perbarui setiap permission
        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Buat role: user, admin, dan superadmin
        $roleUser = Role::firstOrCreate(['name' => 'user']);
        $roleAdmin = Role::firstOrCreate(['name' => 'admin']);
        $roleSuperAdmin = Role::firstOrCreate(['name' => 'superadmin']);

        // Atur permission untuk role "user"
        // Role user hanya memiliki akses ke tampilan frontend dan beberapa fungsi dasar
        $roleUser->syncPermissions([
            'frontend.index',
            'frontend.kendaraan',
            'frontend.service',
            'frontend.riwayat',
            'auth.edit',
            'auth.profile.update',
            'kendaraan.create',
            'kendaraan.store',
            'kendaraan.edit',
            'kendaraan.update',
            'kendaraan.destroy',
            'booking.create',
            'booking.store',
        ]);

        // Atur permission untuk role "admin"
        // Role admin memiliki akses ke dashboard backend serta manajemen data
        $roleAdmin->syncPermissions([
            'frontend.index',
            'backend.index',

            // Sparepart
            'sparepart.index',
            'sparepart.create',
            'sparepart.store',
            'sparepart.edit',
            'sparepart.update',
            'sparepart.destroy',

            // Kendaraan (admin view)
            'kendaraan.index',

            // Riwayat
            'riwayat.index',
            'riwayat.create',
            'riwayat.store',
            'riwayat.show',
            'riwayat.edit',
            'riwayat.update',
            'riwayat.destroy',
            'riwayat.invoice',

            // Laporan Keuangan
            'laporan.index',
            'laporan.export.csv',

            // Karyawan
            'karyawan.index',
            'karyawan.create',
            'karyawan.store',
            'karyawan.edit',
            'karyawan.update',
            'karyawan.destroy',

            // Booking (admin)
            'booking.index',
            'booking.edit',
            'booking.update',
            'booking.destroy',
            'booking.updateStatus',
            'booking.updateJenis',
            'booking.updateWaktu',
            'booking.selesaikan',
            'booking.storeSelesai',
            'booking.createFormAdmin',
            'booking.storeFormAdmin',

            // Service
            'service.index',
            'service.create',
            'service.store',
            'service.edit',
            'service.update',
            'service.destroy',

            // Tambah Stock
            'stock.index',
            'stock.create',
            'stock.store',
        ]);

        // Role superadmin mendapatkan semua permission
        $roleSuperAdmin->syncPermissions(Permission::all());
    }
}
