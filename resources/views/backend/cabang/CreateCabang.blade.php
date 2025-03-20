        <form action="{{ route('cabang.store') }}" method="POST" class="space-y-4">
            @csrf
            
            <!-- Nama Cabang -->
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Cabang</label>
                <input type="text" id="nama" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300" required>
            </div>

            <!-- Tempat -->
            <div id="tempat-container">
                <label for="tempat-1" class="block text-sm font-medium text-gray-700 mb-1">Nama Tempat 1</label>
                <input type="text" id="tempat-1" name="tempat[]" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300" required>
            </div>

            <!-- Tombol Tambah Tempat -->
            <button type="button" onclick="addTempat()" class="w-full bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 focus:ring-2 focus:ring-gray-400 focus:outline-none transition duration-300">
                Tambah Tempat
            </button>

            <!-- Tombol Submit -->
            <div>
                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-300">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>

    <script>
        let tempatCount = 1;
        function addTempat() {
            tempatCount++;
            const container = document.getElementById('tempat-container');
            const newInput = `
                <div class="mt-4">
                    <label for="tempat-${tempatCount}" class="block text-sm font-medium text-gray-700 mb-1">Nama Tempat ${tempatCount}</label>
                    <input type="text" id="tempat-${tempatCount}" name="tempat[]" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300" required>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', newInput);
        }
    </script>