@extends('backend.layouts.master')

@section('content')
<body class="pl-64 bg-gradient-to-br from-blue-50 to-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-6 py-10">
        <h1 class="text-4xl font-extrabold mb-8 text-center text-blue-800">Edit Pengguna</h1>

        <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="bg-white p-8 rounded-lg shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="ktp" class="block text-gray-700 font-medium">KTP</label>
                <input type="text" name="ktp" id="ktp" value="{{ $user->ktp }}" required class="w-full mt-1 p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Nama</label>
                <input type="text" name="name" id="name" value="{{ $user->nama }}" required class="w-full mt-1 p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="alamat" class="block text-gray-700 font-medium">Alamat</label>
                <input type="text" name="alamat" id="alamat" value="{{ $user->alamat }}" required class="w-full mt-1 p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="hp" class="block text-gray-700 font-medium">HP</label>
                <input type="text" name="hp" id="hp" value="{{ $user->hp }}" required class="w-full mt-1 p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" required class="w-full mt-1 p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium">
                    Password <small>(Kosongkan jika tidak ingin mengubah)</small>
                </label>
                <input type="password" name="password" id="password" class="w-full mt-1 p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 font-medium">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full mt-1 p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="role" class="block text-gray-700 font-medium">Role</label>
                <select name="role" id="role" required class="w-full mt-1 p-2 border border-gray-300 rounded">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="superadmin" {{ $user->role == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                Update Pengguna
            </button>
        </form>
    </div>
</body>
@endsection
