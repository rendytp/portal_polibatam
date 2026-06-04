@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Di real app, Anda bisa mengecek Role auth untuk menentukan Sidebar mana yang dimuat -->
    @if(auth()->user()->role == 'Admin')
        <x-admin-sidebar />
    @else
        <x-user-sidebar />
    @endif

    <main class="flex-1 p-4 md:p-8 max-w-4xl">
        <div class="mb-8 animate-fade-in-up">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-rose-500 rounded-2xl flex items-center justify-center shadow-lg">
                    <i data-lucide="user" class="w-6 h-6 text-white"></i>
                </div>
                <div>
                    <h1 class="text-4xl font-bold">Profil Saya</h1>
                    <p class="text-gray-600 dark:text-gray-300">Kelola informasi akun dan keamanan Anda</p>
                </div>
            </div>
        </div>

        <!-- Form Update Informasi Profil -->
        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl border border-gray-200 dark:border-gray-700 p-8 mb-6 shadow-lg animate-fade-in-up delay-100">
            <h2 class="text-2xl font-bold mb-6">Informasi Profil</h2>
            <form method="POST" action="#" class="space-y-6">
                @csrf @method('PUT')
                <div>
                    <label class="block text-sm font-medium mb-2">Username</label>
                    <div class="relative">
                        <i data-lucide="user" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
                        <input type="text" name="username" value="{{ auth()->user()->username ?? 'NamaUser' }}" class="w-full pl-10 pr-4 py-3 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                </div>
                <button type="submit" class="w-full flex items-center justify-center gap-2 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:shadow-lg transition-all">
                    <i data-lucide="save" class="w-5 h-5"></i> Simpan Perubahan
                </button>
            </form>
        </div>

        <!-- Form Ubah Password -->
        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl border border-gray-200 dark:border-gray-700 p-8 shadow-lg animate-fade-in-up delay-200">
            <h2 class="text-2xl font-bold mb-6">Ubah Password</h2>
            <form method="POST" action="#" class="space-y-6">
                @csrf @method('PUT')
                <div>
                    <label class="block text-sm font-medium mb-2">Password Saat Ini</label>
                    <div class="relative">
                        <i data-lucide="lock" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
                        <input type="password" name="current_password" class="w-full pl-10 pr-4 py-3 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Password Baru</label>
                    <div class="relative">
                        <i data-lucide="lock" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
                        <input type="password" name="password" class="w-full pl-10 pr-4 py-3 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                </div>
                <button type="submit" class="w-full flex items-center justify-center gap-2 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:shadow-lg transition-all">
                    <i data-lucide="lock" class="w-5 h-5"></i> Ubah Password
                </button>
            </form>
        </div>
    </main>
</div>
@endsection