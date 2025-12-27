<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Posts -->
        <div class="stat-card gradient-purple animate-slide-up">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-sm font-medium mb-1">Total Posts</p>
                    <p class="text-4xl font-bold">{{ \App\Models\Post::count() }}</p>
                </div>
                <div class="icon-container">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm text-white/70">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
                <span>Active content</span>
            </div>
        </div>

        <!-- Total Products -->
        <div class="stat-card gradient-blue animate-slide-up delay-75">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-sm font-medium mb-1">Total Products</p>
                    <p class="text-4xl font-bold">{{ \App\Models\Product::count() }}</p>
                </div>
                <div class="icon-container">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm text-white/70">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                <span>In inventory</span>
            </div>
        </div>

        <!-- Total Categories -->
        <div class="stat-card gradient-green animate-slide-up delay-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-sm font-medium mb-1">Total Categories</p>
                    <p class="text-4xl font-bold">{{ \App\Models\Category::count() }}</p>
                </div>
                <div class="icon-container">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm text-white/70">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                </svg>
                <span>Organized</span>
            </div>
        </div>

        <!-- Total Users -->
        <div class="stat-card gradient-orange animate-slide-up delay-150">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-white/80 text-sm font-medium mb-1">Total Users</p>
                    <p class="text-4xl font-bold">{{ \App\Models\User::count() }}</p>
                </div>
                <div class="icon-container">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm text-white/70">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span>Registered</span>
            </div>
        </div>
    </div>

    <!-- Quick Actions & Welcome -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Welcome Card -->
        <div class="lg:col-span-2 card card-hover p-6 animate-slide-up delay-200">
            <div class="flex items-start justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                        Welcome back, {{ Auth::user()->name }}! 👋
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        Here's what's happening with your application today. Manage your content and keep track of your progress.
                    </p>
                </div>
            </div>
            
            <!-- Quick Stats Row -->
            <div class="grid grid-cols-3 gap-4 mt-6 pt-6 border-t border-gray-100 dark:border-gray-700">
                <div class="text-center">
                    <p class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">{{ \App\Models\Post::whereDate('created_at', today())->count() }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Posts Today</p>
                </div>
                <div class="text-center border-x border-gray-100 dark:border-gray-700">
                    <p class="text-2xl font-bold text-emerald-600 dark:text-emerald-400">{{ \App\Models\Product::where('quantity', '>', 0)->count() }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">In Stock</p>
                </div>
                <div class="text-center">
                    <p class="text-2xl font-bold text-amber-600 dark:text-amber-400">{{ \App\Models\User::whereDate('created_at', today())->count() }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">New Users</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card card-hover p-6 animate-slide-up delay-300">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Quick Actions</h3>
            <div class="space-y-3">
                <a href="{{ route('posts.create') }}" class="flex items-center gap-3 p-3 rounded-xl bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300 hover:bg-indigo-100 dark:hover:bg-indigo-900/50 transition-colors group">
                    <div class="w-10 h-10 rounded-lg bg-indigo-600 flex items-center justify-center text-white group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <span class="font-medium">New Post</span>
                </a>
                <a href="{{ route('products.create') }}" class="flex items-center gap-3 p-3 rounded-xl bg-emerald-50 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 hover:bg-emerald-100 dark:hover:bg-emerald-900/50 transition-colors group">
                    <div class="w-10 h-10 rounded-lg bg-emerald-600 flex items-center justify-center text-white group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <span class="font-medium">New Product</span>
                </a>
                <a href="{{ route('categories.create') }}" class="flex items-center gap-3 p-3 rounded-xl bg-amber-50 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300 hover:bg-amber-100 dark:hover:bg-amber-900/50 transition-colors group">
                    <div class="w-10 h-10 rounded-lg bg-amber-600 flex items-center justify-center text-white group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <span class="font-medium">New Category</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="card card-hover p-6 animate-slide-up delay-300">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white">Recent Posts</h3>
            <a href="{{ route('posts.index') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">View all →</a>
        </div>
        
        @php $recentPosts = \App\Models\Post::latest()->take(5)->get(); @endphp
        
        @if($recentPosts->count() > 0)
            <div class="space-y-4">
                @foreach($recentPosts as $post)
                    <div class="flex items-center gap-4 p-4 rounded-xl bg-gray-50 dark:bg-gray-700/50 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-12 h-12 rounded-lg object-cover">
                        @else
                            <div class="w-12 h-12 rounded-lg bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center">
                                <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        @endif
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-gray-900 dark:text-white truncate">{{ $post->title }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                        <a href="{{ route('posts.show', $post) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                <svg class="w-12 h-12 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <p>No posts yet. Create your first post!</p>
            </div>
        @endif
    </div>
</x-app-layout>