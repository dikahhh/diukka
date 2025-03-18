@extends('backend.layouts.master')

@section('content')
<body class="pl-64 bg-gradient-to-br from-blue-50 to-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4 text-center text-blue-800">Daftar Role</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-5 py-4 rounded-lg shadow-lg mb-8 transition-all">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-end mb-6">
            <a href="{{ route('roles.create') }}" class="bg-gradient-to-r from-teal-400 to-blue-400 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:from-teal-500 hover:to-blue-500 focus:ring focus:ring-blue-300 transition-all duration-300">
                Tambah Role
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-gradient-to-r from-blue-200 to-teal-200 text-gray-700">
                        <th class="border px-4 py-3 text-left font-semibold">#</th>
                        <th class="border px-4 py-3 text-left font-semibold">Nama Role</th>
                        <th class="border px-4 py-3 text-left font-semibold">Guard Name</th>
                        <th class="border px-4 py-3 text-left font-semibold">Permissions</th>
                        <th class="border px-4 py-3 text-center font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr class="hover:bg-blue-50 transition duration-200">
                            <td class="border px-4 py-3 text-gray-600">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-3 text-gray-600">{{ $role->name }}</td>
                            <td class="border px-4 py-3 text-gray-600">{{ $role->guard_name }}</td>
                            <td class="border px-4 py-3 text-gray-600">
                                @if($role->permissions->isNotEmpty())
                                    @foreach($role->permissions as $permission)
                                        <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">{{ $permission->name }}</span>
                                    @endforeach
                                @else
                                    <span class="text-gray-500">Tidak ada permission</span>
                                @endif
                            </td>
                            <td class="border px-4 py-3 text-center">
                                <div class="flex justify-center space-x-4">
                                    <a href="{{ route('roles.edit', $role->id) }}" class="bg-orange-200 text-orange-700 font-medium px-4 py-2 rounded hover:bg-orange-300 focus:ring focus:ring-orange-200 transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus role ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-200 text-red-700 font-medium px-4 py-2 rounded hover:bg-red-300 focus:ring focus:ring-red-200 transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="border px-4 py-3 text-center text-gray-500">Tidak ada role</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection