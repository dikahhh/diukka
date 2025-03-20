@extends('backend.layouts.master')

@section('content')
<body class="pl-64 bg-gradient-to-br from-blue-50 to-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4 text-center text-blue-800">Laporan Keuangan</h1>
        
        <!-- Form Filter Range Tanggal -->
        <form action="{{ route('laporan.index') }}" method="GET" class="flex space-x-4 mb-6 justify-center">
            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700">Dari Tanggal:</label>
                <input type="date" name="start_date" id="start_date" value="{{ $start_date }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700">Sampai Tanggal:</label>
                <input type="date" name="end_date" id="end_date" value="{{ $end_date }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Filter</button>
            </div>
        </form>
        
        <!-- Tombol Action Export -->
        <div class="flex justify-end mb-4 space-x-4">
            <a href="{{ route('laporan.export.csv', ['start_date' => $start_date, 'end_date' => $end_date]) }}" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
                Export ke CSV
            </a>        
        </div>
        
        <!-- Tabel Data Laporan -->
        <div class="bg-white shadow-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-blue-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No Plat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga Service</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga Sparepart</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dana Tambahan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($riwayats as $index => $riwayat)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $riwayat->tanggal }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $riwayat->kendaraan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $riwayat->jenis_service }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($riwayat->harga_service, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($riwayat->harga, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($riwayat->dana_tambahan, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                Rp {{ number_format($riwayat->harga + $riwayat->harga_service + $riwayat->dana_tambahan, 2) }}
                            </td>
                        </tr>
                    @endforeach
                    <!-- Baris Total -->
                    <tr class="bg-blue-50 font-semibold">
                        <td class="px-6 py-4 whitespace-nowrap" colspan="4">Total</td>
                        <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($totalHargaService, 2) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($totalSpareparts, 2) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($totalDanaTambahan, 2) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($totalPendapatan, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script>
    function printReport() {
        var printContents = document.body.innerHTML;
        var printWindow = window.open('', '', 'height=800,width=1200');
        printWindow.document.write('<html><head><title>Laporan Keuangan</title>');
        printWindow.document.write('<link rel="stylesheet" href="{{ asset("css/app.css") }}">'); // Sertakan CSS jika perlu
        printWindow.document.write('</head><body >');
        printWindow.document.write(printContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>
@endsection