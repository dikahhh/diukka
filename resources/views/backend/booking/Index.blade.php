@extends('backend.layouts.master')

@section('content')
<body class="pl-64 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-bold mb-4 text-center text-blue-800">
            Daftar Booking - Tanggal: {{ \Carbon\Carbon::parse($tanggal)->format('d-m-Y') }}
        </h2>

        <!-- Form Filter Tanggal (Opsional) -->
        <div class="flex justify-end mb-6">
            <form action="{{ route('booking.index') }}" method="GET" class="flex space-x-2">
                <input type="date" name="tanggal" value="{{ $tanggal }}" class="px-4 py-2 border rounded">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Filter</button>
            </form>
        </div>

        <div class="flex justify-end mb-6">
            <a href="{{ route('booking.create') }}"
               class="bg-gradient-to-r from-teal-400 to-blue-400 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:from-teal-500 hover:to-blue-500 focus:ring focus:ring-blue-300 transition-all duration-300">
                Buat Booking Baru
            </a>
        </div>
        <div class="flex justify-end mb-6">
            <a href="{{ route('booking.createFormAdmin') }}"
               class="bg-gradient-to-r from-teal-400 to-blue-400 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:from-teal-500 hover:to-blue-500 focus:ring focus:ring-blue-300 transition-all duration-300">
                Buat Booking Baru dari Admin
            </a>
        </div>

        <div class="bg-white shadow-sm overflow-hidden border border-gray-300 mt-4">    
            <table id="tableBooking" class="table-auto w-full border-collapse text-sm">
                <thead>
                    <tr class="bg-gradient-to-r from-blue-200 to-teal-200 text-gray-800">
                        <th class="border px-3 py-2 text-left font-medium">Keluhan</th>
                        <th class="border px-3 py-2 text-left font-medium">Cabang</th>
                        <th class="border px-3 py-2 text-left font-medium">Tempat</th>
                        <th class="border px-3 py-2 text-left font-medium">Tanggal</th>
                        <th class="border px-3 py-2 text-left font-medium">Plat Kendaraan</th>
                        <th class="border px-3 py-2 text-left font-medium">No Antrian</th>
                        <th class="border px-3 py-2 text-left font-medium">Waktu</th>
                        <th class="border px-3 py-2 text-left font-medium">Status</th>
                        <th class="border px-3 py-2 text-center font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $b)
                        <tr class="hover:bg-blue-50 transition duration-150">
                            <td class="border px-3 py-2 text-gray-600">{{ $b->keluhan }}</td>
                            <td class="border px-3 py-2 text-gray-600">{{ $b->cabang }}</td>
                            <td class="border px-3 py-2 text-gray-600">{{ $b->tempat }}</td>
                            <td class="border px-3 py-2 text-gray-600">{{ $b->tanggal }}</td>
                            <td class="border px-3 py-2 text-gray-600">{{ $b->kendaraan }}</td>
                            <td class="border px-3 py-2 text-gray-600">{{ $b->no_antrian }}</td>
                            <td class="border px-3 py-2 text-gray-600">
                                @if(is_null($b->waktu))
                                    <form action="{{ route('booking.updateWaktu', ['booking' => $b->id]) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        @php
                                            // Memanggil seluruh slot waktu tanpa filter konflik
                                            $allSlots = app()->make(\App\Http\Controllers\Backend\BookingController::class)
                                                        ->getAllWaktuSlots($b->tanggal);
                                        @endphp
                                        <select name="waktu" class="border-gray-300 rounded px-2 py-1">
                                            <option value="">Pilih Waktu</option>
                                            @foreach($allSlots as $slot)
                                                <option value="{{ $slot }}">{{ $slot }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="ml-2 text-sm text-blue-500 hover:text-blue-700">Update</button>
                                    </form>
                                @else
                                    {{ $b->waktu }}
                                @endif
                            </td>                            
                            <td class="border px-3 py-2 text-gray-600">
                                <form action="{{ route('booking.updateStatus', ['booking' => $b->id]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="border-gray-300 rounded px-2 py-1">
                                        <option value="waiting" {{ $b->status == 'waiting' ? 'selected' : '' }}>waiting</option>
                                        <option value="aprove" {{ $b->status == 'aprove' ? 'selected' : '' }}>aprove</option>
                                        <option value="belum dikerjakan" {{ $b->status == 'belum dikerjakan' ? 'selected' : '' }}>belum dikerjakan</option>
                                        <option value="dikerjakan" {{ $b->status == 'dikerjakan' ? 'selected' : '' }}>Dikerjakan</option>
                                        <option value="selesai" {{ $b->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                    <button type="submit" class="ml-2 text-sm text-blue-500 hover:text-blue-700">Update</button>
                                </form>
                            </td>                        
                            <td class="border px-3 py-2 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('booking.edit', ['booking' => $b->id]) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                    @if($b->status == 'selesai')
                                        <a href="{{ route('booking.selesaikan', ['booking' => $b->id]) }}" class="text-green-500 hover:text-green-700">Selesaikan</a>
                                    @endif
                                    <form action="{{ route('booking.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus booking ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
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
        $('#tableBooking').DataTable({
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