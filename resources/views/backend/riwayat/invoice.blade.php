@extends('backend.layouts.master2')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 shadow-xl rounded-lg">
  <!-- Header Invoice -->
  <div class="flex items-center justify-between border-b pb-4 mb-6">
    <div class="flex items-center space-x-4">
      <div>
        <h1 class="text-3xl font-bold text-gray-800">Invoice</h1>
        <p class="text-sm text-gray-500">#INV-{{ $riwayat->no_antrian }}</p>
      </div>
    </div>
    <div class="text-right">
      <p class="text-sm text-gray-500">Tanggal Invoice</p>
      <p class="text-lg font-semibold text-gray-700">{{ \Carbon\Carbon::parse($riwayat->tanggal)->format('d M Y') }}</p>
    </div>
  </div>

  <!-- Informasi Pelanggan & Teknisi -->
  <div class="grid grid-cols-2 gap-4 mb-6">
    <div>
      <h2 class="text-lg font-semibold text-gray-700">Informasi Pelanggan</h2>
      <p class="text-gray-600"><span class="font-medium">KTP:</span> {{ $riwayat->ktp }}</p>
      <!-- Tambahkan info pelanggan lain jika diperlukan -->
    </div>
    <div class="text-right">
      <h2 class="text-lg font-semibold text-gray-700">Informasi Teknisi</h2>
      <p class="text-gray-600">
        <span class="font-medium">Nama:</span>
        {{ $riwayat->karyawan->nama ?? 'N/A' }}
      </p>
    </div>
  </div>

  

  <!-- Detail Transaksi -->
  <div class="mb-6">
    <h2 class="text-lg font-semibold text-gray-700 mb-2">Detail Transaksi</h2>
    <div class="grid grid-cols-2 gap-4">
      <div>
        <p class="text-gray-600"><span class="font-medium">No. Plat:</span> {{ $kendaraanData->no_plat }}</p>
        <p class="text-gray-600"><span class="font-medium">Merk:</span> {{ $kendaraanData->merk }}</p>
        <p class="text-gray-600"><span class="font-medium">Tipe:</span> {{ $kendaraanData->tipe }}</p>
        <p class="text-sm text-gray-500"><span class="font-medium">Catatan:</span> {{ $riwayat->catatan }}</p>
      </div>
      <div>
        <p class="text-gray-600"><span class="font-medium">Cabang:</span> {{ $riwayat->cabang }}</p>
        <p class="text-gray-600"><span class="font-medium">Tempat:</span> {{ $riwayat->tempat }}</p>
        <p class="text-gray-600"><span class="font-medium">Jenis Service:</span> {{ ucfirst($riwayat->jenis_service) }}</p>
        <p class="text-gray-600"><span class="font-medium">Keluhan:</span> {{ $riwayat->keluhan }}</p>
      </div>
    </div>
    <div class="grid grid-cols-2 gap-4 mt-2">
      <div>
        <p class="text-gray-600"><span class="font-medium">Tanggal Service:</span> {{ \Carbon\Carbon::parse($riwayat->tanggal)->format('d M Y') }}</p>
      </div>
      <div>
        <p class="text-gray-600"><span class="font-medium">No. Antrian:</span> {{ $riwayat->no_antrian }}</p>
      </div>
    </div>
  </div>

  <!-- Detail Spareparts -->
  <div class="mb-6">
    <h2 class="text-lg font-semibold text-gray-700 mb-2">Detail Spareparts</h2>
    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-200">
        <thead class="bg-gray-100">
          <tr>
            <th class="border px-4 py-2 text-left text-gray-700">Nama Sparepart</th>
            <th class="border px-4 py-2 text-center text-gray-700">Harga Satuan</th>
            <th class="border px-4 py-2 text-center text-gray-700">Jumlah</th>
            <th class="border px-4 py-2 text-right text-gray-700">Total</th>
          </tr>
        </thead>
        <tbody>
          @php $subtotalSpareparts = 0; @endphp
          @foreach($riwayat->spareparts as $sparepart)
            @php 
              $qty = $sparepart->pivot->quantity;
              $total = $sparepart->harga * $qty;
              $subtotalSpareparts += $total;
            @endphp
            <tr class="hover:bg-gray-50">
              <td class="border px-4 py-2 text-gray-600">{{ $sparepart->nama }}</td>
              <td class="border px-4 py-2 text-center text-gray-600">Rp. {{ number_format($sparepart->harga, 0, ',', '.') }}</td>
              <td class="border px-4 py-2 text-center text-gray-600">{{ $qty }}</td>
              <td class="border px-4 py-2 text-right text-gray-600">Rp. {{ number_format($total, 0, ',', '.') }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Dana Tambahan -->
  <div class="mb-6">
    <h2 class="text-lg font-semibold text-gray-700 mb-2">Dana Tambahan</h2>
    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-200">
        <thead class="bg-gray-100">
          <tr>
            <th class="border px-4 py-2 text-left text-gray-700">Deskripsi</th>
            <th class="border px-4 py-2 text-right text-gray-700">Jumlah</th>
          </tr>
        </thead>
        <tbody>
          @php 
            $additionalDetails = json_decode($riwayat->dana_tambahan_deskripsi, true) ?? [];
            $subtotalAdditional = 0;
          @endphp
          @foreach($additionalDetails as $detail)
            @php
              $subtotalAdditional += $detail['amount'];
            @endphp
            <tr class="hover:bg-gray-50">
              <td class="border px-4 py-2 text-gray-600">{{ $detail['description'] }}</td>
              <td class="border px-4 py-2 text-right text-gray-600">Rp. {{ number_format($detail['amount'], 0, ',', '.') }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Harga Service -->
  <div class="mb-6">
    <h2 class="text-lg font-semibold text-gray-700 mb-2">Harga Service</h2>
    <p class="text-gray-600">Rp. {{ number_format($riwayat->harga_service, 0, ',', '.') }}</p>
  </div>

  <!-- Total Pembayaran -->
  <div class="border-t pt-4">
    <div class="flex flex-col md:flex-row justify-end space-y-4 md:space-y-0 md:space-x-6">
      <div class="text-right">
        <p class="text-gray-600">Subtotal Spareparts:</p>
        <p class="font-semibold text-gray-800">Rp. {{ number_format($subtotalSpareparts, 0, ',', '.') }}</p>
      </div>
      <div class="text-right">
        <p class="text-gray-600">Subtotal Dana Tambahan:</p>
        <p class="font-semibold text-gray-800">Rp. {{ number_format($subtotalAdditional, 0, ',', '.') }}</p>
      </div>
      <div class="text-right">
        <p class="text-gray-600">Total Pembayaran:</p>
        <p class="font-bold text-2xl text-green-600">
          Rp. {{ number_format($subtotalSpareparts + $subtotalAdditional + $riwayat->harga_service, 0, ',', '.') }}
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
 