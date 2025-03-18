@extends('backend.layouts.master')

@section('content')
<div class="container mx-auto px-6 py-10">
  <h2 class="text-4xl font-bold text-center mb-8">Tambah Riwayat</h2>
  
  <form action="{{ route('riwayat.store') }}" method="POST" class="w-full max-w-lg mx-auto">
    @csrf
    <div class="mb-4">
      <label class="block text-gray-700">Jenis Service</label>
      <input type="text" name="jenis_service" class="w-full border rounded px-3 py-2" value="{{ old('jenis_service') }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Keluhan</label>
      <textarea name="keluhan" class="w-full border rounded px-3 py-2">{{ old('keluhan') }}</textarea>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Cabang</label>
      <input type="text" name="cabang" class="w-full border rounded px-3 py-2" value="{{ old('cabang') }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Tempat</label>
      <input type="text" name="tempat" class="w-full border rounded px-3 py-2" value="{{ old('tempat') }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Tanggal</label>
      <input type="date" name="tanggal" class="w-full border rounded px-3 py-2" value="{{ old('tanggal') }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">No Antrian</label>
      <input type="number" name="no_antrian" class="w-full border rounded px-3 py-2" value="{{ old('no_antrian') }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">KTP</label>
      <input type="text" name="ktp" class="w-full border rounded px-3 py-2" value="{{ old('ktp') }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Karyawan</label>
      <select name="karyawan_id" class="w-full border rounded px-3 py-2">
        <option value="">Pilih Karyawan</option>
        @foreach($karyawans as $karyawan)
          <option value="{{ $karyawan->id }}" {{ old('karyawan_id') == $karyawan->id ? 'selected' : '' }}>{{ $karyawan->nama }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Catatan</label>
      <textarea name="catatan" class="w-full border rounded px-3 py-2">{{ old('catatan') }}</textarea>
    </div>
    <!-- Input Dana Tambahan -->
    <div>
      <label for="dana_tambahan" class="block text-sm font-medium text-gray-700">Dana Tambahan (misal service, biaya lain-lain)</label>
      <input type="number" step="0.01" name="dana_tambahan" id="dana_tambahan" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Masukkan dana tambahan" value="0">
    </div>

    <!-- Optional: Spareparts selection -->
    <div class="mb-4">
      <label class="block text-gray-700">Spareparts (opsional)</label>
      <div id="sparepart-container">
          <div class="flex items-center space-x-4 mb-2">
              <div class="w-1/2">
                  <select name="spareparts_id[]" class="w-full border rounded px-3 py-2">
                      <option value="">Pilih Sparepart</option>
                      @foreach($spareparts as $sparepart)
                          <option value="{{ $sparepart->id }}">{{ $sparepart->nama }} (Stock: {{ $sparepart->stock }})</option>
                      @endforeach
                  </select>
              </div>
              <div class="w-1/2">
                  <input type="number" name="quantities[]" min="1" class="w-full border rounded px-3 py-2" placeholder="Jumlah">
              </div>
          </div>
      </div>
      <button type="button" id="add-sparepart" class="text-blue-500 hover:text-blue-700">Tambah Sparepart</button>
    </div>
    <div class="flex justify-end">
      <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
    </div>
  </form>
</div>
<script>
document.getElementById('add-sparepart').addEventListener('click', function() {
    var container = document.getElementById('sparepart-container');
    var div = document.createElement('div');
    div.classList.add('flex', 'items-center', 'space-x-4', 'mb-2');
    div.innerHTML = `
        <div class="w-1/2">
            <select name="spareparts_id[]" class="w-full border rounded px-3 py-2">
                <option value="">Pilih Sparepart</option>
                @foreach($spareparts as $sparepart)
                    <option value="{{ $sparepart->id }}">{{ $sparepart->nama }} (Stock: {{ $sparepart->stock }})</option>
                @endforeach
            </select>
        </div>
        <div class="w-1/2">
            <input type="number" name="quantities[]" min="1" class="w-full border rounded px-3 py-2" placeholder="Jumlah">
        </div>
    `;
    container.appendChild(div);
});
</script>
@endsection
