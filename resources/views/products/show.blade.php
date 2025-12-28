<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('products.index') }}" class="p-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <div>
                <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
                    {{ __('Product Details') }}
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">View product information</p>
            </div>
        </div>
    </x-slot>

    <div class="card overflow-hidden animate-slide-up">
        <!-- Product Header -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-xl bg-white/20 backdrop-blur flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-white">{{ $product->name }}</h3>
                        <p class="text-white/80">SKU: {{ $product->sku }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('products.edit', $product->id) }}" class="inline-flex items-center px-4 py-2 bg-white/20 hover:bg-white/30 text-white font-medium rounded-lg transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </a>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 bg-white text-indigo-600 font-medium rounded-lg hover:bg-gray-100 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                        All Products
                    </a>
                </div>
            </div>
        </div>

        <!-- Product Details -->
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Price Card -->
                <div class="bg-emerald-50 dark:bg-emerald-900/30 rounded-xl p-4 border border-emerald-100 dark:border-emerald-800">
                    <p class="text-sm text-emerald-600 dark:text-emerald-400 font-medium mb-1">Price</p>
                    <p class="text-2xl font-bold text-emerald-700 dark:text-emerald-300">${{ number_format($product->price, 2) }}</p>
                </div>

                <!-- Stock Card -->
                <div class="bg-blue-50 dark:bg-blue-900/30 rounded-xl p-4 border border-blue-100 dark:border-blue-800">
                    <p class="text-sm text-blue-600 dark:text-blue-400 font-medium mb-1">Stock Quantity</p>
                    <p class="text-2xl font-bold text-blue-700 dark:text-blue-300">{{ $product->quantity }}</p>
                </div>

                <!-- Category Card -->
                <div class="bg-purple-50 dark:bg-purple-900/30 rounded-xl p-4 border border-purple-100 dark:border-purple-800">
                    <p class="text-sm text-purple-600 dark:text-purple-400 font-medium mb-1">Category</p>
                    <p class="text-lg font-bold text-purple-700 dark:text-purple-300">{{ $product->category->name ?? 'Uncategorized' }}</p>
                </div>

                <!-- Status Card -->
                <div class="bg-amber-50 dark:bg-amber-900/30 rounded-xl p-4 border border-amber-100 dark:border-amber-800">
                    <p class="text-sm text-amber-600 dark:text-amber-400 font-medium mb-1">Status</p>
                    @if($product->quantity > 10)
                        <span class="inline-flex items-center text-lg font-bold text-emerald-600 dark:text-emerald-400">
                            <span class="w-2 h-2 mr-2 rounded-full bg-emerald-500"></span>
                            In Stock
                        </span>
                    @elseif($product->quantity > 0)
                        <span class="inline-flex items-center text-lg font-bold text-amber-600 dark:text-amber-400">
                            <span class="w-2 h-2 mr-2 rounded-full bg-amber-500"></span>
                            Low Stock
                        </span>
                    @else
                        <span class="inline-flex items-center text-lg font-bold text-red-600 dark:text-red-400">
                            <span class="w-2 h-2 mr-2 rounded-full bg-red-500"></span>
                            Out of Stock
                        </span>
                    @endif
                </div>
            </div>

            <!-- Description -->
            <div class="mb-8">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Description</h4>
                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4">
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        {{ $product->description ?? 'No description provided.' }}
                    </p>
                </div>
            </div>

            <!-- Timestamps -->
            <div class="flex flex-wrap gap-6 pt-6 border-t border-gray-100 dark:border-gray-700">
                <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span>Created: {{ $product->created_at->format('M d, Y h:i A') }}</span>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Updated: {{ $product->updated_at->format('M d, Y h:i A') }}</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
