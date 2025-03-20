@extends('backend.layouts.master')

@section('content')
<body class="pl-64 bg-gradient-to-br from-blue-50 to-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4 py-6">
        <!-- Judul Halaman -->
        <h1 class="text-2xl font-bold mb-4 text-center text-blue-800">Daftar Riwayat</h1>

        <!-- Form Filter Riwayat -->
        <div class="flex justify-center mb-6">
            <form action="{{ route('riwayat.index') }}" method="GET" class="flex space-x-2">
                <input type="text" name="search" placeholder="Cari berdasarkan KTP, Kendaraan, atau Service" 
                       value="{{ $search }}" 
                       class="px-4 py-2 border rounded w-80" />
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Filter
                </button>
            </form>
        </div>
        <div class="flex justify-end mb-6">
            <a href="{{ route('riwayat.create') }}"
               class="bg-gradient-to-r from-teal-400 to-blue-400 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:from-teal-500 hover:to-blue-500 focus:ring focus:ring-blue-300 transition-all duration-300">
                Buat riwayat langsung
            </a>
        </div>

        <!-- Tabel Data Riwayat hanya jika filter sudah diterapkan -->
        @if($search)
            @if($riwayats->isNotEmpty())
                <div class="bg-white shadow-sm overflow-hidden border border-gray-300 mt-4">    
                    <table id="tableRiwayat" class="table-auto w-full border-collapse text-sm">
                        <thead>
                            <tr class="bg-gradient-to-r from-blue-200 to-teal-200 text-gray-800">
                                <th class="border px-3 py-2 text-left font-medium">#</th>
                                <th class="border px-3 py-2 text-left font-medium">Riwayat</th>
                                <th class="border px-3 py-2 text-left font-medium">KTP</th>
                                <th class="border px-3 py-2 text-left font-medium">No Plat</th>
                                <th class="border px-3 py-2 text-left font-medium">Merek</th>
                                <th class="border px-3 py-2 text-left font-medium">Mekanik</th>
                                <th class="border px-3 py-2 text-left font-medium">Service</th>
                                <th class="border px-3 py-2 text-left font-medium">Tanggal</th>
                                <th class="border px-3 py-2 text-left font-medium">Spareparts</th>
                                <th class="border px-3 py-2 text-left font-medium">Status</th>
                                <th class="border px-3 py-2 text-center font-medium">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($riwayats as $riwayat)
                                <tr class="hover:bg-blue-50 transition duration-200">
                                    <td class="border px-3 py-2 text-gray-600">{{ $loop->iteration }}</td>
                                    <td class="border px-3 py-2 text-gray-600">Riwayat ID: {{ $riwayat->id }}</td>
                                    <td class="border px-3 py-2 text-gray-600">{{ $riwayat->ktp }}</td>
                                    <td class="border px-3 py-2 text-gray-600">{{ $riwayat->kendaraan }}</td>
                                    <td class="border px-3 py-2 text-gray-600">{{ $riwayat->kendaraanRel->merk ?? 'Data tidak tersedia' }}</td>
                                    <td class="border px-3 py-2 text-gray-600">{{ $riwayat->karyawan->nama ?? 'Tidak terdapat data' }}</td>
                                    <td class="border px-3 py-2 text-gray-600">{{ $riwayat->jenis_service }}</td>
                                    <td class="border px-3 py-2 text-gray-600">{{ $riwayat->tanggal }}</td>
                                    <td class="border px-3 py-2 text-gray-600">
                                        @if($riwayat->spareparts->isNotEmpty())
                                            @foreach($riwayat->spareparts as $spare)
                                                <div>
                                                    {{ $spare->nama }} (Qty: {{ $spare->pivot->quantity }})
                                                </div>
                                            @endforeach
                                        @else
                                            <span>Tidak ada sparepart</span>
                                        @endif
                                    </td>
                                    <td class="border px-3 py-2 text-gray-600">
                                        <!-- Form untuk update status -->
                                        <form action="{{ route('riwayat.updateStatus', $riwayat->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" onchange="this.form.submit()" class="border rounded px-2 py-1">
                                            <option value="belum dibayar" {{ $riwayat->status == 'belum dibayar' ? 'selected' : '' }}>belum dibayar</option>
                                            <option value="lunas" {{ $riwayat->status == 'lunas' ? 'selected' : '' }}>lunas</option>
                                            <option value="belum lunas" {{ $riwayat->status == 'belum lunas' ? 'selected' : '' }}>belum lunas</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="border px-3 py-2 text-center">
                                        <div class="flex flex-col md:flex-row justify-center space-y-2 md:space-y-0 md:space-x-4">
                                            <a href="{{ route('riwayat.invoice', $riwayat->id) }}" 
                                               class="bg-blue-500 text-white px-4 py-2 rounded">
                                                Lihat Invoice
                                            </a>
                                            <!-- Tombol Print Invoice -->
                                            <a href="#" onclick="printInvoice('{{ route('riwayat.invoice', $riwayat->id) }}')" 
                                               class="bg-green-500 text-white px-4 py-2 rounded">
                                                Print Invoice
                                            </a>
                                            <a href="{{ route('riwayat.edit', $riwayat->id) }}" 
                                               class="text-blue-500 px-4 py-2 border rounded">
                                                Edit
                                            </a>
                                            <form action="{{ route('riwayat.destroy', $riwayat->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 px-4 py-2 border rounded">
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
            @else
                <p class="text-center text-gray-600">Data riwayat tidak ditemukan untuk filter: <strong>{{ $search }}</strong></p>
            @endif
        @else
            <p class="text-center text-gray-600">Silahkan masukkan filter pencarian untuk menampilkan data riwayat.</p>
        @endif
    </div>

    <script>
    $(document).ready(function () {
        $('#tableRiwayat').DataTable({
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

    function printInvoice(url) {
        // Buka invoice di jendela baru
        var printWindow = window.open(url, '_blank');
        // Saat jendela sudah dimuat, panggil perintah print
        printWindow.addEventListener('load', function(){
            printWindow.print();
        }, true);
    }
    </script>
</body>
@endsection
