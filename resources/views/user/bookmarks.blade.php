@extends('layouts.app')

@section('content')
<div class="flex">
    <x-user-sidebar />

    <main class="flex-1 p-4 md:p-8">
        <div class="mb-8 flex items-center gap-3 animate-fade-in-up">
            <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl flex items-center justify-center shadow-lg">
                <i data-lucide="star" class="w-6 h-6 text-white"></i>
            </div>
            <div>
                <h1 class="text-4xl font-bold">Layanan Favorit</h1>
                <p class="text-gray-600 dark:text-gray-300">Layanan yang Anda tandai sebagai favorit</p>
            </div>
        </div>

        <div class="animate-fade-in-up delay-100">
            @php $bookmarkedServices = []; /* Ambil dari relasi User->bookmarks */ @endphp
            
            @if(count($bookmarkedServices) === 0)
                <div class="text-center py-20 bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl border border-gray-200 dark:border-gray-700">
                    <div class="w-24 h-24 bg-gradient-to-br from-yellow-100 to-orange-100 dark:from-yellow-900/30 dark:to-orange-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="star" class="w-12 h-12 text-yellow-500"></i>
                    </div>
                    <p class="text-gray-500 dark:text-gray-400 text-lg mb-4">Anda belum menandai layanan favorit</p>
                    <a href="{{ route('dashboard') }}" class="inline-block px-6 py-3 bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-lg hover:shadow-lg transition-all">
                        Jelajahi Layanan
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($bookmarkedServices as $service)
                        <x-service-card :service="$service" />
                    @endforeach
                </div>
            @endif
        </div>
    </main>
</div>
@endsection