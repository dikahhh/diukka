@extends('backend.layouts.master')

@section('content')
<body class="pl-64 bg-gradient-to-br from-blue-50 to-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4 py-6">
        <!-- Judul Halaman -->
        <h1 class="text-2xl font-bold mb-4 text-center text-blue-800">Daftar Karyawan</h1>

        <!-- Tombol Tambah Karyawan -->
        <div x-data="{ showCreate: false }">
            <!-- Tombol Trigger Modal -->
            <button @click="showCreate = true"
                    class="bg-gradient-to-r from-teal-400 to-blue-400 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:from-teal-500 hover:to-blue-500 focus:ring focus:ring-blue-300 transition-all duration-300">
                Tambah Karyawan
            </button>

            <!-- Modal Pop-Up -->
            <div x-show="showCreate" class="fixed inset-0 flex items-center justify-center z-50">
                <!-- Latar Belakang Gelap -->
                <div class="absolute inset-0 bg-black opacity-50" @click="showCreate = false"></div>

                <!-- Konten Modal -->
                <div class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg z-10">
                    <!-- Sertakan Form Create karyawan -->
                    @include('backend.karyawan.create')

                    <!-- Tombol Tutup -->
                    <div class="flex justify-end mt-4">
                        <button @click="showCreate = false"
                                class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel -->
        <div class="bg-white shadow-sm overflow-hidden border border-gray-300 mt-4">    
            <table id="tableKaryawan" class="table-auto w-full border-collapse text-sm">
                <thead>
                    <tr class="bg-gradient-to-r from-blue-200 to-teal-200 text-gray-800">
                        <th class="border px-3 py-2 text-left font-medium">#</th>
                        <th class="border px-3 py-2 text-left font-medium">Nama</th>
                        <th class="border px-3 py-2 text-left font-medium">Email</th>
                        <th class="border px-3 py-2 text-left font-medium">Umur</th>
                        <th class="border px-3 py-2 text-left font-medium">Alamat</th>
                        <th class="border px-3 py-2 text-left font-medium">No Telp</th>
                        <th class="border px-3 py-2 text-left font-medium">Gender</th>
                        <th class="border px-3 py-2 text-left font-medium">Image</th>
                        <th class="border px-3 py-2 text-center font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($karyawans as $karyawan)
                        <tr class="hover:bg-blue-50 transition duration-200">
                            <td class="border px-3 py-2 text-gray-600">{{ $loop->iteration }}</td>
                            <td class="border px-3 py-2 text-gray-600">{{ $karyawan->nama }}</td>
                            <td class="border px-3 py-2 text-gray-600">{{ $karyawan->email }}</td>
                            <td class="border px-3 py-2 text-gray-600">{{ $karyawan->umur }}</td>
                            <td class="border px-3 py-2 text-gray-600">{{ $karyawan->alamat }}</td>
                            <td class="border px-3 py-2 text-gray-600">{{ $karyawan->no_telp }}</td>
                            <td class="border px-3 py-2 text-gray-600">{{ $karyawan->gender }}</td>
                            <td class="border px-3 py-2 text-gray-600">
                                @if($karyawan->image)
                                    <img src="{{ asset('storage/' . $karyawan->image) }}" alt="{{ $karyawan->nama }}" width="50">
                                @else
                                    -
                                @endif
                            </td>
                            <td class="border px-3 py-2 text-center">
                                <div class="flex justify-center space-x-2">
                                    <!-- Tombol edit Karyawan -->
                                    <div x-data="{ showEdit: false }">
                                        <!-- Tombol Trigger Modal -->
                                        <button @click="showEdit = true"
                                                class="bg-orange-400 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-orange-500 focus:ring focus:ring-orange-300 transition-all duration-300">
                                            Edit
                                        </button>

                                        <!-- Modal Pop-Up -->
                                        <div x-show="showEdit" class="fixed inset-0 flex items-center justify-center z-50">
                                            <!-- Latar Belakang Gelap -->
                                            <div class="absolute inset-0 bg-black opacity-50" @click="showEdit = false"></div>

                                            <!-- Konten Modal -->
                                            <div class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg z-10">
                                                <!-- Sertakan Form Edit karyawan -->
                                                @include('backend.karyawan.edit', ['karyawan' => $karyawan])

                                                <!-- Tombol Tutup -->
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
                                    <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
</body>
<script>
    $(document).ready( function () {
        $('#tableKaryawan').DataTable({
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