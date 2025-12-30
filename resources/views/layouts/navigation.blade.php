<nav class="fixed top-0 z-50 w-full glass shadow-lg transition-all duration-300">
    <div class="px-4 py-3 lg:px-6">
        <div class="flex items-center justify-between">
            <!-- Left: Logo & Mobile Toggle -->
            <div class="flex items-center gap-4">
                <!-- Mobile Sidebar Toggle -->
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" 
                    class="inline-flex items-center p-2 text-gray-500 rounded-lg sm:hidden hover:bg-gray-100/50 dark:hover:bg-gray-700/50 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all duration-200">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
                
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl blur-md opacity-50 group-hover:opacity-75 transition-opacity duration-300"></div>
                        <div class="relative flex items-center justify-center w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                            </svg>
                        </div>
                    </div>
                    <span class="hidden md:block text-xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 dark:from-white dark:to-gray-300 bg-clip-text text-transparent">
                        {{ config('app.name', 'Laravel') }}
                    </span>
                </a>
            </div>

            <!-- Right: Notifications & User Menu -->
            <div class="flex items-center gap-2">
                <!-- Notifications -->
                <button type="button" class="relative p-2.5 text-gray-500 dark:text-gray-400 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700/50 transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
                
                <!-- User Menu -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" type="button" 
                        class="flex items-center gap-3 p-1.5 pr-3 rounded-xl bg-gray-100/80 dark:bg-gray-700/80 hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/50">
                        <img class="w-8 h-8 rounded-lg ring-2 ring-white dark:ring-gray-600" 
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=6366f1&color=ffffff&bold=true" 
                            alt="{{ Auth::user()->name }}">
                        <span class="hidden md:block text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ Auth::user()->name }}
                        </span>
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div x-show="open" 
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        @click.away="open = false"
                        class="absolute right-0 mt-2 w-64 origin-top-right rounded-xl bg-white dark:bg-gray-800 shadow-xl ring-1 ring-black/5 dark:ring-white/10 overflow-hidden z-50">
                        
                        <!-- User Info Header -->
                        <div class="px-4 py-4 bg-gradient-to-br from-indigo-500 to-purple-600 text-white">
                            <p class="text-sm font-semibold">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-indigo-100 truncate">{{ Auth::user()->email }}</p>
                        </div>
                        
                        <!-- Menu Items -->
                        <div class="py-2">
                            <a href="{{ route('profile.edit') }}" 
                                class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700/50 transition-colors duration-150">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Profile Settings
                            </a>
                            <hr class="my-2 border-gray-200 dark:border-gray-700">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" 
                                    class="flex items-center gap-3 w-full px-4 py-2.5 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors duration-150">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Sidebar -->
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white/95 dark:bg-gray-800/95 backdrop-blur-xl border-r border-gray-200/50 dark:border-gray-700/50 sm:translate-x-0 shadow-xl" aria-label="Sidebar">
    <div class="flex flex-col h-full px-4 pb-4 overflow-y-auto custom-scrollbar">
        <!-- Navigation Label -->
        <p class="px-3 py-2 text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider">
            Main Menu
        </p>
        
        <!-- Navigation Links -->
        <ul class="space-y-1.5 flex-1">
            <li>
                <a href="{{ route('dashboard') }}" 
                    class="nav-item {{ request()->routeIs('dashboard') ? 'nav-item-active' : '' }}">
                    <div class="nav-icon {{ request()->routeIs('dashboard') ? 'nav-icon-active' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <span class="nav-text">Dashboard</span>
                    @if(request()->routeIs('dashboard'))
                        <span class="ml-auto w-1.5 h-1.5 bg-indigo-500 rounded-full"></span>
                    @endif
                </a>
            </li>
            
            <li>
                <a href="{{ route('posts.index') }}" 
                    class="nav-item {{ request()->routeIs('posts.*') ? 'nav-item-active' : '' }}">
                    <div class="nav-icon {{ request()->routeIs('posts.*') ? 'nav-icon-active' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                    </div>
                    <span class="nav-text">Posts</span>
                    @if(request()->routeIs('posts.*'))
                        <span class="ml-auto w-1.5 h-1.5 bg-indigo-500 rounded-full"></span>
                    @endif
                </a>
            </li>
            
            <li>
                <a href="{{ route('products.index') }}" 
                    class="nav-item {{ request()->routeIs('products.*') ? 'nav-item-active' : '' }}">
                    <div class="nav-icon {{ request()->routeIs('products.*') ? 'nav-icon-active' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <span class="nav-text">Products</span>
                    @if(request()->routeIs('products.*'))
                        <span class="ml-auto w-1.5 h-1.5 bg-indigo-500 rounded-full"></span>
                    @endif
                </a>
            </li>
            
            <li>
                <a href="{{ route('categories.index') }}" 
                    class="nav-item {{ request()->routeIs('categories.*') ? 'nav-item-active' : '' }}">
                    <div class="nav-icon {{ request()->routeIs('categories.*') ? 'nav-icon-active' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                    <span class="nav-text">Categories</span>
                    @if(request()->routeIs('categories.*'))
                        <span class="ml-auto w-1.5 h-1.5 bg-indigo-500 rounded-full"></span>
                    @endif
                </a>
            </li>
            
            <!-- Divider -->
            <li class="!my-4">
                <div class="border-t border-gray-200 dark:border-gray-700"></div>
            </li>
            
            <!-- Settings Section -->
            <li>
                <p class="px-3 py-2 text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider">
                    Settings
                </p>
            </li>
            
            <li>
                <a href="{{ route('profile.edit') }}" 
                    class="nav-item {{ request()->routeIs('profile.*') ? 'nav-item-active' : '' }}">
                    <div class="nav-icon {{ request()->routeIs('profile.*') ? 'nav-icon-active' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <span class="nav-text">Account</span>
                    @if(request()->routeIs('profile.*'))
                        <span class="ml-auto w-1.5 h-1.5 bg-indigo-500 rounded-full"></span>
                    @endif
                </a>
            </li>
        </ul>
        
        <!-- Bottom Section: Theme Toggle & User Card -->
        <div class="mt-auto space-y-3">
            <!-- Theme Toggle -->
            <div class="p-3 rounded-xl bg-gray-100/80 dark:bg-gray-700/50">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                            <svg id="theme-icon-light" class="w-4 h-4 text-amber-500 hidden" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"/>
                            </svg>
                            <svg id="theme-icon-dark" class="w-4 h-4 text-indigo-400 hidden" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700 dark:text-gray-200">Appearance</p>
                            <p id="theme-label" class="text-xs text-gray-500 dark:text-gray-400">Light Mode</p>
                        </div>
                    </div>
                    <button id="theme-toggle" type="button" 
                        class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent bg-gray-200 dark:bg-indigo-600 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <span id="theme-toggle-dot" class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out translate-x-0 dark:translate-x-5"></span>
                    </button>
                </div>
            </div>
            
            <!-- User Card -->
            <div class="p-4 rounded-xl bg-gradient-to-br from-indigo-500/10 to-purple-500/10 dark:from-indigo-500/20 dark:to-purple-500/20 border border-indigo-200/50 dark:border-indigo-500/20">
                <div class="flex items-center gap-3 mb-3">
                    <img class="w-10 h-10 rounded-lg ring-2 ring-indigo-500/50" 
                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=6366f1&color=ffffff&bold=true" 
                        alt="{{ Auth::user()->name }}">
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
                            {{ Auth::user()->name }}
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                            {{ Auth::user()->email }}
                        </p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                        class="w-full flex items-center justify-center gap-2 px-3 py-2 text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:bg-indigo-100 dark:hover:bg-indigo-900/30 rounded-lg transition-colors duration-150">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Sign Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>

<!-- Theme Toggle Script -->
<script>
    // On page load, check for saved theme or system preference
    if (localStorage.getItem('color-theme') === 'dark' || 
        (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
    
    // Update theme UI
    function updateThemeUI() {
        const isDark = document.documentElement.classList.contains('dark');
        const themeLabel = document.getElementById('theme-label');
        const themeIconLight = document.getElementById('theme-icon-light');
        const themeIconDark = document.getElementById('theme-icon-dark');
        
        if (isDark) {
            themeLabel.textContent = 'Dark Mode';
            themeIconLight.classList.add('hidden');
            themeIconDark.classList.remove('hidden');
        } else {
            themeLabel.textContent = 'Light Mode';
            themeIconLight.classList.remove('hidden');
            themeIconDark.classList.add('hidden');
        }
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        updateThemeUI();
        
        // Theme toggle handler
        document.getElementById('theme-toggle').addEventListener('click', function() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
            updateThemeUI();
        });
    });
</script>