@extends('backend.layouts.master2')

@section('content')
<div class="min-h-screen bg-gray-50 flex items-center justify-center">
  <div class="w-full max-w-2xl bg-white rounded-lg shadow-md p-6">
    <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8">Buat Booking Baru (Admin)</h2>

    <form action="{{ route('booking.storeFormAdmin') }}" method="POST" class="space-y-5">
      @csrf

      <!-- Keluhan -->
      <div>
        <label for="keluhan" class="block text-sm font-medium text-gray-700 mb-2">Keluhan (Opsional)</label>
        <textarea name="keluhan" id="keluhan" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">{{ old('keluhan') }}</textarea>
      </div>

      <!-- Dropdown Cabang -->
      <div>
        <label for="cabang_id" class="block text-sm font-medium text-gray-700 mb-2">Cabang</label>
        <select name="cabang_id" id="cabang_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
          <option value="">Pilih Cabang</option>
          @foreach($cabangs as $cabang)
            <option value="{{ $cabang->id }}">{{ $cabang->nama }}</option>
          @endforeach
        </select>
      </div>

      <!-- Dropdown Tempat (hidden default) -->
      <div id="tempatContainer" class="hidden">
        <label for="tempat_id" class="block text-sm font-medium text-gray-700 mb-2">Tempat</label>
        <select name="tempat_id" id="tempat_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
          <option value="">Pilih Tempat</option>
        </select>
      </div>

       <!-- Dropdown KTP -->
       <div>
        <label for="selected_ktp" class="block text-sm font-medium text-gray-700 mb-2">Pilih KTP</label>
        <select name="selected_ktp" id="selected_ktp" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
          <option value="">-- Pilih KTP --</option>
          @foreach ($allKTP as $ktp)
            <option value="{{ $ktp->ktp }}">{{ $ktp->ktp }}</option>
          @endforeach
        </select>
      </div>

      <!-- Dropdown Kendaraan (berdasarkan KTP yang dipilih) -->
      <div>
        <label for="no_plat" class="block text-sm font-medium text-gray-700 mb-2">Kendaraan (No Plat)</label>
        <select name="no_plat" id="no_plat" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
          <option value="">-- Pilih Kendaraan --</option>
          <!-- Opsi akan diisi secara dinamis via AJAX -->
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
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
        <p class="mt-2 text-sm text-gray-500">
          Booking akan memiliki slot waktu otomatis. Jadwal operasional: 07:00–17:00.
          Jika sudah lewat jam 17.00, booking untuk hari ini atau hari sebelumnya tidak diperbolehkan.
        </p>
      </div>

      <!-- Tombol Submit -->
      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">Buat Booking</button>
    </form>
  </div>
</div>

<!-- JavaScript untuk memuat dropdown Tempat berdasarkan Cabang -->
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

<!-- JavaScript untuk memuat dropdown Kendaraan berdasarkan KTP yang dipilih -->
<script>
document.getElementById('selected_ktp').addEventListener('change', function() {
  var selectedKTP = this.value;
  console.log("Selected KTP:", selectedKTP);
  var kendaraanDropdown = document.getElementById('no_plat');

  if (selectedKTP) {
    fetch("{{ url('admin/kendaraan/by-ktp') }}/" + selectedKTP)
      .then(response => {
          console.log("Response status:", response.status);
          return response.json();
      })
      .then(data => {
        console.log("Data received:", data);
        kendaraanDropdown.innerHTML = '<option value="">-- Pilih Kendaraan --</option>';
        data.forEach(function(kendaraan) {
          var option = document.createElement('option');
          option.value = kendaraan.no_plat;
          option.text = kendaraan.no_plat + ' - ' + kendaraan.merk;
          kendaraanDropdown.appendChild(option);
        });
      })
      .catch(error => console.error('Error:', error));
  } else {
    kendaraanDropdown.innerHTML = '<option value="">-- Pilih Kendaraan --</option>';
  }
});
</script>
@endsection
