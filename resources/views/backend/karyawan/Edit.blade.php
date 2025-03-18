

  <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST" enctype="multipart/form-data" class="w-full max-w-lg mx-auto">
    @csrf
    @method('PUT')
    <div class="mb-4">
      <label class="block text-gray-700">Nama</label>
      <input type="text" name="nama" class="w-full border rounded px-3 py-2" value="{{ old('nama', $karyawan->nama) }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Email</label>
      <input type="email" name="email" class="w-full border rounded px-3 py-2" value="{{ old('email', $karyawan->email) }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Umur</label>
      <input type="number" name="umur" class="w-full border rounded px-3 py-2" value="{{ old('umur', $karyawan->umur) }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Alamat</label>
      <textarea name="alamat" class="w-full border rounded px-3 py-2">{{ old('alamat', $karyawan->alamat) }}</textarea>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">No Telp</label>
      <input type="text" name="no_telp" class="w-full border rounded px-3 py-2" value="{{ old('no_telp', $karyawan->no_telp) }}">
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Gender</label>
      <select name="gender" class="w-full border rounded px-3 py-2">
        <option value="">Pilih Gender</option>
        <option value="male" {{ old('gender', $karyawan->gender) == 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ old('gender', $karyawan->gender) == 'female' ? 'selected' : '' }}>Female</option>
        <option value="other" {{ old('gender', $karyawan->gender) == 'other' ? 'selected' : '' }}>Other</option>
      </select>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700">Image</label>
      @if($karyawan->image)
        <img src="{{ asset('storage/' . $karyawan->image) }}" alt="{{ $karyawan->nama }}" width="100" class="mb-2">
      @endif
      <input type="file" name="image" class="w-full">
    </div>
    <div class="flex justify-end">
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </div>
  </form>
