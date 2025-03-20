
    <form action="{{ route('service.store') }}" method="POST">
        @csrf

        <div class="form-group my-3">
            <label for="jenis_service" class="block text-sm text-gray-700 mb-1">Jenis Service</label>
            <input type="text" name="jenis_service" id="jenis_service" class="form-control" value="{{ old('jenis_service') }}">
            @error('jenis_service')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="harga">Harga (Rp)</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga') }}" step="0.01">
            @error('harga')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('service.index') }}" class="btn btn-secondary">Kembali</a>
    </form>