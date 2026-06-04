@extends('layouts.app')

@section('content')
<div class="min-h-[calc(100vh-4rem)] flex">
    <!-- Left Side Sama Seperti Login -->
    <div class="hidden lg:flex lg:w-1/2 relative items-center justify-center p-12 animate-fade-in-up">
        <!-- Kode branding sama seperti di login.blade.php -->
        <div class="max-w-lg">
            <h2 class="text-4xl font-bold mb-4">Bergabung dengan Portal</h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 mb-8">Buat akun untuk mengakses semua layanan Politeknik Negeri Batam dengan mudah.</p>
        </div>
    </div>

    <!-- Right Side - Register Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 relative z-10 animate-fade-in-up delay-100">
        <div class="w-full max-w-md bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl border border-gray-200 dark:border-gray-700 p-8 shadow-xl">
            <h1 class="text-3xl font-bold mb-2">Daftar Akun</h1>
            <p class="text-gray-600 dark:text-gray-300 mb-6">Isi form di bawah untuk membuat akun baru</p>

            <form method="POST" action="#" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Username</label>
                    <div class="relative">
                        <i data-lucide="user" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
                        <input type="text" name="username" class="w-full pl-10 pr-4 py-3 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all placeholder-gray-400" placeholder="Pilih username" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password</label>
                    <div class="relative">
                        <i data-lucide="lock" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
                        <input type="password" name="password" class="w-full pl-10 pr-4 py-3 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all placeholder-gray-400" placeholder="Minimal 6 karakter" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Role / Jabatan</label>
                    <div class="relative">
                        <i data-lucide="briefcase" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
                        <select name="role" class="w-full pl-10 pr-4 py-3 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all appearance-none cursor-pointer">
                            <option value="Staff">Staff</option>
                            <option value="TU">TU</option>
                            <option value="Laboran">Laboran</option>
                            <option value="Dosen">Dosen</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="w-full py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:shadow-lg transition-all transform hover:-translate-y-0.5 font-medium">
                    Daftar
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-gray-600 dark:text-gray-300">
                    Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 dark:text-blue-400 hover:underline font-medium">Masuk sekarang</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection