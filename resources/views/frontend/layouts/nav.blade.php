<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PrimaMotor</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
  <style>
    /* Transisi halus untuk mobile menu */
    #mobile-menu {
      transition: all 0.3s ease-in-out;
    }
    /* Animasi dropdown */
    @keyframes fadeInScale {
      0% {
        opacity: 0;
        transform: scale(0.95);
      }
      100% {
        opacity: 1;
        transform: scale(1);
      }
    }
    .animate-dropdown {
      animation: fadeInScale 0.2s ease-out forwards;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <header id="navbar" class="sticky top-0 bg-gray-800 text-white shadow-md z-50">
    <nav class="container mx-auto flex justify-between items-center px-6 py-4">
      <!-- Logo -->
      <div class="text-2xl font-bold">
        <a href="#" class="text-blue-500 hover:text-blue-400 transition duration-300">PrimaMotor</a>
      </div>
      
      <!-- Desktop Menu -->
      <ul class="hidden md:flex space-x-8">
        <li><a href="{{ route('frontend.index') }}" class="hover:text-blue-400 transition duration-300">Home</a></li>
        <li><a href="{{ route('frontend.index') }}#about" class="hover:text-blue-400 transition duration-300">About</a></li>
        <li><a href="{{ route('frontend.index') }}#services" class="hover:text-blue-400 transition duration-300">Services</a></li>
        <li><a href="{{ route('frontend.index') }}#contact" class="hover:text-blue-400 transition duration-300">Contact</a></li>
        <li><a href="{{ route('frontend.kendaraan') }}" class="hover:text-blue-400 transition duration-300">Kendaraan</a></li>
        <li><a href="{{ route('frontend.service') }}" class="hover:text-blue-400 transition duration-300">Service</a></li>
        <li><a href="{{ route('frontend.riwayat') }}" class="hover:text-blue-400 transition duration-300">Riwayat</a></li>
      </ul>
    
      <!-- Actions (Desktop) -->
      <div class="hidden md:flex space-x-4 items-center">
        @auth
          <!-- Profile Dropdown (Desktop) -->
          <div class="relative inline-block text-left">
            <button id="profileDropdownButton" class="inline-flex items-center px-4 py-2 border border-gray-500 text-gray-500 rounded hover:bg-gray-500 hover:text-white transition duration-300 focus:outline-none">
              <i class="fas fa-user mr-2"></i> Profile
              <svg class="ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <!-- Dropdown Menu -->
            <div id="profileDropdownMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-20 hidden transform origin-top-right">
              <a href="{{ route('auth.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-colors">
                Edit Profile
              </a>
            </div>
          </div>
  
          <!-- Logout Button -->
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="px-4 py-2 border border-red-500 text-red-500 rounded hover:bg-red-500 hover:text-white transition duration-300">
              Logout
            </button>
          </form>
        @else
          <!-- Login dan Register (Desktop) -->
          <a href="{{ route('login') }}" class="px-4 py-2 border border-blue-500 text-blue-500 rounded hover:bg-blue-500 hover:text-white transition duration-300">
            Log In
          </a>
          <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300">
            Register
          </a>
        @endauth
      </div>
  
      <!-- Mobile Menu Button -->
      <button id="menu-btn" class="block md:hidden text-gray-400 hover:text-white focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </nav>
  
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-gray-800 text-white">
      <ul class="flex flex-col items-center space-y-4 py-4">
        <li><a href="{{ route('frontend.index') }}" class="hover:text-blue-400 transition duration-300">Home</a></li>
        <li><a href="{{ route('frontend.index') }}#about" class="hover:text-blue-400 transition duration-300">About</a></li>
        <li><a href="{{ route('frontend.index') }}#services" class="hover:text-blue-400 transition duration-300">Services</a></li>
        <li><a href="{{ route('frontend.index') }}#contact" class="hover:text-blue-400 transition duration-300">Contact</a></li>
        <li><a href="{{ route('frontend.kendaraan') }}" class="hover:text-blue-400 transition duration-300">Kendaraan</a></li>
        <li><a href="{{ route('frontend.service') }}" class="hover:text-blue-400 transition duration-300">Service</a></li>
        <li><a href="{{ route('frontend.riwayat') }}" class="hover:text-blue-400 transition duration-300">Riwayat</a></li>
        @auth
          <!-- Profile Dropdown (Mobile) -->
          <li class="relative w-full">
            <button id="mobileProfileDropdownButton" class="w-full text-left px-4 py-2 border border-gray-500 text-gray-500 rounded hover:bg-gray-500 hover:text-white transition duration-300 focus:outline-none flex items-center justify-between">
              <span><i class="fas fa-user mr-2"></i> Profile</span>
              <svg class="ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <div id="mobileProfileDropdownMenu" class="mt-2 w-full bg-white rounded-md shadow-lg py-2 z-20 hidden transform origin-top">
              <a href="{{ route('auth.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-colors">
                Edit Profile
              </a>
            </div>
          </li>
          <li>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="block w-full text-left px-4 py-2 border border-red-500 text-red-500 rounded hover:bg-red-500 hover:text-white transition duration-300">
                Logout
              </button>
            </form>
          </li>
        @else
          <li>
            <a href="{{ route('login') }}" class="block px-4 py-2 border border-blue-500 text-blue-500 rounded hover:bg-blue-500 hover:text-white transition duration-300">
              Log In
            </a>
          </li>
          <li>
            <a href="{{ route('register') }}" class="block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300">
              Register
            </a>
          </li>
        @endauth
      </ul>
    </div>
  </header>
  
  <!-- JavaScript untuk toggle mobile menu dan dropdown -->
  <script>
    // Toggle Mobile Menu
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
  
    menuBtn.addEventListener('click', (e) => {
      e.stopPropagation(); // mencegah event bubbling
      mobileMenu.classList.toggle('hidden');
    });
  
    // Toggle Desktop Profile Dropdown
    const profileDropdownButton = document.getElementById('profileDropdownButton');
    const profileDropdownMenu = document.getElementById('profileDropdownMenu');
  
    profileDropdownButton && profileDropdownButton.addEventListener('click', (e) => {
      e.stopPropagation();
      profileDropdownMenu.classList.toggle('hidden');
      profileDropdownMenu.classList.toggle('animate-dropdown');
    });
  
    // Toggle Mobile Profile Dropdown
    const mobileProfileDropdownButton = document.getElementById('mobileProfileDropdownButton');
    const mobileProfileDropdownMenu = document.getElementById('mobileProfileDropdownMenu');
  
    mobileProfileDropdownButton && mobileProfileDropdownButton.addEventListener('click', (e) => {
      e.stopPropagation();
      mobileProfileDropdownMenu.classList.toggle('hidden');
      mobileProfileDropdownMenu.classList.toggle('animate-dropdown');
    });
  
    // Menutup dropdown dan mobile menu saat klik di luar navbar
    document.addEventListener('click', (event) => {
      // Cek apakah klik terjadi di luar area navbar
      const navbar = document.getElementById('navbar');
      if (!navbar.contains(event.target)) {
        // Tutup mobile menu jika sedang terbuka
        if (!mobileMenu.classList.contains('hidden')) {
          mobileMenu.classList.add('hidden');
        }
        // Tutup dropdown profile (desktop)
        if (profileDropdownMenu && !profileDropdownMenu.classList.contains('hidden')) {
          profileDropdownMenu.classList.add('hidden');
          profileDropdownMenu.classList.remove('animate-dropdown');
        }
        // Tutup dropdown profile (mobile)
        if (mobileProfileDropdownMenu && !mobileProfileDropdownMenu.classList.contains('hidden')) {
          mobileProfileDropdownMenu.classList.add('hidden');
          mobileProfileDropdownMenu.classList.remove('animate-dropdown');
        }
      }
    });
  </script>
</body>
</html>
