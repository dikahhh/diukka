
  <form action="{{ route('sparepart.update', $sparepart->id) }}" method="POST" enctype="multipart/form-data" class="w-full max-w-lg mx-auto">
    @csrf
    @method('PUT')
    <div class="mb-4">
      <label class="block text-gray-700">Nama</label>
      <input type="text" name="nama" class="w-full border rounded px-3 py-2" value="{{ old('nama', $sparepart->nama) }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Stock</label>
      <input type="number" name="stock" class="w-full border rounded px-3 py-2" value="{{ old('stock', $sparepart->stock) }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Harga</label>
      <input type="number" step="0.01" name="harga" class="w-full border rounded px-3 py-2" value="{{ old('harga', $sparepart->harga) }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Deskripsi</label>
      <textarea name="deskripsi" class="w-full border rounded px-3 py-2">{{ old('deskripsi', $sparepart->deskripsi) }}</textarea>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Image</label>
      @if($sparepart->image)
        <img src="{{ asset('storage/' . $sparepart->image) }}" alt="{{ $sparepart->nama }}" width="100" class="mb-2">
      @endif
      <input type="file" name="image" class="w-full">
    </div>
    <div class="flex justify-end">
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </div>
  </form>


