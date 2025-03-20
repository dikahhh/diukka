<form action="{{ route('libur.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
      <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
      <input type="date" name="tanggal" id="tanggal" required 
             class="w-full px-4 py-2 border rounded-lg" 
             value="{{ old('tanggal') }}">
    </div>
    <div>
      <label for="keterangan" class="block text-sm font-medium text-gray-700">Deskripsi</label>
      <input type="text" name="keterangan" id="keterangan" 
             class="w-full px-4 py-2 border rounded-lg" 
             placeholder="Opsional" value="{{ old('keterangan') }}">
    </div>
    <div class="flex justify-end">
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        Simpan
      </button>
    </div>
  </form>
  