@extends('frontend.layouts.master')
@section('content')
<div class="container mx-auto px-6 py-10">
  <h2>Data Kendaraan</h2>
  @auth
    <!-- Data Kendaraan -->
    <div class="mb-12">
      <h3 class="text-2xl font-semibold mb-4">Data Kendaraan</h3>
      <div class="grid gap-6 md:grid-cols-2">
        @forelse($kendaraan as $k)
          <div class="bg-white shadow-md rounded-lg p-6 hover:shadow-xl transition duration-300" x-data="{ showEdit: false }">
            <div class="mb-4 text-blue-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16a3 3 0 100 6 3 3 0 000-6zm0 0l1.5-3h5l3 5h4a2 2 0 002-2v-3M4 16l1.5-3m15 3a3 3 0 100 6 3 3 0 000-6z" />
              </svg>
            </div>
            <h4 class="text-xl font-semibold mb-2">{{ $k->merk }} {{ $k->tipe }}</h4>
            <p class="text-gray-600 mb-4">{{ $k->no_plat }} • {{ $k->transmisi }} • {{ $k->tahun }}</p>
            <div class="flex space-x-4">
              <!-- Tombol Edit dengan Modal Pop-Up -->
              <button @click="showEdit = true"
                      class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-full transition duration-300">
                Edit
              </button>
              <!-- Modal Edit -->
              <div x-show="showEdit" class="fixed inset-0 flex items-center justify-center z-50" style="display: none;">
                <!-- Latar Belakang Gelap -->
                <div class="absolute inset-0 bg-black opacity-50" @click="showEdit = false"></div>
                <!-- Konten Modal -->
                <div class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg z-10">
                  @include('backend.kendaraan.editkendaraan', ['kendaraan' => $k])
                  <!-- Tombol Tutup Modal -->
                  <div class="flex justify-end mt-4">
                    <button @click="showEdit = false"
                            class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition">
                      Tutup
                    </button>
                  </div>
                </div>
              </div>
              <!-- Tombol Hapus -->
              <form action="{{ route('kendaraan.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-full transition duration-300">
                  Hapus
                </button>
              </form>
            </div>
          </div>
        @empty
          <p class="text-center text-gray-600">Belum ada kendaraan</p>
        @endforelse
         <!-- Container Modal untuk Tambah Kendaraan -->
         <div x-data="{ showCreate: false }">
          <!-- Tombol Trigger Modal -->
          <button @click="showCreate = true"
                  class="bg-gradient-to-r from-teal-400 to-blue-400 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:from-teal-500 hover:to-blue-500 focus:ring focus:ring-blue-300 transition-all duration-300">
              Tambah Kendaraan
          </button>

          <!-- Modal Pop-Up -->
          <div x-show="showCreate" class="fixed inset-0 flex items-center justify-center z-50">
              <!-- Latar Belakang Gelap -->
              <div class="absolute inset-0 bg-black opacity-50" @click="showCreate = false"></div>

              <!-- Konten Modal -->
              <div class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg z-10">
                  <!-- Sertakan Form Create Kendaraan -->
                  @include('backend.kendaraan.createkendaraan')

                  <!-- Tombol Tutup -->
                  <div class="flex justify-end mt-4">
                      <button @click="showCreate = false"
                              class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition">
                          Tutup
                      </button>
                  </div>
              </div>
          </div>
      </div>
      </div>
    </div>
  @endauth
</div>
@endsection
