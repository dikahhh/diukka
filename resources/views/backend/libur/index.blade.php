@extends('backend.layouts.master')

@section('content')
<body class="pl-64 bg-gradient-to-br from-blue-50 to-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4 py-6">
        <!-- Judul Halaman -->
        <h1 class="text-2xl font-bold mb-4 text-center text-blue-800">Daftar Hari Libur</h1>
        
        <!-- Form Filter Hari Libur -->
        <div class="flex justify-center mb-6">
            <form action="{{ route('libur.index') }}" method="GET" class="flex space-x-2">
                <input type="text" name="search" placeholder="Cari berdasarkan tanggal atau deskripsi" 
                       value="{{ request('search') }}" 
                       class="px-4 py-2 border rounded w-80" />
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Filter
                </button>
            </form>
        </div>

        <!-- Tombol dan Modal untuk Tambah Hari Libur -->
        <div x-data="{ showCreate: false }" class="mb-6">
            <button @click="showCreate = true"
                    class="bg-gradient-to-r from-teal-400 to-blue-400 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:from-teal-500 hover:to-blue-500 focus:ring focus:ring-blue-300 transition-all duration-300">
                Tambah Hari Libur
            </button>

            <!-- Modal Create -->
            <div x-show="showCreate" class="fixed inset-0 flex items-center justify-center z-50">
                <!-- Latar Belakang Gelap -->
                <div class="absolute inset-0 bg-black opacity-50" @click="showCreate = false"></div>

                <!-- Konten Modal -->
                <div class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg z-10">
                    @include('backend.libur.create')
                    <div class="flex justify-end mt-4">
                        <button @click="showCreate = false"
                                class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Data Hari Libur -->
        
            <div class="bg-white shadow-sm overflow-hidden border border-gray-300 mt-4">    
                <table id="tablelibur" class="table-auto w-full border-collapse text-sm">
                    <thead>
                        <tr class="bg-gradient-to-r from-blue-200 to-teal-200 text-gray-800">
                            <th class="border px-3 py-2 text-left font-medium">#</th>
                            <th class="border px-3 py-2 text-left font-medium">Tanggal</th>
                            <th class="border px-3 py-2 text-left font-medium">Deskripsi</th>
                            <th class="border px-3 py-2 text-center font-medium">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($libur as $holiday)
                            <tr class="hover:bg-blue-50 transition duration-200">
                                <td class="border px-3 py-2 text-gray-600">{{ $loop->iteration }}</td>
                                <td class="border px-3 py-2 text-gray-600">{{ $holiday->tanggal }}</td>
                                <td class="border px-3 py-2 text-gray-600">{{ $holiday->keterangan ?? '-' }}</td>
                                <td class="border px-3 py-2 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <!-- Tombol Edit dengan Modal Pop-Up -->
                                        <div x-data="{ showEdit: false }">
                                            <button @click="showEdit = true"
                                                    class="bg-orange-400 text-white font-semibold px-2 py-3 rounded-lg shadow-md hover:bg-orange-500 focus:ring focus:ring-orange-300 transition-all duration-300">
                                                Edit
                                            </button>
                                            <!-- Modal Edit -->
                                            <div x-show="showEdit" class="fixed inset-0 flex items-center justify-center z-50">
                                                <div class="absolute inset-0 bg-black opacity-50" @click="showEdit = false"></div>
                                                <div class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg z-10">
                                                    @include('backend.libur.edit', ['holiday' => $holiday])
                                                    <div class="flex justify-end mt-4">
                                                        <button @click="showEdit = false"
                                                                class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition">
                                                            Tutup
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('libur.destroy', $holiday->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="bg-red-200 text-red-700 font-medium px-5 py-2 rounded-lg shadow hover:bg-red-300 focus:ring focus:ring-red-200 transition duration-300">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>

    <script>
    $(document).ready(function () {
        $('#tablelibur').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "lengthChange": false,
            "pageLength": 10,
            "language": {
                "emptyTable": "Tidak ada data yang tersedia",
                "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                "infoEmpty": "Menampilkan 0 hingga 0 dari 0 entri",
                "lengthMenu": "Tampilkan _MENU_ entri",
                "search": "Cari:",
                "paginate": {
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }
            }
        });
    });
    </script>
</body>
@endsection
