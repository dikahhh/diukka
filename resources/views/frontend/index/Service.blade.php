@extends('frontend.layouts.master')
@section('content')
<div class="container mx-auto px-6 py-10">
<h2>Data Kendaraan</h2>
@auth
<!-- Jadwal Servis -->
    <h3 class="text-2xl font-semibold mb-4">Jadwal Servis</h3>
    <a href="{{ route('booking.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-full transition duration-300 mb-4">
      Tambah jadwal
    </a>
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
          <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-left">Cabang</th>
            <th class="py-3 px-6 text-left">Tempat</th>
            <th class="py-3 px-6 text-left">Tanggal</th>
            <th class="py-3 px-6 text-left">No Antrian</th>
            <th class="py-3 px-6 text-left">Estimasi Dikerjakan</th>
            <th class="py-3 px-6 text-left">Status</th>
          </tr>
        </thead>
        <tbody class="text-gray-700 text-sm font-light">
          @forelse($bookings as $b)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
              <td class="py-3 px-6 text-left">{{ $b->cabang }}</td>
              <td class="py-3 px-6 text-left">{{ $b->tempat }}</td>
              <td class="py-3 px-6 text-left">{{ $b->tanggal }}</td>
              <td class="py-3 px-6 text-left">{{ $b->no_antrian }}</td>
              <td class="py-3 px-6 text-left">
                @if(in_array($b->status, ['aprove', 'belum dikerjakan', 'dikerjakan', 'selesai']))
                {{ $b->waktu }}
                @elseif($b->status == 'waiting')
                  Menunggu
                @endif
              </td>
              <td class="py-3 px-6 text-left">{{ $b->status }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="py-3 px-6 text-center">Belum ada jadwal servis</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  @endauth
@endsection