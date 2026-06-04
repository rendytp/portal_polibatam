@extends('layouts.app')

@section('content')
<div class="flex">
    <x-admin-sidebar />

    <main class="flex-1 p-4 md:p-8 overflow-x-hidden">
        <div class="mb-8 animate-fade-in-up">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 bg-gradient-to-br from-purple-600 to-pink-600 rounded-2xl flex items-center justify-center">
                    <i data-lucide="shield" class="w-6 h-6 text-white"></i>
                </div>
                <div>
                    <h1 class="text-4xl font-bold">Dashboard Admin</h1>
                    <p class="text-gray-600 dark:text-gray-300">Kelola sistem Portal Polibatam</p>
                </div>
            </div>
        </div>

        <!-- Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 animate-fade-in-up delay-100">
            <!-- Stat 1 -->
            <div class="relative overflow-hidden bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl p-6 shadow-xl transform hover:-translate-y-1 transition-all">
                <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -mr-12 -mt-12"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-2">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                            <i data-lucide="layout-grid" class="w-6 h-6 text-white"></i>
                        </div>
                    </div>
                    <p class="text-4xl font-bold text-white mb-1">12</p> <!-- Data dari Controller -->
                    <p class="text-white/80 text-sm">Total Layanan</p>
                </div>
            </div>
            <!-- Stat 2 (Layanan Aktif - Warna Hijau) -->
            <div class="relative overflow-hidden bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl p-6 shadow-xl transform hover:-translate-y-1 transition-all">
                <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -mr-12 -mt-12"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-2">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                            <i data-lucide="check-circle" class="w-6 h-6 text-white"></i>
                        </div>
                    </div>
                    <p class="text-4xl font-bold text-white mb-1">10</p>
                    <p class="text-white/80 text-sm">Layanan Aktif</p>
                </div>
            </div>
            <!-- Anda bisa menambahkan stat Layanan Nonaktif & Total Pengguna dengan struktur serupa -->
        </div>

        <!-- Quick Actions -->
        <div class="mb-8 animate-fade-in-up delay-200">
            <h2 class="text-2xl font-bold mb-4">Aksi Cepat</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="/admin/services" class="group bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl border border-gray-200 dark:border-gray-700 p-6 hover:shadow-2xl hover:scale-105 transition-all">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-lg">
                        <i data-lucide="layout-grid" class="w-7 h-7 text-white"></i>
                    </div>
                    <h3 class="font-bold mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors text-lg">Kelola Layanan</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">Tambah, edit, atau hapus layanan</p>
                </a>
                <!-- Tambahkan action card lainnya (Kelola Pengguna, Custom Links) di sini -->
            </div>
        </div>
    </main>
</div>
@endsection