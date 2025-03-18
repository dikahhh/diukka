@extends('backend.layouts.master')

@section('content')
<body class="pl-64 bg-gradient-to-br from-blue-50 to-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4 text-center text-blue-800">Data Penambahan Stock Sparepart</h1>

        <!-- Tombol untuk menambah stock -->
        <div class="flex justify-end mb-6">
            <a href="{{ route('stock.create') }}" class="bg-gradient-to-r from-teal-400 to-blue-400 text-white font-semibold py-2 px-4 rounded-lg mb-3 inline-block transition duration-300">
                Tambah Stock
            </a>
        </div>

        <!-- Notifikasi sukses -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel daftar penambahan stock -->
        <div class="overflow-x-auto">
            <table id="tableTambahstock" class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gradient-to-r from-blue-200 to-teal-200 text-gray-800 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">No.</th>
                        <th class="py-3 px-6 text-left">Nama Sparepart</th>
                        <th class="py-3 px-6 text-left">Jumlah</th>
                        <th class="py-3 px-6 text-left">Keterangan</th>
                        <th class="py-3 px-6 text-left">Operator</th>
                        <th class="py-3 px-6 text-left">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm font-light">
                    @foreach($tambahStocks as $index => $stock)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">{{ $index + 1 }}</td>
                            <td class="py-3 px-6 text-left">{{ $stock->sparepart->nama ?? 'N/A' }}</td>
                            <td class="py-3 px-6 text-left">{{ $stock->quantity }}</td>
                            <td class="py-3 px-6 text-left">{{ $stock->keterangan }}</td>
                            <td class="py-3 px-6 text-left">{{ $stock->user->name ?? 'N/A' }}</td>
                            <td class="py-3 px-6 text-left">{{ $stock->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
<script>
    $(document).ready( function () {
        $('#tableTambahstock').DataTable({
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