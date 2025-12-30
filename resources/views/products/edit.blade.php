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
                    {{ __('Edit Product') }}
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Update product information</p>
            </div>
        </div>
    </x-slot>

    <div class="card p-8 animate-slide-up">
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Product Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required autofocus
                        class="input-modern"
                        placeholder="Enter product name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- SKU -->
                <div>
                    <label for="sku" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        SKU <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="sku" name="sku" value="{{ old('sku', $product->sku) }}" required
                        class="input-modern"
                        placeholder="e.g., PRD-001">
                    <x-input-error :messages="$errors->get('sku')" class="mt-2" />
                </div>

                <!-- Price in Rupiah -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Harga (Rupiah) <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 font-medium">Rp</span>
                        <input type="text" id="price_display" 
                            class="input-modern pl-12"
                            placeholder="0"
                            oninput="formatRupiah(this)">
                        <input type="hidden" id="price" name="price" value="{{ old('price', $product->price) }}">
                    </div>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Contoh: 150.000 untuk Rp 150.000</p>
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <!-- Quantity -->
                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Quantity <span class="text-red-500">*</span>
                    </label>
                    <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" required min="0"
                        class="input-modern"
                        placeholder="0">
                    <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                </div>

                <!-- Category -->
                <div class="md:col-span-2">
                    <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Category
                    </label>
                    @if($categories->count() > 0)
                        <select name="category_id" id="category_id" class="input-modern">
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <div class="p-4 rounded-xl bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-amber-100 dark:bg-amber-900/50 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-amber-800 dark:text-amber-200">Belum ada kategori</p>
                                    <p class="text-xs text-amber-600 dark:text-amber-400">Buat kategori terlebih dahulu</p>
                                </div>
                                <a href="{{ route('categories.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white text-sm font-medium rounded-lg transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    Buat Kategori
                                </a>
                            </div>
                        </div>
                        <input type="hidden" name="category_id" value="">
                    @endif
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Description
                    </label>
                    <textarea id="description" name="description" rows="4" 
                        class="input-modern resize-none"
                        placeholder="Enter product description...">{{ old('description', $product->description) }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
            </div>

            <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                <a href="{{ route('products.index') }}" class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Update Product
                </button>
            </div>
        </form>
    </div>

    <script>
        function formatRupiah(input) {
            // Remove non-digit characters
            let value = input.value.replace(/\D/g, '');
            
            // Store the raw number in hidden field
            document.getElementById('price').value = value;
            
            // Format with thousand separators
            if (value) {
                input.value = new Intl.NumberFormat('id-ID').format(value);
            }
        }
        
        // On page load, format any existing value
        document.addEventListener('DOMContentLoaded', function() {
            const priceInput = document.getElementById('price');
            const priceDisplay = document.getElementById('price_display');
            
            if (priceInput.value) {
                priceDisplay.value = new Intl.NumberFormat('id-ID').format(priceInput.value);
            }
        });
    </script>
</x-app-layout>
