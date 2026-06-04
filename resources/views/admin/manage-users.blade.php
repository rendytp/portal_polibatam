@extends('layouts.app')

@section('content')
<div class="flex">
    <x-admin-sidebar />

    <main class="flex-1 p-4 md:p-8">
        <div class="mb-8 flex items-center gap-3 animate-fade-in-up">
            <div class="w-12 h-12 bg-gradient-to-br from-green-600 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg">
                <i data-lucide="users" class="w-6 h-6 text-white"></i>
            </div>
            <div>
                <h1 class="text-4xl font-bold">Kelola Pengguna</h1>
                <p class="text-gray-600 dark:text-gray-300">Lihat dan kelola data pengguna yang terdaftar</p>
            </div>
        </div>

        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl border border-gray-200 dark:border-gray-700 p-6 shadow-lg animate-fade-in-up delay-100">
            <!-- Search -->
            <div class="mb-6">
                <form action="{{ url()->current() }}" method="GET" class="relative">
                    <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
                    <input type="text" name="search" placeholder="Cari pengguna..." value="{{ request('search') }}" class="w-full pl-12 pr-4 py-3 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                </form>
            </div>

            <!-- Tabel Users -->
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th class="py-3 px-4 font-medium text-gray-700 dark:text-gray-300">Username</th>
                            <th class="py-3 px-4 font-medium text-gray-700 dark:text-gray-300">Role</th>
                            <th class="py-3 px-4 font-medium text-gray-700 dark:text-gray-300">Jumlah Bookmark</th>
                            <th class="py-3 px-4 font-medium text-right text-gray-700 dark:text-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Current User (Admin) -->
                        <tr class="border-b border-gray-100 dark:border-gray-800 bg-blue-50 dark:bg-blue-900/20">
                            <td class="py-3 px-4">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="user" class="w-4 h-4 text-blue-600 dark:text-blue-400"></i>
                                    <span class="font-medium">{{ auth()->user()->username ?? 'Admin (Anda)' }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-4">
                                <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 text-xs rounded-full">Admin</span>
                            </td>
                            <td class="py-3 px-4">0</td>
                            <td class="py-3 px-4 text-right">
                                <span class="text-sm text-gray-500 dark:text-gray-400">Admin aktif</span>
                            </td>
                        </tr>

                        <!-- Dummy Loop untuk User Lain -->
                        <tr class="border-b border-gray-100 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <td class="py-3 px-4">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="user" class="w-4 h-4 text-gray-400"></i>
                                    <span class="font-medium">mahasiswa123</span>
                                </div>
                            </td>
                            <td class="py-3 px-4">
                                <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-xs rounded-full">Mahasiswa</span>
                            </td>
                            <td class="py-3 px-4">3</td>
                            <td class="py-3 px-4 text-right">
                                <form method="POST" action="#" class="inline" onsubmit="return confirm('Hapus user ini?')">
                                    @csrf @method('DELETE')
                                    <button class="p-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                <div class="text-sm text-gray-600 dark:text-gray-400">
                    Total Pengguna: <span class="font-bold">2</span> (termasuk Anda)
                </div>
            </div>
        </div>
    </main>
</div>
@endsection