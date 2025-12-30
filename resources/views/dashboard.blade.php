<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Welcome back! Here's what's happening today.
                </p>
            </div>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-medium bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300">
                    <span class="w-2 h-2 bg-emerald-500 rounded-full mr-2 animate-pulse"></span>
                    System Online
                </span>
            </div>
        </div>
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

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Welcome Card -->
        <div class="lg:col-span-2 card card-hover p-6 animate-slide-up delay-200">
            <div class="flex items-start gap-4">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center flex-shrink-0">
                    <span class="text-2xl">👋</span>
                </div>
                <div class="flex-1">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                        Welcome back, {{ Auth::user()->name }}!
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        Here's what's happening with your application today. Manage your content and keep track of your progress with ease.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('posts.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Create Post
                        </a>
                        <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 text-sm font-medium rounded-lg transition-colors">
                            View Products
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Quick Stats Row -->
            <div class="grid grid-cols-3 gap-4 mt-6 pt-6 border-t border-gray-100 dark:border-gray-700">
                <div class="text-center p-3 rounded-xl bg-indigo-50 dark:bg-indigo-900/20">
                    <p class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">{{ \App\Models\Post::whereDate('created_at', today())->count() }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Posts Today</p>
                </div>
                <div class="text-center p-3 rounded-xl bg-emerald-50 dark:bg-emerald-900/20">
                    <p class="text-2xl font-bold text-emerald-600 dark:text-emerald-400">{{ \App\Models\Product::where('quantity', '>', 0)->count() }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">In Stock</p>
                </div>
                <div class="text-center p-3 rounded-xl bg-amber-50 dark:bg-amber-900/20">
                    <p class="text-2xl font-bold text-amber-600 dark:text-amber-400">{{ \App\Models\User::whereDate('created_at', today())->count() }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">New Users</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card card-hover p-6 animate-slide-up delay-300">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                Quick Actions
            </h3>
            <div class="space-y-3">
                <a href="{{ route('posts.create') }}" class="flex items-center gap-3 p-3 rounded-xl bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300 hover:bg-indigo-100 dark:hover:bg-indigo-900/50 transition-colors group">
                    <div class="w-10 h-10 rounded-lg bg-indigo-600 flex items-center justify-center text-white group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="font-medium block">New Post</span>
                        <span class="text-xs text-indigo-500 dark:text-indigo-400">Create content</span>
                    </div>
                </a>
                <a href="{{ route('products.create') }}" class="flex items-center gap-3 p-3 rounded-xl bg-emerald-50 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 hover:bg-emerald-100 dark:hover:bg-emerald-900/50 transition-colors group">
                    <div class="w-10 h-10 rounded-lg bg-emerald-600 flex items-center justify-center text-white group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="font-medium block">New Product</span>
                        <span class="text-xs text-emerald-500 dark:text-emerald-400">Add to inventory</span>
                    </div>
                </a>
                <a href="{{ route('categories.create') }}" class="flex items-center gap-3 p-3 rounded-xl bg-amber-50 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300 hover:bg-amber-100 dark:hover:bg-amber-900/50 transition-colors group">
                    <div class="w-10 h-10 rounded-lg bg-amber-600 flex items-center justify-center text-white group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="font-medium block">New Category</span>
                        <span class="text-xs text-amber-500 dark:text-amber-400">Organize items</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Recent Posts -->
        <div class="card card-hover p-6 animate-slide-up delay-300">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white flex items-center gap-2">
                    <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    Recent Posts
                </h3>
                <a href="{{ route('posts.index') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline font-medium">View all →</a>
            </div>
            
            @php $recentPosts = \App\Models\Post::latest()->take(4)->get(); @endphp
            
            @if($recentPosts->count() > 0)
                <div class="space-y-3">
                    @foreach($recentPosts as $post)
                        <div class="flex items-center gap-4 p-3 rounded-xl bg-gray-50 dark:bg-gray-700/50 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-12 h-12 rounded-lg object-cover">
                            @else
                                <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-indigo-100 to-purple-100 dark:from-indigo-900/50 dark:to-purple-900/50 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-gray-900 dark:text-white truncate">{{ $post->title }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                            <a href="{{ route('posts.show', $post) }}" class="opacity-0 group-hover:opacity-100 text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-500 dark:text-gray-400 mb-4">No posts yet</p>
                    <a href="{{ route('posts.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Create First Post
                    </a>
                </div>
            @endif
        </div>

        <!-- Recent Products -->
        <div class="card card-hover p-6 animate-slide-up delay-300">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    Recent Products
                </h3>
                <a href="{{ route('products.index') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline font-medium">View all →</a>
            </div>
            
            @php $recentProducts = \App\Models\Product::latest()->take(4)->get(); @endphp
            
            @if($recentProducts->count() > 0)
                <div class="space-y-3">
                    @foreach($recentProducts as $product)
                        <div class="flex items-center gap-4 p-3 rounded-xl bg-gray-50 dark:bg-gray-700/50 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-12 h-12 rounded-lg object-cover">
                            @else
                                <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-blue-100 to-cyan-100 dark:from-blue-900/50 dark:to-cyan-900/50 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                            @endif
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-gray-900 dark:text-white truncate">{{ $product->name }}</p>
                                <div class="flex items-center gap-2 text-sm">
                                    <span class="text-emerald-600 dark:text-emerald-400 font-medium">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    <span class="text-gray-400">•</span>
                                    <span class="text-gray-500 dark:text-gray-400">{{ $product->quantity }} in stock</span>
                                </div>
                            </div>
                            <a href="{{ route('products.show', $product) }}" class="opacity-0 group-hover:opacity-100 text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <p class="text-gray-500 dark:text-gray-400 mb-4">No products yet</p>
                    <a href="{{ route('products.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-lg transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Add First Product
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Categories Overview -->
    <div class="card card-hover p-6 animate-slide-up delay-300">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
                Categories Overview
            </h3>
            <a href="{{ route('categories.index') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline font-medium">Manage →</a>
        </div>
        
        @php $categories = \App\Models\Category::withCount('products')->take(6)->get(); @endphp
        
        @if($categories->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @foreach($categories as $category)
                    <a href="{{ route('categories.show', $category) }}" 
                        class="p-4 rounded-xl bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700/50 dark:to-gray-800/50 hover:from-indigo-50 hover:to-purple-50 dark:hover:from-indigo-900/30 dark:hover:to-purple-900/30 border border-gray-200 dark:border-gray-700 hover:border-indigo-300 dark:hover:border-indigo-700 transition-all duration-300 group text-center">
                        <div class="w-12 h-12 mx-auto mb-3 rounded-xl bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center text-white group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                        <p class="font-medium text-gray-900 dark:text-white text-sm truncate">{{ $category->name }}</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $category->products_count }} products</p>
                    </a>
                @endforeach
            </div>
        @else
            <div class="text-center py-8">
                <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
                <p class="text-gray-500 dark:text-gray-400 mb-4">No categories yet</p>
                <a href="{{ route('categories.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white text-sm font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Create Category
                </a>
            </div>
        @endif
    </div>
</x-app-layout>