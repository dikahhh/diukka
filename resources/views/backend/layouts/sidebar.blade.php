<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prima Motor</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex">

  <!-- Sidebar -->
  <div class="fixed top-0 left-0 w-64 h-screen bg-gradient-to-b from-purple-900 to-indigo-900 p-6 text-white overflow-y-auto print:hidden">
    <!-- Logo -->
    <div class="flex items-center space-x-2 mb-8">
      <i class="fas fa-rocket text-2xl"></i>
      <span class="text-xl font-semibold">Prima Motor</span>
    </div>

    <!-- Menu Items -->
    <nav class="flex flex-col space-y-2 flex-grow">
      <a href="{{ route('backend.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-700 transition">
        <i class="fas fa-home text-lg"></i><span>Dashboard</span>
      </a>
      <a href="{{ route('booking.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-700 transition">
        <i class="fas fa-chart-line text-lg"></i><span>Booking</span>
      </a>
      <a href="{{ route('cabang.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-700 transition">
        <i class="fas fa-building text-lg"></i><span>Cabang</span>
      </a>
      <a href="{{ route('kendaraan.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-700 transition">
        <i class="fas fa-car text-lg"></i><span>Kendaraan</span>
      </a>
      <a href="{{ route('sparepart.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-700 transition">
        <i class="fas fa-toolbox text-lg"></i><span>Sparepart</span>
      </a>
      <a href="{{ route('stock.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-700 transition">
        <i class="fas fa-toolbox text-lg"></i><span>stock</span>
      </a>
      <a href="{{ route('riwayat.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-700 transition">
        <i class="fas fa-history text-lg"></i><span>Riwayat</span>
      </a>
      <a href="{{ route('laporan.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-700 transition">
        <i class="fas fa-user-shield text-lg"></i><span>laporan</span>
      </a>
      <a href="{{ route('karyawan.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-700 transition">
        <i class="fas fa-users text-lg"></i><span>Karyawan</span>
      </a>
      <a href="{{ route('libur.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-700 transition">
        <i class="fas fa-users text-lg"></i><span>libur</span>
      </a>
      <a href="{{ route('service.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-700 transition">
        <i class="fas fa-tools text-lg"></i><span>Service</span>
      </a>
      <a href="{{ route('roles.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-700 transition">
        <i class="fas fa-user-shield text-lg"></i><span>Role</span>
      </a>
      <a href="{{ route('adminregister') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-700 transition">
        <i class="fas fa-user-shield text-lg"></i><span>User Maint</span>
      </a>
    </nav>

    <!-- Divider -->
    <div class="border-t border-purple-700 my-4"></div>

    <!-- Footer / Logout -->
    <div>
      <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-700 transition">
        <i class="fas fa-question-circle text-lg"></i><span>Help</span>
      </a>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-purple-700 transition w-full text-left">
          <i class="fas fa-sign-out-alt text-lg"></i><span>Logout</span>
        </button>
      </form>
    </div>
  </div>
</body>
</html>
