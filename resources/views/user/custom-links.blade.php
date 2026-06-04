@extends('layouts.app')

@section('content')
<div class="flex" x-data="{ showModal: false, editMode: false }">
    @if(auth()->user()->role == 'Admin')
        <x-admin-sidebar />
    @else
        <x-user-sidebar />
    @endif

    <main class="flex-1 p-4 md:p-8">
        <div class="mb-8 flex items-center gap-3 animate-fade-in-up">
            <div class="w-12 h-12 bg-gradient-to-br from-green-600 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg">
                <i data-lucide="link" class="w-6 h-6 text-white"></i>
            </div>
            <div>
                <h1 class="text-4xl font-bold">Custom Links</h1>
                <p class="text-gray-600 dark:text-gray-300">Simpan link kustom Anda sendiri untuk akses cepat</p>
            </div>
        </div>

        <div class="animate-fade-in-up delay-100">
            <div class="flex justify-end mb-6">
                <button @click="showModal = true; editMode = false" class="flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl hover:shadow-lg transition-all">
                    <i data-lucide="plus" class="w-5 h-5"></i> Tambah Link
                </button>
            </div>

            @php $customLinks = []; /* Load Custom Links dari Database */ @endphp

            @if(count($customLinks) === 0)
                <div class="text-center py-20 bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl border border-gray-200 dark:border-gray-700">
                    <div class="w-24 h-24 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="link" class="w-12 h-12 text-blue-600 dark:text-blue-400"></i>
                    </div>
                    <p class="text-gray-500 dark:text-gray-400 text-lg mb-4">Belum ada custom link</p>
                    <button @click="showModal = true; editMode = false" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:shadow-lg transition-all">
                        Tambah Link Pertama
                    </button>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Loop Custom Links Di Sini -->
                </div>
            @endif
        </div>
    </main>

    <!-- Modal Form (Alpine.js) -->
    <div x-show="showModal" style="display: none;" class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 p-4" x-transition.opacity>
        <div @click.away="showModal = false" class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 p-8 max-w-lg w-full transform transition-all" x-transition:enter="duration-300 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
            
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold" x-text="editMode ? 'Edit Link' : 'Tambah Link Baru'"></h2>
                <button @click="showModal = false" class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg">
                    <i data-lucide="x" class="w-5 h-5 text-gray-500"></i>
                </button>
            </div>

            <form method="POST" action="#" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium mb-2">Nama Link *</label>
                    <input type="text" name="name" class="w-full px-4 py-3 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" placeholder="e.g., Google Drive" required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">URL *</label>
                    <input type="url" name="url" class="w-full px-4 py-3 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" placeholder="https://..." required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Deskripsi</label>
                    <textarea name="description" rows="3" class="w-full px-4 py-3 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none resize-none" placeholder="Deskripsi singkat (opsional)"></textarea>
                </div>
                
                <div class="flex gap-3 pt-4">
                    <button type="button" @click="showModal = false" class="flex-1 px-6 py-3 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">Batal</button>
                    <button type="submit" class="flex-1 flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:shadow-lg transition-all">
                        <i data-lucide="save" class="w-5 h-5"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection