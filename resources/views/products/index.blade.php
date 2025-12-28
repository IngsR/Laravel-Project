<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
                    {{ __('Products') }}
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Manage your product inventory</p>
            </div>
            <a href="{{ route('products.create') }}" class="btn-success">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add New Product
            </a>
        </div>
    </x-slot>

    <!-- Alert Messages -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success mb-6 animate-slide-down">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-medium">{{ $message }}</span>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-error mb-6 animate-slide-down">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-medium">{{ $message }}</span>
        </div>
    @endif

    <!-- Products Table Card -->
    <div class="card overflow-hidden animate-slide-up">
        <div class="overflow-x-auto">
            <table class="table-modern">
                <thead>
                    <tr>
                        <th scope="col" class="px-6 py-4">Product</th>
                        <th scope="col" class="px-6 py-4">SKU</th>
                        <th scope="col" class="px-6 py-4">Category</th>
                        <th scope="col" class="px-6 py-4">Price</th>
                        <th scope="col" class="px-6 py-4">Stock</th>
                        <th scope="col" class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr class="group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900 dark:text-white">{{ $product->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg">
                                    {{ $product->sku }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if($product->category)
                                    <span class="px-2.5 py-1 text-xs font-medium bg-indigo-100 dark:bg-indigo-900/50 text-indigo-700 dark:text-indigo-300 rounded-lg">
                                        {{ $product->category->name }}
                                    </span>
                                @else
                                    <span class="text-gray-400 dark:text-gray-500">N/A</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-semibold text-gray-900 dark:text-white">${{ number_format($product->price, 2) }}</span>
                            </td>
                            <td class="px-6 py-4">
                                @if($product->quantity > 10)
                                    <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium bg-emerald-100 dark:bg-emerald-900/50 text-emerald-700 dark:text-emerald-300 rounded-lg">
                                        <span class="w-1.5 h-1.5 mr-1.5 rounded-full bg-emerald-500"></span>
                                        {{ $product->quantity }} in stock
                                    </span>
                                @elseif($product->quantity > 0)
                                    <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium bg-amber-100 dark:bg-amber-900/50 text-amber-700 dark:text-amber-300 rounded-lg">
                                        <span class="w-1.5 h-1.5 mr-1.5 rounded-full bg-amber-500"></span>
                                        {{ $product->quantity }} low stock
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium bg-red-100 dark:bg-red-900/50 text-red-700 dark:text-red-300 rounded-lg">
                                        <span class="w-1.5 h-1.5 mr-1.5 rounded-full bg-red-500"></span>
                                        Out of stock
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('products.show', $product->id) }}" class="p-2 text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/30 rounded-lg transition-colors" title="View">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="p-2 text-gray-500 hover:text-amber-600 dark:text-gray-400 dark:hover:text-amber-400 hover:bg-amber-50 dark:hover:bg-amber-900/30 rounded-lg transition-colors" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-gray-500 hover:text-red-600 dark:text-gray-400 dark:hover:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/30 rounded-lg transition-colors" onclick="return confirm('Are you sure you want to delete this product?')" title="Delete">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                    </div>
                                    <p class="text-gray-500 dark:text-gray-400 font-medium">No products found</p>
                                    <p class="text-gray-400 dark:text-gray-500 text-sm mt-1">Get started by adding your first product</p>
                                    <a href="{{ route('products.create') }}" class="btn-primary mt-4">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                        Add Product
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $products->links() }}
    </div>
</x-app-layout>
