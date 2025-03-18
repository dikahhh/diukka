@extends('backend.layouts.master')

@section('content')
<body class="pl-64 bg-gradient-to-br from-blue-50 to-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4 text-center text-blue-800">Daftar Pengguna</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-5 py-4 rounded-lg shadow-lg mb-8 transition-all">
                <span class="block sm:inline font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="flex justify-end mb-6">
            <a href="{{ route('user.create') }}" class="bg-gradient-to-r from-teal-400 to-blue-400 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:from-teal-500 hover:to-blue-500 focus:ring focus:ring-blue-300 transition-all duration-300">
                Tambah Pengguna
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr class="bg-gradient-to-r from-blue-200 to-teal-200 text-gray-700">
                        <th class="border px-4 py-3 text-left font-semibold">#</th>
                        <th class="border px-4 py-3 text-left font-semibold">Nama</th>
                        <th class="border px-4 py-3 text-left font-semibold">Email</th>
                        <th class="border px-4 py-3 text-left font-semibold">HP</th>
                        <th class="border px-4 py-3 text-left font-semibold">Alamat</th>
                        <th class="border px-4 py-3 text-left font-semibold">Role</th>
                        <th class="border px-4 py-3 text-left font-semibold">Status</th>
                        <th class="border px-4 py-3 text-center font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="hover:bg-blue-50 transition duration-200">
                            <td class="border px-4 py-3 text-gray-600">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-3 text-gray-600">{{ $user->nama }}</td>
                            <td class="border px-4 py-3 text-gray-600">{{ $user->email }}</td>
                            <td class="border px-4 py-3 text-gray-600">{{ $user->hp }}</td>
                            <td class="border px-4 py-3 text-gray-600">{{ $user->alamat }}</td>
                            <td class="border px-4 py-3 text-gray-600">{{ $user->role }}</td>
                            <td class="border px-4 py-3 text-center">
                                <form action="{{ route('admin.user.updateRole', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="role" class="border rounded px-2 py-1" onchange="this.form.submit()">
                                        <option value="superadmin" {{ $user->role == 'superadmin' ? 'selected' : '' }}>superadmin</option>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User </option>
                                        <option value="nonaktif" {{ $user->role == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                </form>
                            </td>                            
                            <td class="border px-4 py-3 text-center">
                                <div class="flex justify-center space-x-4">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('user.edit', $user->id) }}" class="bg-orange-200 text-orange-700 font-medium px-5 py-2 rounded-lg shadow hover:bg-orange-300 focus:ring focus:ring-orange-200 transition duration-300">
                                        Edit
                                    </a>
                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-200 text-red-700 font-medium px-5 py-2 rounded-lg shadow hover:bg-red-300 focus:ring focus:ring-red-200 transition duration-300">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="border px-4 py-3 text-center text-gray-500">Tidak ada data pengguna</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection