
  <form action="{{ route('karyawan.store') }}" method="POST" enctype="multipart/form-data" class="w-full max-w-lg mx-auto">
    @csrf
    <div class="mb-4">
      <label class="block text-gray-700">Nama</label>
      <input type="text" name="nama" class="w-full border rounded px-3 py-2" value="{{ old('nama') }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Email</label>
      <input type="email" name="email" class="w-full border rounded px-3 py-2" value="{{ old('email') }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Umur</label>
      <input type="number" name="umur" class="w-full border rounded px-3 py-2" value="{{ old('umur') }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Alamat</label>
      <textarea name="alamat" class="w-full border rounded px-3 py-2">{{ old('alamat') }}</textarea>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">No Telp</label>
      <input type="text" name="no_telp" class="w-full border rounded px-3 py-2" value="{{ old('no_telp') }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Gender</label>
      <select name="gender" class="w-full border rounded px-3 py-2">
        <option value="">Pilih Gender</option>
        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
      </select>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Image</label>
      <input type="file" name="image" class="w-full">
    </div>
    <div class="flex justify-end">
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </div>
  </form>