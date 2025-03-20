@extends('backend.layouts.master')

@section('content')
<div class="container mx-auto px-6 py-10">
  <h2 class="text-4xl font-bold text-center mb-8">Buat Riwayat Service Langsung</h2>

  @if ($errors->any())
    <div class="bg-red-200 text-red-800 px-4 py-2 rounded mb-4">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('riwayat.store') }}" method="POST" class="space-y-5">
    @csrf

    <!-- Input Jenis Service -->
    <div>
      <label for="jenis_service" class="block text-sm font-medium text-gray-700">Jenis Service</label>
      <select name="jenis_service" id="jenis_service" class="w-full px-4 py-2 border rounded-lg" required>
        <option value="">-- Pilih Service --</option>
        @foreach($services as $service)
          <option value="{{ $service->jenis_service }}" data-price="{{ $service->harga }}">
            {{ ucfirst($service->jenis_service) }} - Rp. {{ number_format($service->harga, 2) }}
          </option>
        @endforeach
      </select>
    </div>

    <!-- Input Karyawan -->
    <div>
      <label for="karyawan_id" class="block text-sm font-medium text-gray-700">Karyawan yang Mengerjakan</label>
      <select name="karyawan_id" id="karyawan_id" class="w-full px-4 py-2 border rounded-lg" required>
        <option value="">Pilih Karyawan</option>
        @foreach($karyawans as $karyawan)
          <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
        @endforeach
      </select>
    </div>

    <!-- Input Catatan -->
    <div>
      <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan</label>
      <textarea name="catatan" id="catatan" rows="3" class="w-full px-4 py-2 border rounded-lg">{{ old('catatan') }}</textarea>
    </div>

    <!-- Input Detail Booking -->
    <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
      <h3 class="text-2xl font-semibold mb-4">Detail Booking</h3>
      <div class="mb-4">
        <label for="keluhan" class="block text-sm font-medium text-gray-700">Keluhan</label>
        <textarea name="keluhan" id="keluhan" rows="2" class="w-full px-4 py-2 border rounded-lg" required>{{ old('keluhan') }}</textarea>
      </div>
      <!-- Dropdown Cabang -->
      <div>
        <label for="cabang_id" class="block text-sm font-medium text-gray-700 mb-2">Cabang</label>
        <!-- Ubah name dari cabang_id menjadi cabang -->
        <select name="cabang" id="cabang_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-300">
          <option value="">Pilih Cabang</option>
          @foreach($cabangs as $cabang)
            <option value="{{ $cabang->id }}">{{ $cabang->nama }}</option>
          @endforeach
        </select>
      </div>

      <!-- Dropdown Tempat (hidden default) -->
      <div id="tempatContainer" class="hidden">
        <label for="tempat_id" class="block text-sm font-medium text-gray-700 mb-2">Tempat</label>
        <!-- Ubah name dari tempat_id menjadi tempat -->
        <select name="tempat" id="tempat_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-300">
          <option value="">Pilih Tempat</option>
        </select>
      </div>
      <div class="mb-4 flex space-x-4">
        <div class="w-1/2">
          <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
          <input type="date" name="tanggal" id="tanggal" class="w-full px-4 py-2 border rounded-lg" required value="{{ old('tanggal') }}">
        </div>
        <div class="w-1/2">
          <label for="no_antrian" class="block text-sm font-medium text-gray-700">No. Antrian</label>
          <input type="number" name="no_antrian" id="no_antrian" class="w-full px-4 py-2 border rounded-lg" required value="{{ old('no_antrian') }}">
        </div>
      </div>
      <div class="mb-4 flex space-x-4">
        <div class="w-1/2">
          <label for="ktp" class="block text-sm font-medium text-gray-700">KTP</label>
          <input type="text" name="ktp" id="ktp" class="w-full px-4 py-2 border rounded-lg" required value="{{ old('ktp') }}">
        </div>
        <div class="w-1/2">
          <label for="kendaraan" class="block text-sm font-medium text-gray-700">Kendaraan (No Plat)</label>
          <input type="text" name="kendaraan" id="kendaraan" class="w-full px-4 py-2 border rounded-lg" required value="{{ old('kendaraan') }}">
        </div>
      </div>
    </div>

    <!-- Spareparts -->
    <div id="sparepart-container">
      <label class="block text-sm font-medium text-gray-700">Spareparts yang Digunakan</label>
      <div class="flex items-center space-x-4 mb-2">
        <div class="w-1/2">
          <select name="spareparts_id[]" class="sparepart-select w-full px-4 py-2 border rounded-lg">
            <option value="" data-price="0">Pilih Sparepart</option>
            @foreach($spareparts as $sparepart)
              <option value="{{ $sparepart->id }}" data-price="{{ $sparepart->harga }}">
                {{ $sparepart->nama }} (Stock: {{ $sparepart->stock }})
              </option>
            @endforeach
          </select>
        </div>
        <div class="w-1/2">
          <input type="number" name="quantities[]" class="quantity-input w-full px-4 py-2 border rounded-lg" placeholder="Jumlah" min="1" value="1">
        </div>
      </div>
    </div>
    <button type="button" id="add-sparepart" class="text-blue-500 hover:text-blue-700 mb-4">Tambah Sparepart</button>

    <!-- Dana Tambahan -->
    <div id="additional-container">
      <label class="block text-sm font-medium text-gray-700">Dana Tambahan</label>
      <div class="flex items-center space-x-4 mb-2">
        <div class="w-1/2">
          <input type="text" name="additional_descriptions[]" class="additional-description w-full px-4 py-2 border rounded-lg" placeholder="Keterangan">
        </div>
        <div class="w-1/2">
          <input type="number" step="0.01" name="additional_amounts[]" class="additional-amount w-full px-4 py-2 border rounded-lg" placeholder="Jumlah">
        </div>
      </div>
    </div>
    <button type="button" id="add-additional" class="text-blue-500 hover:text-blue-700 mb-4">Tambah Dana Tambahan</button>

    <!-- Total Harga -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Total Harga</label>
      <div id="total-harga" class="font-bold text-xl">Rp 0.00</div>
      <!-- Hidden untuk total harga -->
      <input type="hidden" name="harga" id="harga" value="">
      <!-- Hidden untuk harga service (nilai dari dropdown jenis service) -->
      <input type="hidden" name="harga_service" id="harga_service" value="">
      <input type="hidden" name="dana_tambahan" id="dana_tambahan_hidden" value="">
    </div>

    <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition duration-300">Simpan Riwayat</button>
  </form>
</div>

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

// Fungsi untuk menghitung total harga spareparts
function calculateSparepartTotal() {
  let total = 0;
  document.querySelectorAll('#sparepart-container .flex.items-center').forEach(function(row) {
    const select = row.querySelector('.sparepart-select');
    const quantityInput = row.querySelector('.quantity-input');
    if (select && quantityInput) {
      const price = parseFloat(select.options[select.selectedIndex].getAttribute('data-price')) || 0;
      const quantity = parseFloat(quantityInput.value) || 0;
      total += price * quantity;
    }
  });
  return total;
}

// Fungsi untuk menghitung total dana tambahan
function calculateAdditionalTotal() {
  let total = 0;
  document.querySelectorAll('.additional-amount').forEach(function(input) {
    total += parseFloat(input.value) || 0;
  });
  return total;
}

// Fungsi utama untuk menghitung total harga keseluruhan
function calculateTotal() {
  const sparepartTotal = calculateSparepartTotal();
  const additionalTotal = calculateAdditionalTotal();
  
  // Ambil harga service dari dropdown jenis service
  let servicePrice = 0;
  const serviceSelect = document.getElementById('jenis_service');
  if (serviceSelect) {
    const selectedOption = serviceSelect.options[serviceSelect.selectedIndex];
    servicePrice = parseFloat(selectedOption.getAttribute('data-price')) || 0;
  }
  
  const total = sparepartTotal + additionalTotal + servicePrice;
  document.getElementById('total-harga').textContent = 'Rp ' + total.toFixed(2);
  document.getElementById('harga').value = total.toFixed(2);
  document.getElementById('dana_tambahan_hidden').value = additionalTotal.toFixed(2);
  
  // Set nilai harga service
  document.getElementById('harga_service').value = servicePrice.toFixed(2);
}

document.addEventListener('change', function(e) {
  if (e.target.classList.contains('sparepart-select') || e.target.classList.contains('quantity-input') || e.target.classList.contains('additional-amount') || e.target.id === 'jenis_service') {
    calculateTotal();
  }
});
document.addEventListener('input', function(e) {
  if (e.target.classList.contains('quantity-input') || e.target.classList.contains('additional-amount')) {
    calculateTotal();
  }
});

document.getElementById('add-sparepart').addEventListener('click', function() {
  const container = document.getElementById('sparepart-container');
  const div = document.createElement('div');
  div.classList.add('flex', 'items-center', 'space-x-4', 'mb-2');
  div.innerHTML = `
    <div class="w-1/2">
      <select name="spareparts_id[]" class="sparepart-select w-full px-4 py-2 border rounded-lg">
        <option value="" data-price="0">Pilih Sparepart</option>
        @foreach($spareparts as $sparepart)
          <option value="{{ $sparepart->id }}" data-price="{{ $sparepart->harga }}">
            {{ $sparepart->nama }} (Stock: {{ $sparepart->stock }})
          </option>
        @endforeach
      </select>
    </div>
    <div class="w-1/2">
      <input type="number" name="quantities[]" class="quantity-input w-full px-4 py-2 border rounded-lg" placeholder="Jumlah" min="1" value="1">
    </div>
  `;
  container.appendChild(div);
  calculateTotal();
});

document.getElementById('add-additional').addEventListener('click', function() {
  const container = document.getElementById('additional-container');
  const div = document.createElement('div');
  div.classList.add('flex', 'items-center', 'space-x-4', 'mb-2');
  div.innerHTML = `
    <div class="w-1/2">
      <input type="text" name="additional_descriptions[]" class="additional-description w-full px-4 py-2 border rounded-lg" placeholder="Keterangan">
    </div>
    <div class="w-1/2">
      <input type="number" step="0.01" name="additional_amounts[]" class="additional-amount w-full px-4 py-2 border rounded-lg" placeholder="Jumlah">
    </div>
  `;
  container.appendChild(div);
  calculateTotal();
});

document.addEventListener('DOMContentLoaded', calculateTotal);
</script>
@endsection
