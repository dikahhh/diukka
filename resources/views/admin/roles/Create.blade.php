@extends('backend.layouts.master')

@section('content')
<div class="container mx-auto px-6 py-10">
    <h1 class="text-4xl font-extrabold mb-8 text-center text-blue-800">Tambah Role</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-300 text-red-800 px-5 py-4 rounded-lg mb-8">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles.store') }}" method="POST" class="bg-white p-8 rounded-lg shadow-md">
        @csrf
        
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium">Nama Role</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required class="w-full mt-1 p-2 border border-gray-300 rounded">
        </div>

        <div class="mb-4">
            <label for="guard_name" class="block text-gray-700 font-medium">Guard Name</label>
            <input type="text" name="guard_name" id="guard_name" value="{{ old('guard_name', 'web') }}" required class="w-full mt-1 p-2 border border-gray-300 rounded">
        </div>

        @php
            $groupedPermissions = [
                'Frontend (Tampilan Umum)' => [
                    'frontend.index', 'frontend.kendaraan', 'frontend.service', 'frontend.riwayat'
                ],
                'Autentikasi & Profil' => [
                    'auth.edit', 'auth.profile.update'
                ],
                'Manajemen Kendaraan' => [
                    'kendaraan.index', 'kendaraan.create', 'kendaraan.store', 
                    'kendaraan.edit', 'kendaraan.update', 'kendaraan.destroy'
                ],
                'Manajemen Booking' => [
                    'booking.index', 'booking.create', 'booking.store', 'booking.edit', 
                    'booking.update', 'booking.destroy', 'booking.updateStatus', 'booking.updateJenis', 'booking.updateWaktu', 
                    'booking.selesaikan', 'booking.storeSelesai', 'booking.createFormAdmin', 'booking.storeFormAdmin'
                ],
                'Manajemen Cabang' => [
                    'cabang.index', 'cabang.create', 'cabang.store', 'cabang.edit', 
                    'cabang.update', 'cabang.destroy'
                ],
                'Manajemen Tempat' => [
                    'tempat.byCabang'
                ],
                'Backend & Admin Dashboard' => [
                    'backend.index', 'adminregister'
                ],
                'Manajemen User' => [
                    'user.index', 'user.create', 'user.store', 'user.edit', 
                    'user.update', 'user.destroy', 'admin.user.updateRole'
                ],
                'Manajemen Role' => [
                    'roles.index', 'roles.create', 'roles.store', 'roles.show', 
                    'roles.edit', 'roles.update', 'roles.destroy'
                ],
                'Manajemen Sparepart' => [
                    'sparepart.index', 'sparepart.create', 'sparepart.store', 
                    'sparepart.edit', 'sparepart.update', 'sparepart.destroy'
                ],
                'Manajemen Riwayat' => [
                    'riwayat.index', 'riwayat.create', 'riwayat.store', 'riwayat.show', 
                    'riwayat.edit', 'riwayat.update', 'riwayat.destroy', 'riwayat.invoice'
                ],
                'Laporan Keuangan' => [
                    'laporan.index', 'laporan.export.csv'
                ],
                'Manajemen Karyawan' => [
                    'karyawan.index', 'karyawan.create', 'karyawan.store', 
                    'karyawan.edit', 'karyawan.update', 'karyawan.destroy'
                ],
                'Service' => [
                    'service.index', 'service.create', 'service.store', 
                    'service.edit', 'service.update', 'service.destroy'
                ],
                'Tambah Stock' => [
                    'stock.index', 'stock.create', 'stock.store'
                ],
            ];
        @endphp

        <div class="mb-4">
            <label class="block text-gray-700 font-medium">Permissions</label>
            @foreach($groupedPermissions as $groupName => $permNames)
                <div class="mb-4 border p-4 rounded-lg">
                    <h3 class="text-lg font-semibold mb-2">{{ $groupName }}</h3>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach($permNames as $permName)
                            @php
                                $permission = $permissions->where('name', $permName)->first();
                            @endphp
                            @if($permission)
                                <label class="flex items-center">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="mr-2">
                                    <span>{{ ucwords(str_replace(['.', '_'], [' ', ' '], $permName)) }}</span>
                                </label>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
            Simpan Role
        </button>
    </form>
</div>
@endsection
