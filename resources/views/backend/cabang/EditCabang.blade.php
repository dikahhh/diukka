
        <form action="{{ route('cabang.update', $cabang->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Nama Cabang -->
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Cabang</label>
                <input type="text" id="nama" name="nama" value="{{ $cabang->nama }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300" required>
            </div>

            <!-- Tempat -->
            <div id="tempat-container">
                <label class="block text-sm font-medium text-gray-700 mb-1">Tempat</label>

                @foreach($cabang->tempat as $index => $tempat)
                    <div class="mt-2 flex items-center gap-2">
                        <input type="text" name="tempat[]" value="{{ $tempat->nama_tempat }}" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300" required>
                        <button type="button" onclick="removeTempat(this)" 
                                class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 focus:ring-2 focus:ring-red-400 focus:outline-none transition duration-300">Hapus</button>
                    </div>
                @endforeach
            </div>

            <!-- Tombol Tambah Tempat -->
            <button type="button" onclick="addTempat()" 
                    class="w-full bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 focus:ring-2 focus:ring-gray-400 focus:outline-none transition duration-300">
                Tambah Tempat
            </button>

            <!-- Tombol Submit -->
            <div>
                <button type="submit" 
                        class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-300">
                    Simpan Perubahan
                </button>
            </div>
        </form>

<script>
    function addTempat() {
        const container = document.getElementById('tempat-container');
        const newInput = document.createElement('div');
        newInput.classList.add('mt-2', 'flex', 'items-center', 'gap-2');
        newInput.innerHTML = `
            <input type="text" name="tempat[]" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300" required>
            <button type="button" onclick="removeTempat(this)" 
                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 focus:ring-2 focus:ring-red-400 focus:outline-none transition duration-300">Hapus</button>
        `;
        container.appendChild(newInput);
    }

    function removeTempat(button) {
        button.parentElement.remove();
    }
</script>