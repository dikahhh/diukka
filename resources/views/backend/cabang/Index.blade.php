@extends('backend.layouts.master')

@section('content')
<body class="pl-64 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4 text-center text-blue-800">Daftar Cabang</h1>
        
        <!-- Container Modal untuk Tambah cabang -->
        <div x-data="{ showCreate: false }">
            <!-- Tombol Trigger Modal -->
            <button @click="showCreate = true"
                    class="bg-gradient-to-r from-teal-400 to-blue-400 text-white font-medium px-4 py-2 rounded-md shadow-sm hover:from-teal-500 hover:to-blue-500 focus:ring focus:ring-blue-300 transition-all duration-200 text-sm">
                Tambah Cabang
            </button>

            <!-- Modal Pop-Up -->
            <div x-show="showCreate" class="fixed inset-0 flex items-center justify-center z-50">
                <!-- Latar Belakang Gelap -->
                <div class="absolute inset-0 bg-transparent" @click="showCreate = false"></div>

                <!-- Konten Modal -->
                <div class="bg-white w-full max-w-md p-4 rounded-lg shadow-lg z-10 border border-gray-300">
                    <!-- Sertakan Form Create cabang -->
                    @include('backend.cabang.createcabang')

                    <!-- Tombol Tutup -->
                    <div class="flex justify-end mt-3">
                        <button @click="showCreate = false"
                                class="bg-gray-300 text-gray-700 px-3 py-1 rounded-md hover:bg-gray-400 transition text-sm">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white shadow-sm overflow-hidden border border-gray-300 mt-4">    
            <table id="tableCabang" class="table-auto w-full border-collapse text-sm">
                <thead>
                    <tr class="bg-gradient-to-r from-blue-200 to-teal-200 text-gray-800">
                        <th class="border px-3 py-2 text-left font-medium">#</th>
                        <th class="border px-3 py-2 text-left font-medium">Nama Cabang</th>
                        <th class="border px-3 py-2 text-left font-medium">Tempat</th>
                        <th class="border px-3 py-2 text-center font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cabangs as $index => $item)
                        <tr class="hover:bg-blue-50 transition duration-150">
                            <td class="border px-3 py-2 text-gray-600">{{ $index + 1 }}</td>
                            <td class="border px-3 py-2 text-gray-600 font-medium">{{ $item->nama }}</td>
                            <td class="border px-3 py-2 text-gray-600">
                                <ul class="list-disc pl-4">
                                    @foreach ($item->tempat as $tempat)
                                        <li class="text-sm">{{ $tempat->nama_tempat }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="border px-3 py-2 text-center">
                                <div class="flex justify-center space-x-2">
                                    <!-- Container Modal untuk edit cabang -->
                                    <div x-data="{ editCreate: false }">
                                        <!-- Tombol Trigger Modal -->
                                        <button @click="editCreate = true"
                                                class="bg-gradient-to-r from-teal-400 to-blue-400 text-white font-medium px-4 py-2 rounded-md shadow-sm hover:from-teal-500 hover:to-blue-500 focus:ring focus:ring-blue-300 transition-all duration-200 text-sm">
                                            Edit
                                        </button>

                                        <!-- Modal Pop-Up -->
                                        <div x-show="editCreate" class="fixed inset-0 flex items-center justify-center z-50">
                                            <!-- Latar Belakang Gelap -->
                                            <div class="absolute inset-0 bg-transparent" @click="editCreate = false"></div>

                                            <!-- Konten Modal -->
                                            <div class="bg-white w-full max-w-md p-4 rounded-lg shadow-lg z-10 border border-gray-300">
                                                <!-- Sertakan Form Create cabang -->
                                                @include('backend.cabang.editcabang'    , ['cabang' => $item])
                                                <!-- Tombol Tutup -->
                                                <div class="flex justify-end mt-3">
                                                    <button @click="editCreate = false"
                                                            class="bg-gray-300 text-gray-700 px-3 py-1 rounded-md hover:bg-gray-400 transition text-sm">
                                                        Tutup
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('cabang.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus cabang ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-600 text-white font-medium px-4 py-2 rounded-md shadow-sm hover:bg-red-500 focus:ring focus:ring-red-200 transition duration-200 text-sm">
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
</body>
</html>
<script>
    $(document).ready( function () {
        $('#tableCabang').DataTable({
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
@endsection