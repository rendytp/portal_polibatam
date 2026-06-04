@extends('layouts.app')

@section('content')
<div class="min-h-[calc(100vh-4rem)] flex">
    <!-- Left Side - Branding (Hidden on mobile) -->
    <div class="hidden lg:flex lg:w-1/2 relative items-center justify-center p-12">
        <div class="max-w-lg">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <i data-lucide="layout" class="w-10 h-10 text-white"></i>
                </div>
                <span class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                    Portal Polibatam
                </span>
            </div>
            <h2 class="text-4xl font-bold mb-4">Selamat Datang Kembali</h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 mb-8">Akses semua layanan Polibatam dalam satu portal yang terintegrasi.</p>
        </div>
    </div>

    <!-- Right Side - Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 relative z-10">
        <div class="w-full max-w-md bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl border border-gray-200 dark:border-gray-700 p-8 shadow-xl">
            
            <div class="lg:hidden flex items-center justify-center gap-3 mb-8">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center">
                    <i data-lucide="layout" class="w-7 h-7 text-white"></i>
                </div>
                <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Portal Polibatam</span>
            </div>

            <h1 class="text-3xl font-bold mb-2">Masuk</h1>
            <p class="text-gray-600 dark:text-gray-300 mb-6">Masukkan kredensial Anda untuk melanjutkan</p>

            <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Username</label>
                    <div class="relative">
                        <i data-lucide="user" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
                        <input type="text" name="username" class="w-full pl-10 pr-4 py-3 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all placeholder-gray-400 text-gray-900 dark:text-white" placeholder="Masukkan username" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password</label>
                    <div class="relative">
                        <i data-lucide="lock" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
                        <input type="password" name="password" class="w-full pl-10 pr-4 py-3 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all placeholder-gray-400 text-gray-900 dark:text-white" placeholder="Masukkan password" required>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <span class="text-sm text-gray-700 dark:text-gray-300">Ingat saya</span>
                    </label>
                    <a href="#" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Lupa password?</a>
                </div>

                <button type="submit" class="w-full py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:shadow-lg transition-all transform hover:-translate-y-0.5 font-medium">
                    Masuk
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-gray-600 dark:text-gray-300">
                    Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 dark:text-blue-400 hover:underline font-medium">Daftar sekarang</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection