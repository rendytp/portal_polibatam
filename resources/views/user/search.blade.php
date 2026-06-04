@extends('layouts.app')

@section('content')
<div class="flex">
    <x-user-sidebar />

    <main class="flex-1 p-4 md:p-8">
        <div class="mb-8 flex items-center gap-3 animate-fade-in-up">
            <div class="w-12 h-12 bg-gradient-to-br from-purple-600 to-pink-600 rounded-2xl flex items-center justify-center">
                <i data-lucide="search" class="w-6 h-6 text-white"></i>
            </div>
            <div>
                <h1 class="text-4xl font-bold">Cari Layanan</h1>
                <p class="text-gray-600 dark:text-gray-300">Temukan layanan yang Anda butuhkan dengan cepat</p>
            </div>
        </div>

        <div class="mb-8 animate-fade-in-up delay-100">
            <form action="{{ route('search') }}" method="GET" class="relative max-w-3xl mx-auto">
                <i data-lucide="search" class="absolute left-6 top-1/2 -translate-y-1/2 w-6 h-6 text-gray-400"></i>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari berdasarkan nama, kategori, atau deskripsi..." class="w-full pl-16 pr-6 py-5 text-lg bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm border-2 border-gray-300 dark:border-gray-600 rounded-2xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 outline-none shadow-xl" autofocus>
            </form>
        </div>

        <div class="animate-fade-in-up delay-200">
            <div class="mb-6 flex items-center gap-2">
                <span class="text-gray-600 dark:text-gray-300">Ditemukan</span>
                <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 rounded-full font-bold">
                    12 <!-- Count dari DB berdasarkan pencarian -->
                </span>
                <span class="text-gray-600 dark:text-gray-300">layanan</span>
            </div>

            <!-- Gunakan Component Service Card -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Contoh: -->
                {{-- @foreach($services as $service)
                    <x-service-card :service="$service" />
                @endforeach --}}
            </div>
        </div>
    </main>
</div>
@endsection