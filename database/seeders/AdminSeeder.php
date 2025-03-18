<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat user Superadmin
        \App\Models\User::updateOrCreate([
            'ktp' => '1234567890123456',
            'nama' => 'superadmin',
            'alamat' => 'Jl. Admin No. 1',
            'hp' => '081234567890',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('pw111111'),
            'role' => 'superadmin',
        ])->assignRole('superadmin');

        // Buat user Admin
        \App\Models\User::updateOrCreate([
            'ktp' => '2234567890123456',
            'nama' => 'admin',
            'alamat' => 'Jl. Admin No. 2',
            'hp' => '082345678901',
            'email' => 'admin@example.com',
            'password' => Hash::make('pw111111'),
            'role' => 'admin',
        ])->assignRole('admin');
    }
}
