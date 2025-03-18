@extends('backend.layouts.master')

@section('content')
<div class="container mx-auto px-6 py-10">
  <h2 class="text-4xl font-bold text-center mb-8">Edit Riwayat</h2>

  <form action="{{ route('riwayat.update', $riwayat->id) }}" method="POST" class="w-full max-w-lg mx-auto">
    @csrf
    @method('PUT')
    <div class="mb-4">
      <label class="block text-gray-700">Jenis Service</label>
      <input type="text" name="jenis_service" class="w-full border rounded px-3 py-2" value="{{ old('jenis_service', $riwayat->jenis_service) }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Keluhan</label>
      <textarea name="keluhan" class="w-full border rounded px-3 py-2">{{ old('keluhan', $riwayat->keluhan) }}</textarea>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Cabang</label>
      <input type="text" name="cabang" class="w-full border rounded px-3 py-2" value="{{ old('cabang', $riwayat->cabang) }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Tempat</label>
      <input type="text" name="tempat" class="w-full border rounded px-3 py-2" value="{{ old('tempat', $riwayat->tempat) }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Tanggal</label>
      <input type="date" name="tanggal" class="w-full border rounded px-3 py-2" value="{{ old('tanggal', $riwayat->tanggal) }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">No Antrian</label>
      <input type="number" name="no_antrian" class="w-full border rounded px-3 py-2" value="{{ old('no_antrian', $riwayat->no_antrian) }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">KTP</label>
      <input type="text" name="ktp" class="w-full border rounded px-3 py-2" value="{{ old('ktp', $riwayat->ktp) }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Karyawan</label>
      <select name="karyawan_id" class="w-full border rounded px-3 py-2">
        <option value="">Pilih Karyawan</option>
        @foreach($karyawans as $karyawan)
          <option value="{{ $karyawan->id }}" {{ old('karyawan_id', $riwayat->karyawan_id) == $karyawan->id ? 'selected' : '' }}>{{ $karyawan->nama }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Catatan</label>
      <textarea name="catatan" class="w-full border rounded px-3 py-2">{{ old('catatan', $riwayat->catatan) }}</textarea>
    </div>
    <!-- Spareparts (opsional) -->
    <div class="mb-4">
      <label class="block text-gray-700">Spareparts (opsional)</label>
      <div id="sparepart-container">
          @if($riwayat->spareparts)
              @foreach($riwayat->spareparts as $sparepart)
                  <div class="flex items-center space-x-4 mb-2">
                      <div class="w-1/2">
                          <select name="spareparts_id[]" class="w-full border rounded px-3 py-2">
                              <option value="">Pilih Sparepart</option>
                              @foreach($spareparts as $spare)
                                  <option value="{{ $spare->id }}" {{ $spare->id == $sparepart->id ? 'selected' : '' }}>
                                      {{ $spare->nama }} (Stock: {{ $spare->stock }})
                                  </option>
                              @endforeach
                          </select>
                      </div>
                      <div class="w-1/2">
                          <input type="number" name="quantities[]" min="1" class="w-full border rounded px-3 py-2" value="{{ $sparepart->pivot->quantity }}" placeholder="Jumlah">
                      </div>
                  </div>
              @endforeach
          @endif
      </div>
      <button type="button" id="add-sparepart" class="text-blue-500 hover:text-blue-700">Tambah Sparepart</button>
    </div>
    <div class="flex justify-end">
      <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
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
                @foreach($spareparts as $spare)
                    <option value="{{ $spare->id }}">{{ $spare->nama }} (Stock: {{ $spare->stock }})</option>
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
