@extends('frontend.layouts.master')
@section('content')
<div class="container mx-auto px-6 py-10">
<h2>Data Kendaraan</h2>
    <h3 class="text-2xl font-semibold mb-4">Riwayat Service</h3>
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
          <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-left">Tanggal</th>
            <th class="py-3 px-6 text-left">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-gray-700 text-sm font-light">
          @forelse($riwayats as $r)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
              <td class="py-3 px-6 text-left">{{ $r->tanggal }}</td>
              <td class="py-3 px-6 text-left">
                <a href="{{ route('riwayat.invoice', $r->id) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-full transition duration-300">
                  Lihat Invoice
                </a>
                <a href="#" onclick="printInvoice('{{ route('riwayat.invoice', $r->id) }}')" 
                  class="bg-lime-600 hover:bg-emerald-400 text-white font-semibold py-2 px-4 rounded-full transition duration-300">
                   Print Invoice
               </a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="2" class="py-3 px-6 text-center">Buat jadwal</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <script>
    function printInvoice(url) {
      // Buka URL invoice di jendela baru
      var printWindow = window.open(url, '_blank');
      // Setelah jendela dimuat, panggil perintah print
      printWindow.addEventListener('load', function(){
          printWindow.print();
      }, true);
    }
    </script>
@endsection