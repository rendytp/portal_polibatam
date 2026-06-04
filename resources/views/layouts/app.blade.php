<!DOCTYPE html>
<html lang="id" x-data="themeSwitcher()" x-init="init()">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Layanan Polibatam</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = { darkMode: 'class' }</script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="min-h-screen transition-colors duration-300" :class="isDark ? 'bg-gray-900 text-white' : 'bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 text-gray-900'">

    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute top-1/4 -left-20 w-96 h-96 bg-blue-400/20 dark:bg-blue-500/10 rounded-full blur-3xl mix-blend-multiply dark:mix-blend-screen"></div>
        <div class="absolute bottom-1/4 -right-20 w-96 h-96 bg-purple-400/20 dark:bg-purple-500/10 rounded-full blur-3xl mix-blend-multiply dark:mix-blend-screen"></div>
    </div>

    <nav class="fixed top-0 left-0 right-0 z-50 backdrop-blur-md bg-white/70 dark:bg-gray-900/70 border-b border-gray-200 dark:border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="{{ route('landing') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center shadow-lg">
                        <i data-lucide="layout" class="w-6 h-6 text-white"></i>
                    </div>
                    <span class="text-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent hidden sm:block">
                        Portal Polibatam
                    </span>
                </a>

                <div class="flex items-center gap-4">
                    <button @click="toggleTheme()" class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-800 transition-colors">
                        <i data-lucide="sun" x-show="isDark" class="w-5 h-5 text-gray-300" style="display: none;"></i>
                        <i data-lucide="moon" x-show="!isDark" class="w-5 h-5 text-gray-600"></i>
                    </button>
                    
                    @guest
                        <a href="{{ route('login') }}" class="px-4 py-2 font-medium">Masuk</a>
                        <a href="{{ route('register') }}" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg shadow-lg">Daftar</a>
                    @else
                        <!-- Dropdown User -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-full flex items-center justify-center">
                                    <i data-lucide="user" class="w-4 h-4 text-white"></i>
                                </div>
                                <span class="hidden sm:block font-medium">{{ Auth::user()->username }}</span>
                            </button>
                            
                            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-xl border border-gray-200 dark:border-gray-700 py-2">
                                <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">Profil Saya</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20">Keluar</button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <main class="relative z-10 pt-16">
        @yield('content')
    </main>

    <script>
        lucide.createIcons();
        function themeSwitcher() {
            return {
                isDark: false,
                init() { this.isDark = document.documentElement.classList.contains('dark'); },
                toggleTheme() {
                    this.isDark = !this.isDark;
                    if (this.isDark) { document.documentElement.classList.add('dark'); localStorage.setItem('theme', 'dark'); } 
                    else { document.documentElement.classList.remove('dark'); localStorage.setItem('theme', 'light'); }
                }
            }
        }
    </script>
</body>
</html>