
        <form action="{{ route('kendaraan.update', $kendaraan->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Nomor Plat -->
            <div>
                <label for="no_plat" class="block text-sm font-medium text-gray-700 mb-1">Nomor Plat</label>
                <input type="text" id="no_plat" name="no_plat" value="{{ $kendaraan->no_plat }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300" required>
            </div>

            <!-- Merk -->
            <div>
                <label for="merk" class="block text-sm font-medium text-gray-700 mb-1">Merk</label>
                <input type="text" id="merk" name="merk" value="{{ $kendaraan->merk }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300" required>
            </div>

            <!-- Tipe -->
            <div>
                <label for="tipe" class="block text-sm font-medium text-gray-700 mb-1">Tipe</label>
                <input type="text" id="tipe" name="tipe" value="{{ $kendaraan->tipe }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300" required>
            </div>

            <!-- Transmisi -->
            <div>
                <label for="transmisi" class="block text-sm font-medium text-gray-700 mb-1">Transmisi</label>
                <select id="transmisi" name="transmisi" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                    <option value="Manual" {{ $kendaraan->transmisi == 'Manual' ? 'selected' : '' }}>Manual</option>
                    <option value="Automatic" {{ $kendaraan->transmisi == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                </select>
            </div>

            <!-- Tahun -->
            <div>
                <label for="tahun" class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
                <input type="number" id="tahun" name="tahun" value="{{ $kendaraan->tahun }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300" required>
            </div>

            <!-- Nomor Mesin -->
            <div>
                <label for="no_mesin" class="block text-sm font-medium text-gray-700 mb-1">Nomor Mesin</label>
                <input type="text" id="no_mesin" name="no_mesin" value="{{ $kendaraan->no_mesin }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300" required>
            </div>

             <!-- CC -->
            <div>
                <label for="cc" class="block text-sm font-medium text-gray-700 mb-1">CC</label>
                <input type="number" id="cc" name="cc" value="{{ $kendaraan->cc }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300" required>
            </div>

            <!-- KTP -->
            <div>
                <label for="ktp" class="block text-sm font-medium text-gray-700 mb-1">KTP</label>
                <input type="text" id="ktp" name="ktp" value="{{ $kendaraan->ktp }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300" readonly>
            </div>

            <!-- Tombol Submit -->
            <div>
                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-300">
                    Perbarui Data
                </button>
            </div>
        </form>
