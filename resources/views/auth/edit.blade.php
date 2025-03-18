@extends('backend.layouts.master2')

@section('content')
<div class="min-h-screen bg-gray-100 flex flex-col">
  <!-- Navbar -->
  @include('frontend.layouts.nav')

  <!-- Main Content -->
  <div class="flex-1 flex items-center justify-center p-10">
    <div class="w-full bg-white shadow-lg rounded-lg p-8">
      <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Edit Profile</h1>

      @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
          {{ session('success') }}
        </div>
      @endif

      <form action="{{ route('auth.profile.update') }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="ktp" class="block text-sm font-medium text-gray-700">KTP</label>
            <input type="text" name="ktp" id="ktp" value="{{ old('ktp', $user->ktp) }}" required
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
          </div>

          <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->nama) }}" required
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
          </div>

          <div class="col-span-2">
            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
            <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $user->alamat) }}" required
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
          </div>

          <div>
            <label for="hp" class="block text-sm font-medium text-gray-700">HP</label>
            <input type="text" name="hp" id="hp" value="{{ old('hp', $user->hp) }}" required
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
          </div>

          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
          </div>

          <div>
            <label for="password" class="block text-sm font-medium text-gray-700">
              Password <span class="text-xs text-gray-500">(kosongkan jika tidak ingin mengubah)</span>
            </label>
            <input type="password" name="password" id="password"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
          </div>

          <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
          </div>
        </div>

        <div class="mt-8 text-center">
          <button type="submit"
            class="w-full py-3 bg-blue-600 text-white font-semibold rounded-md shadow hover:bg-blue-700 transition duration-300">
            Update Profile
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Footer -->
  @include('frontend.layouts.footer')
</div>
@endsection
