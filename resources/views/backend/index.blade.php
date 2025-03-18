@extends('backend.layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">
    <!-- Main Content -->
    <div class="p-8 w-full">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-purple-900">Admin Dashboard</h1>
        </div>

        <!-- Cards Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
             <!-- Total Users Card -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-700">Total Users</h2>
                        <p class="text-2xl font-bold text-purple-700">{{ \App\Models\User::count() }}</p>
                    </div>
                    <i class="fas fa-users text-3xl text-purple-700"></i>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-700">Total Revenue</h2>
                        <p class="text-2xl font-bold text-purple-700">$12,345</p>
                    </div>
                    <i class="fas fa-dollar-sign text-3xl text-purple-700"></i>
                </div>
            </div>

            <!-- Card 3 -->
             <!-- User Online Card -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">User Online</h2>
                    @if(count($onlineUsers))
                        <ul class="list-disc pl-5">
                            @foreach($onlineUsers as $user)
                                <li>{{ $user->nama }} ({{ $user->email }})</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-600">Tidak ada user yang online.</p>
                    @endif
                </div>
            </div>

            <!-- Activity Log Section -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Riwayat Aktivitas Terbaru</h2>
                @if($activities->count())
                    <ul class="list-disc pl-5">
                        @foreach($activities as $activity)
                            <li class="border-b py-2">
                                <span class="font-medium">{{ $activity->causer ? $activity->causer->nama : 'System' }}</span>
                                {{ $activity->description }}
                                <span class="text-sm text-gray-500">({{ $activity->created_at->diffForHumans() }})</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-600">Belum ada aktivitas.</p>
                @endif
            </div>
        </div>
@endsection