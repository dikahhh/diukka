@extends('backend.layouts.master')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">Tambah Stock Sparepart</h1>

    <form action="{{ route('stock.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label for="sparepart_id" class="block text-sm font-medium text-gray-700">Nama Sparepart</label>
            <select name="sparepart_id" id="sparepart_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                <option value="">Pilih Sparepart</option>
                @foreach($spareparts as $sparepart)
                    <option value="{{ $sparepart->id }}">{{ $sparepart->nama }}</option>
                @endforeach
            </select>
            @error('sparepart_id')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-4">
            <label for="quantity" class="block text-sm font-medium text-gray-700">Jumlah Stock</label>
            <input type="number" name="quantity" id="quantity" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" min="1" required>
            @error('quantity')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-4">
            <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan (Opsional)</label>
            <textarea name="keterangan" id="keterangan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" rows="3"></textarea>
            @error('keterangan')
                <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">Simpan</button>
            <a href="{{ route('stock.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">Kembali</a>
        </div>
    </form>
</div>
@endsection