
    <form action="{{ route('service.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group my-3">
            <label for="jenis_service">Jenis Service</label>
            <input type="text" name="jenis_service" id="jenis_service" class="form-control" value="{{ old('jenis_service', $service->jenis_service) }}">
            @error('jenis_service')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="harga">Harga (Rp)</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga', $service->harga) }}" step="0.01">
            @error('harga')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('service.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
