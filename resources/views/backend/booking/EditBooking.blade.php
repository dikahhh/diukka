@extends('backend.layouts.master2')

@section('content')
<div class="min-h-screen bg-gray-50 flex items-center justify-center">
  <div class="w-full max-w-2xl bg-white rounded-lg shadow-md p-6">
    <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8">Edit Booking</h2>
<form action="{{ route('booking.update', $booking->id) }}" method="POST" class="space-y-5">
      @csrf
      @method('PUT')
      <!-- Jenis Service -->
      <div>
        <label for="jenis_service" class="block text-sm font-medium text-gray-700 mb-2">Jenis Service</label>
        <select name="jenis_service" id="jenis_service" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
          <option value="ringan" {{ $booking->jenis_service == 'ringan' ? 'selected' : '' }}>Ringan</option>
          <option value="sedang" {{ $booking->jenis_service == 'sedang' ? 'selected' : '' }}>Sedang</option>
          <option value="berat" {{ $booking->jenis_service == 'berat' ? 'selected' : '' }}>Berat</option>
        </select>
      </div>

      <!-- Keluhan -->
      <div>
        <label for="keluhan" class="block text-sm font-medium text-gray-700 mb-2">Keluhan (Opsional)</label>
        <textarea name="keluhan" id="keluhan" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">{{ old('keluhan', $booking->keluhan) }}</textarea>
      </div>

      <!-- Dropdown Cabang -->
      <div>
        <label for="cabang_id" class="block text-sm font-medium text-gray-700 mb-2">Cabang</label>
        <select name="cabang_id" id="cabang_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
          <option value="">Pilih Cabang</option>
          @foreach($cabangs as $cabang)
            <option value="{{ $cabang->id }}" {{ $booking->cabang_id == $cabang->id ? 'selected' : '' }}>{{ $cabang->nama }}</option>
          @endforeach
        </select>
      </div>

      <!-- Dropdown Tempat (tampilkan jika ada nilai) -->
      <div id="tempatContainer" class="{{ $booking->tempat_id ? '' : 'hidden' }}">
        <label for="tempat_id" class="block text-sm font-medium text-gray-700 mb-2">Tempat</label>
        <select name="tempat_id" id="tempat_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
          <option value="">Pilih Tempat</option>
          @foreach($tempats as $tempat)
            <option value="{{ $tempat->id }}" {{ $booking->tempat_id == $tempat->id ? 'selected' : '' }}>{{ $tempat->nama_tempat }}</option>
          @endforeach
        </select>
      </div>

      <!-- Dropdown Kendaraan (hanya kendaraan milik user) -->
      <div>
        <label for="kendaraan_id" class="block text-sm font-medium text-gray-700 mb-2">Kendaraan</label>
        <select name="kendaraan_id" id="kendaraan_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
          <option value="">Pilih Kendaraan</option>
          @foreach($kendaraans as $k)
            @if($k->ktp == auth()->user()->ktp)
              <option value="{{ $k->id }}" {{ $booking->kendaraan_id == $k->id ? 'selected' : '' }}>{{ $k->no_plat }} - {{ $k->merk }}</option>
            @endif
          @endforeach
        </select>
      </div>

      <!-- Input Tanggal -->
      <div>
        <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $booking->tanggal) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
      </div>

      <!-- Tombol Submit -->
      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">Update Booking</button>
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
    fetch("{{ url('tempat/by-cabang') }}/" + cabangId)
      .then(response => response.json())
      .then(data => {
        // Reset dropdown tempat
        tempatDropdown.innerHTML = '<option value="">Pilih Tempat</option>';
        data.forEach(function(tempat) {
          var option = document.createElement('option');
          option.value = tempat.id;
          option.text = tempat.nama_tempat;
          tempatDropdown.appendChild(option);
        });
        // Tampilkan dropdown tempat
        tempatContainer.classList.remove('hidden');
      })
      .catch(error => console.error('Error:', error));
  } else {
    // Jika tidak ada cabang yang dipilih, kosongkan dan sembunyikan dropdown tempat
    tempatDropdown.innerHTML = '<option value="">Pilih Tempat</option>';
    tempatContainer.classList.add('hidden');
  }
});
</script>
@endsection