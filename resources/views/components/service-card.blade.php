@props(['service', 'isBookmarked' => false])

<div class="group relative bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl border-2 border-gray-200 dark:border-gray-700 hover:border-blue-400 transition-all overflow-hidden">
    <div class="relative z-10 p-6">
        <div class="flex items-start justify-between mb-4">
            <div class="w-14 h-14 rounded-xl flex items-center justify-center shadow-lg {{ $service->is_active ? 'bg-gradient-to-br from-blue-500 to-indigo-600' : 'bg-gradient-to-br from-gray-400 to-gray-500' }}">
                <i data-lucide="{{ $service->icon ?? 'globe' }}" class="w-7 h-7 text-white"></i>
            </div>
            
            <form action="{{ route('bookmarks.toggle', $service->id) }}" method="POST">
                @csrf
                <button type="submit" class="p-2 hover:bg-yellow-50 dark:hover:bg-yellow-900/20 rounded-lg transition-all group/star">
                    <i data-lucide="star" class="w-5 h-5 {{ $isBookmarked ? 'fill-yellow-400 text-yellow-400' : 'text-gray-400 group-hover/star:text-yellow-400' }} transition-colors"></i>
                </button>
            </form>
        </div>

        <h3 class="text-lg font-bold group-hover:text-blue-600 mb-2">{{ $service->nama }}</h3>
        
        <div class="flex items-center gap-1.5 px-2.5 py-1 w-fit rounded-full mb-3 {{ $service->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
            <div class="w-2 h-2 rounded-full {{ $service->is_active ? 'bg-green-500' : 'bg-gray-400' }}"></div>
            <span class="text-xs font-medium">{{ $service->is_active ? 'Aktif' : 'Nonaktif' }}</span>
        </div>

        <p class="text-sm text-gray-600 dark:text-gray-300 mb-4 line-clamp-2">{{ $service->deskripsi }}</p>

        <div class="flex flex-wrap gap-2 mb-5">
            <span class="px-3 py-1.5 bg-blue-100 text-blue-700 text-xs font-medium rounded-full">{{ $service->kategori->nama_kategori ?? 'Umum' }}</span>
        </div>

        <a href="{{ $service->is_active ? $service->url_layanan : '#' }}" target="{{ $service->is_active ? '_blank' : '_self' }}" class="w-full py-3 rounded-xl flex items-center justify-center gap-2 font-medium transition-all {{ $service->is_active ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white hover:shadow-lg' : 'bg-gray-200 text-gray-500 cursor-not-allowed' }}">
            @if($service->is_active)
                <i data-lucide="sparkles" class="w-4 h-4"></i> Akses Layanan
            @else
                Tidak Tersedia
            @endif
        </a>
    </div>
</div>