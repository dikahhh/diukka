
  <form action="{{ route('sparepart.store') }}" method="POST" enctype="multipart/form-data" class="w-full max-w-lg mx-auto">
    @csrf
    <div class="mb-4">
      <label class="block text-gray-700">Nama</label>
      <input type="text" name="nama" class="w-full border rounded px-3 py-2" value="{{ old('nama') }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Stock</label>
      <input type="number" name="stock" class="w-full border rounded px-3 py-2" value="{{ old('stock') }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Harga</label>
      <input type="number" step="0.01" name="harga" class="w-full border rounded px-3 py-2" value="{{ old('harga') }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Deskripsi</label>
      <textarea name="deskripsi" class="w-full border rounded px-3 py-2">{{ old('deskripsi') }}</textarea>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Image</label>
      <input type="file" name="image" class="w-full">
    </div>
    <div class="flex justify-end">
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </div>
  </form>
</div>
