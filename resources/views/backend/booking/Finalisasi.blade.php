@extends('backend.layouts.master')

@section('content')
<div class="container mx-auto px-6 py-10">
  <h2 class="text-4xl font-bold text-center mb-8">Finalisasi Booking</h2>

  <!-- Detail Booking -->
  <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
    <h3 class="text-2xl font-semibold mb-4">Detail Booking</h3>
    <p><strong>Keluhan:</strong> {{ $booking->keluhan }}</p>
    <p><strong>Cabang:</strong> {{ $booking->cabang }}</p>
    <p><strong>Tempat:</strong> {{ $booking->tempat }}</p>
    <p><strong>Tanggal:</strong> {{ $booking->tanggal }}</p>
    <p><strong>No. Antrian:</strong> {{ $booking->no_antrian }}</p>
    <p><strong>Waktu Booking:</strong> {{ $booking->waktu ?? 'Belum diatur' }}</p>
  </div>

  @if(session('error'))
    <div class="bg-red-200 text-red-800 px-4 py-2 rounded mb-4">{{ session('error') }}</div>
  @endif

  <form action="{{ route('booking.storeSelesai', $booking->id) }}" method="POST" class="space-y-6">
    @csrf

    <!-- Input Jenis Service untuk finalisasi -->
    <div>
      <label for="jenis_service" class="block text-sm font-medium text-gray-700">Jenis Service</label>
      <select name="jenis_service" id="jenis_service" class="w-full px-4 py-2 border rounded-lg">
        <option value="">-- Pilih Service --</option>
        @foreach($services as $service)
          <option value="{{ $service->jenis_service }}" data-price="{{ $service->harga }}">
            {{ ucfirst($service->jenis_service) }} - Rp. {{ number_format($service->harga, 2) }}
          </option>
        @endforeach
      </select>
    </div>

    <!-- Pilih Karyawan -->
    <div>
      <label for="karyawan_id" class="block text-sm font-medium text-gray-700">Karyawan yang Mengerjakan</label>
      <select name="karyawan_id" id="karyawan_id" class="w-full px-4 py-2 border rounded-lg" required>
        <option value="">Pilih Karyawan</option>
        @foreach($karyawans as $karyawan)
          <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
        @endforeach
      </select>
    </div>

     <!-- Input Catatan (tidak dihilangkan) -->
     <div>
      <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan</label>
      <textarea name="catatan" id="catatan" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">{{ old('catatan') }}</textarea>
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
      <input type="hidden" name="harga" id="harga" value="">
      <input type="hidden" name="dana_tambahan" id="dana_tambahan_hidden" value="">
    </div>

    <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition duration-300">Finalisasi Booking</button>
  </form>
</div>

<script>
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
