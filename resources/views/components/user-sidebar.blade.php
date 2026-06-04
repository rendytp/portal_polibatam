<aside class="w-64 bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm border-r border-gray-200 dark:border-gray-700 p-6 sticky top-16 h-[calc(100vh-4rem)] overflow-y-auto hidden md:block">
    <div class="mb-6">
        <h2 class="text-lg font-bold mb-1">Menu Navigasi</h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">Akses cepat ke semua fitur</p>
    </div>
    
    <nav class="space-y-2">
        <!-- Beranda -->
        <a href="{{ route('dashboard') }}" class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-blue-500 to-indigo-500 text-white shadow-lg scale-105' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50' }}">
            <div class="w-8 h-8 rounded-lg flex items-center justify-center {{ request()->routeIs('dashboard') ? 'bg-white/20' : 'bg-gray-100 dark:bg-gray-700 group-hover:bg-gradient-to-r group-hover:from-blue-500 group-hover:to-indigo-500' }}">
                <i data-lucide="home" class="w-4 h-4 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-gray-600 dark:text-gray-400 group-hover:text-white' }}"></i>
            </div>
            <span class="flex-1 font-medium">Beranda</span>
            @if(request()->routeIs('dashboard')) <i data-lucide="chevron-right" class="w-4 h-4"></i> @endif
        </a>

        <!-- Cari Layanan -->
        <a href="{{ route('search') }}" class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('search') ? 'bg-gradient-to-r from-purple-500 to-pink-500 text-white shadow-lg scale-105' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50' }}">
            <div class="w-8 h-8 rounded-lg flex items-center justify-center {{ request()->routeIs('search') ? 'bg-white/20' : 'bg-gray-100 dark:bg-gray-700 group-hover:bg-gradient-to-r group-hover:from-purple-500 group-hover:to-pink-500' }}">
                <i data-lucide="search" class="w-4 h-4 {{ request()->routeIs('search') ? 'text-white' : 'text-gray-600 dark:text-gray-400 group-hover:text-white' }}"></i>
            </div>
            <span class="flex-1 font-medium">Cari Layanan</span>
        </a>
        
        <!-- Tambahkan menu lain seperti Favorit, Custom Links, Profil di sini dengan pola yang sama -->
    </nav>

    <div class="mt-8 p-4 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-xl border border-blue-200 dark:border-blue-800">
        <div class="flex items-center gap-2 mb-2">
            <i data-lucide="layout-grid" class="w-4 h-4 text-blue-600 dark:text-blue-400"></i>
            <h3 class="font-semibold text-sm">Tips</h3>
        </div>
        <p class="text-xs text-gray-600 dark:text-gray-400">Tandai layanan yang sering digunakan sebagai favorit untuk akses lebih cepat!</p>
    </div>
</aside>