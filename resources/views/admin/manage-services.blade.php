@extends('layouts.app')

@section('content')
<div class="flex" x-data="{ showModal: false, editMode: false, formAction: '{{ route('admin.services.store') }}', serviceData: {} }">
    <x-admin-sidebar />

    <main class="flex-1 p-4 md:p-8">
        <div class="mb-8 flex items-center justify-between">
            <h1 class="text-3xl font-bold">Kelola Layanan</h1>
            <button @click="showModal = true; editMode = false; formAction = '{{ route('admin.services.store') }}'; serviceData = {};" class="flex items-center gap-2 px-6 py-3 bg-blue-600 text-white rounded-xl shadow-lg">
                <i data-lucide="plus" class="w-5 h-5"></i> Tambah Layanan
            </button>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>
        @endif

        <div class="bg-white/80 dark:bg-gray-800/80 rounded-2xl border border-gray-200 p-6 shadow-lg">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b">
                        <th class="py-3 px-4">Nama Layanan</th>
                        <th class="py-3 px-4">Kategori</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                    <tr class="border-b hover:bg-gray-50 dark:hover:bg-gray-700/50">
                        <td class="py-3 px-4">{{ $service->nama }}</td>
                        <td class="py-3 px-4">{{ $service->kategori->nama_kategori ?? 'Umum' }}</td>
                        <td class="py-3 px-4">{{ $service->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                        <td class="py-3 px-4 text-right">
                            <div class="flex justify-end gap-2">
                                <!-- Tombol Edit dengan AlpineJS -->
                                <button @click="showModal = true; editMode = true; formAction = '{{ route('admin.services.update', $service->id) }}'; serviceData = { name: '{{ $service->nama }}', category: '{{ $service->kategori->nama_kategori ?? '' }}', url: '{{ $service->url_layanan }}', description: '{{ $service->deskripsi }}' }" class="p-2 text-blue-600 bg-blue-50 rounded-lg">
                                    <i data-lucide="edit" class="w-4 h-4"></i>
                                </button>

                                <form method="POST" action="{{ route('admin.services.delete', $service->id) }}" onsubmit="return confirm('Hapus?')">
                                    @csrf @method('DELETE')
                                    <button class="p-2 text-red-600 bg-red-50 rounded-lg">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <!-- Modal Form Alpine.js -->
    <div x-show="showModal" style="display: none;" class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 p-4">
        <div @click.away="showModal = false" class="bg-white dark:bg-gray-800 rounded-2xl p-8 max-w-2xl w-full">
            <h2 class="text-2xl font-bold mb-6" x-text="editMode ? 'Edit Layanan' : 'Tambah Layanan Baru'"></h2>

            <form method="POST" :action="formAction" class="space-y-4">
                @csrf
                <!-- Dynamic Method untuk PUT jika mode Edit -->
                <template x-if="editMode"><input type="hidden" name="_method" value="PUT"></template>

                <div>
                    <label class="block text-sm font-medium mb-2">Nama Layanan</label>
                    <input type="text" name="name" x-model="serviceData.name" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg" required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Kategori</label>
                    <input type="text" name="category" x-model="serviceData.category" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg" required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">URL Layanan</label>
                    <input type="url" name="url" x-model="serviceData.url" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg" required>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Deskripsi</label>
                    <textarea name="description" x-model="serviceData.description" rows="3" class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg resize-none" required></textarea>
                </div>
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4">
                    <label class="text-sm font-medium">Layanan Aktif</label>
                </div>
                <div class="flex gap-3 pt-4">
                    <button type="button" @click="showModal = false" class="flex-1 px-6 py-3 border rounded-lg">Batal</button>
                    <button type="submit" class="flex-1 bg-blue-600 text-white rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection