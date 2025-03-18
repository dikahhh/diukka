@extends('frontend.layouts.master')

@section('content')
<div class="bg-gray-100 font-sans leading-normal tracking-normal">
  <!-- Hero Section -->
  <section id="about" class="relative bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    <div class="relative text-center text-white max-w-3xl px-6 py-10 bg-white bg-opacity-10 backdrop-blur-md rounded-3xl shadow-2xl">
      <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-6 leading-tight">
        Reliable Motorcycle Services
      </h1>
      <p class="text-base sm:text-lg md:text-xl mb-8">
        Your trusted partner for motor maintenance, repair, and accessories. We provide high-quality services tailored to your needs.
      </p>
      <a href="#services" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white px-6 sm:px-8 py-3 text-base sm:text-lg font-medium rounded-full shadow-lg transition-transform transform hover:scale-105">
        Explore Our Services
      </a>
    </div>
  </section>

  <!-- Services Section -->
  <section id="services" class="py-16 bg-white">
    <div class="container mx-auto px-6">
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center mb-12">
        Our Services
      </h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Maintenance -->
        <div class="bg-gray-50 shadow-lg rounded-lg p-6 text-center hover:shadow-2xl transition duration-300">
          <div class="mb-4 text-blue-600 text-4xl sm:text-5xl">
            <i class="fas fa-tools"></i>
          </div>
          <h3 class="text-xl font-semibold mb-2">Maintenance</h3>
          <p class="text-gray-600 mb-4">Regular check-ups and tune-ups to keep your motor in top condition.</p>
          <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-full transition duration-300">
            Learn More
          </button>
        </div>
        <!-- Repairs -->
        <div class="bg-gray-50 shadow-lg rounded-lg p-6 text-center hover:shadow-2xl transition duration-300">
          <div class="mb-4 text-green-600 text-4xl sm:text-5xl">
            <i class="fas fa-wrench"></i>
          </div>
          <h3 class="text-xl font-semibold mb-2">Repairs</h3>
          <p class="text-gray-600 mb-4">Quick and reliable repairs for all types of motorcycles.</p>
          <a href="{{ route('kendaraan.create') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-full transition duration-300">
            Learn More
          </a>
        </div>
        <!-- Accessories -->
        <div class="bg-gray-50 shadow-lg rounded-lg p-6 text-center hover:shadow-2xl transition duration-300">
          <div class="mb-4 text-purple-600 text-4xl sm:text-5xl">
            <i class="fas fa-box"></i>
          </div>
          <h3 class="text-xl font-semibold mb-2">Accessories</h3>
          <p class="text-gray-600 mb-4">High-quality accessories to enhance your motorcycle experience.</p>
          <button class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded-full transition duration-300">
            Learn More
          </button>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
