@extends('layouts.app')

@section('content')
<style>
    /* Custom simple animation untuk meniru Framer Motion */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up { animation: fadeInUp 0.8s ease-out forwards; }
    .delay-100 { animation-delay: 100ms; }
    .delay-200 { animation-delay: 200ms; }
    .delay-300 { animation-delay: 300ms; }
</style>

<div class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <div class="max-w-7xl mx-auto relative z-10 text-center">
        <!-- Hero Title -->
        <div class="animate-fade-in-up opacity-0">
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold mb-6">
                Semua Layanan Polibatam<br />
                <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                    Dalam Satu Portal
                </span>
            </h1>
        </div>

        <p class="text-xl text-gray-600 dark:text-gray-300 mb-12 max-w-2xl mx-auto animate-fade-in-up delay-100 opacity-0">
            Akses seluruh sistem informasi dan layanan digital Politeknik Negeri Batam dengan mudah dan cepat. Tidak perlu lagi mengingat banyak URL.
        </p>

        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in-up delay-200 opacity-0">
            <a href="{{ route('register') }}" class="group px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl hover:shadow-2xl transition-all flex items-center justify-center gap-2 transform hover:-translate-y-1">
                Mulai Sekarang
                <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
            </a>
            <a href="{{ route('login') }}" class="px-8 py-4 bg-white dark:bg-gray-800 text-gray-900 dark:text-white rounded-xl border-2 border-gray-200 dark:border-gray-700 hover:border-blue-600 dark:hover:border-blue-500 transition-all transform hover:-translate-y-1">
                Masuk ke Akun
            </a>
        </div>

        <!-- Features Grid -->
        <div class="mt-32 grid md:grid-cols-3 gap-8">
            <div class="p-8 bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all transform hover:-translate-y-2 animate-fade-in-up delay-300 opacity-0">
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center mb-4">
                    <i data-lucide="zap" class="w-6 h-6 text-blue-600 dark:text-blue-400"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Akses Cepat</h3>
                <p class="text-gray-600 dark:text-gray-300">Akses semua layanan hanya dengan satu klik. Tandai layanan favorit untuk akses lebih cepat.</p>
            </div>

            <div class="p-8 bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all transform hover:-translate-y-2 animate-fade-in-up delay-300 opacity-0" style="animation-delay: 400ms;">
                <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/30 rounded-xl flex items-center justify-center mb-4">
                    <i data-lucide="layout" class="w-6 h-6 text-indigo-600 dark:text-indigo-400"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Terorganisir</h3>
                <p class="text-gray-600 dark:text-gray-300">Layanan terkelompok berdasarkan kategori. Buat kategori custom sesuai kebutuhan Anda.</p>
            </div>

            <div class="p-8 bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl border border-gray-200 dark:border-gray-700 hover:shadow-xl transition-all transform hover:-translate-y-2 animate-fade-in-up delay-300 opacity-0" style="animation-delay: 500ms;">
                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-xl flex items-center justify-center mb-4">
                    <i data-lucide="shield" class="w-6 h-6 text-purple-600 dark:text-purple-400"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Aman & Terpercaya</h3>
                <p class="text-gray-600 dark:text-gray-300">Portal resmi Polibatam dengan sistem autentikasi yang aman untuk melindungi data Anda.</p>
            </div>
        </div>
    </div>
</div>
@endsection