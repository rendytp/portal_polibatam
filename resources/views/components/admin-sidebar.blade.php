<aside class="w-64 bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm border-r border-gray-200 dark:border-gray-700 p-6 sticky top-16 h-[calc(100vh-4rem)] overflow-y-auto hidden md:block">
    <div class="mb-6">
        <div class="flex items-center gap-2 mb-2">
            <div class="w-8 h-8 bg-gradient-to-br from-purple-600 to-pink-600 rounded-lg flex items-center justify-center">
                <i data-lucide="settings" class="w-4 h-4 text-white"></i>
            </div>
            <h2 class="text-lg font-bold">Admin Panel</h2>
        </div>
        <p class="text-sm text-gray-600 dark:text-gray-400">Kelola sistem portal</p>
    </div>
    
    <nav class="space-y-2">
        <a href="{{ route('admin.dashboard') }}" class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-blue-500 to-indigo-500 text-white shadow-lg scale-105' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50' }}">
            <i data-lucide="layout-dashboard" class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-gray-600 dark:text-gray-400 group-hover:text-blue-500' }}"></i>
            <span class="flex-1 font-medium">Dashboard</span>
        </a>

        <!-- Catatan: Sesuaikan nama route dengan web.php Anda nanti -->
        <a href="/admin/services" class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50">
            <i data-lucide="layout-grid" class="w-5 h-5 text-gray-600 dark:text-gray-400 group-hover:text-purple-500"></i>
            <span class="flex-1 font-medium">Kelola Layanan</span>
        </a>

        <a href="/admin/users" class="group flex items-center gap-3 px-4 py-3 rounded-xl transition-all text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50">
            <i data-lucide="users" class="w-5 h-5 text-gray-600 dark:text-gray-400 group-hover:text-green-500"></i>
            <span class="flex-1 font-medium">Kelola Pengguna</span>
        </a>
    </nav>

    <div class="mt-8 p-4 bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-xl border border-purple-200 dark:border-purple-800">
        <div class="flex items-center gap-2 mb-2">
            <i data-lucide="trending-up" class="w-4 h-4 text-purple-600 dark:text-purple-400"></i>
            <h3 class="font-semibold text-sm">Status Sistem</h3>
        </div>
        <p class="text-xs text-gray-600 dark:text-gray-400 mb-2">Sistem berjalan normal</p>
        <div class="flex items-center gap-2">
            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
            <span class="text-xs text-green-600 dark:text-green-400 font-medium">Online</span>
        </div>
    </div>
</aside>