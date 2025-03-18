@extends('backend.layouts.master2')

@section('content')
<div class="min-h-screen bg-gray-50 flex items-center justify-center">
  <div class="w-full max-w-2xl bg-white rounded-lg shadow-md p-6">
    <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8">Buat Booking Baru</h2>

    <form action="{{ route('booking.store') }}" method="POST" class="space-y-5">
      @csrf

      <!-- Keluhan -->
      <div>
        <label for="keluhan" class="block text-sm font-medium text-gray-700 mb-2">Keluhan (Opsional)</label>
        <textarea name="keluhan" id="keluhan" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300" placeholder="Masukkan keluhan...">{{ old('keluhan') }}</textarea>
      </div>

      <!-- Dropdown Cabang -->
      <div>
        <label for="cabang_id" class="block text-sm font-medium text-gray-700 mb-2">Cabang</label>
        <select name="cabang_id" id="cabang_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-300">
          <option value="">Pilih Cabang</option>
          @foreach($cabangs as $cabang)
            <option value="{{ $cabang->id }}">{{ $cabang->nama }}</option>
          @endforeach
        </select>
      </div>

      <!-- Dropdown Tempat (hidden default) -->
      <div id="tempatContainer" class="hidden">
        <label for="tempat_id" class="block text-sm font-medium text-gray-700 mb-2">Tempat</label>
        <select name="tempat_id" id="tempat_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-300">
          <option value="">Pilih Tempat</option>
        </select>
      </div>

      <!-- Dropdown Kendaraan (berdasarkan no_plat) -->
      @php
          // Jika $bookedNoPlat belum tersedia, hitung berdasarkan tanggal minimal booking
          $bookedNoPlat = $bookedNoPlat ?? \App\Models\Booking::where('tanggal', $minDate)->pluck('kendaraan')->toArray();
      @endphp
      <div>
        <label for="no_plat" class="block text-sm font-medium text-gray-700 mb-2">Kendaraan (No Plat)</label>
        <select name="no_plat" id="no_plat" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-300">
          <option value="">-- Pilih Kendaraan --</option>
          @foreach ($kendaraan as $k)
            <option value="{{ $k->no_plat }}" {{ in_array($k->no_plat, $bookedNoPlat) ? 'disabled' : '' }}>
              {{ $k->no_plat }} - {{ $k->merk }}
              @if (in_array($k->no_plat, $bookedNoPlat))
                [Sudah Terbooking]
              @endif
            </option>
          @endforeach
        </select>
      </div>

      <!-- Input Tanggal -->
      <div>
        <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
        <input type="date" 
               name="tanggal" 
               id="tanggal" 
               value="{{ old('tanggal', $minDate) }}" 
               min="{{ $minDate }}"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-300">
        <p class="mt-2 text-sm text-gray-500">
          Booking akan memiliki slot waktu otomatis. Jadwal operasional: 07:00–17:00.
          Jika sudah lewat jam 17.00, booking untuk hari ini tidak diperbolehkan.
        </p>
      </div>

      <!-- Tombol Submit -->
      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">
        Buat Booking
      </button>
    </form>
  </div>
</div>

<!-- JavaScript untuk memuat dropdown Tempat berdasarkan cabang yang dipilih -->
<script>
document.getElementById('cabang_id').addEventListener('change', function() {
  var cabangId = this.value;
  var tempatDropdown = document.getElementById('tempat_id');
  var tempatContainer = document.getElementById('tempatContainer');
  
  if (cabangId) {
    fetch("{{ url('admin/tempat/by-cabang') }}/" + cabangId)
      .then(response => response.json())
      .then(data => {
        tempatDropdown.innerHTML = '<option value="">Pilih Tempat</option>';
        data.forEach(function(tempat) {
          var option = document.createElement('option');
          option.value = tempat.id;
          option.text = tempat.nama_tempat;
          tempatDropdown.appendChild(option);
        });
        tempatContainer.classList.remove('hidden');
      })
      .catch(error => console.error('Error:', error));
  } else {
    tempatDropdown.innerHTML = '<option value="">Pilih Tempat</option>';
    tempatContainer.classList.add('hidden');
  }
});
</script>
@endsection
