@extends('layouts.app')

@section('content')
<div class="flex">
    <x-user-sidebar />

    <main class="flex-1 p-4 md:p-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold">Selamat Datang, {{ Auth::user()->nama }}!</h1>
            <p class="text-gray-600 dark:text-gray-300">Akses semua layanan Polibatam dengan mudah dan cepat</p>
        </div>

        <!-- Pencarian & Filter -->
        <div class="mb-6">
            <form action="{{ route('dashboard') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <div class="flex-1 relative">
                    <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
                    <input type="text" name="search" placeholder="Cari layanan..." value="{{ request('search') }}" class="w-full pl-12 pr-4 py-3 bg-white dark:bg-gray-900 border border-gray-300 rounded-xl focus:ring-blue-500 outline-none">
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($services as $service)
                <x-service-card :service="$service" :isBookmarked="in_array($service->id, $bookmarkedIds)" />
            @empty
                <div class="col-span-full text-center py-12 bg-white/50 rounded-2xl">
                    <p class="text-gray-500">Tidak ada layanan yang ditemukan.</p>
                </div>
            @endforelse
        </div>
    </main>
</div>
@endsection