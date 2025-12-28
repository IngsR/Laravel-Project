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
                    {{ __('Add New Product') }}
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Fill in the details to create a new product</p>
            </div>
        </div>
    </x-slot>

    <div class="card p-8 animate-slide-up">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Product Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                        class="input-modern"
                        placeholder="Enter product name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- SKU -->
                <div>
                    <label for="sku" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        SKU <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="sku" name="sku" value="{{ old('sku') }}" required
                        class="input-modern"
                        placeholder="e.g., PRD-001">
                    <x-input-error :messages="$errors->get('sku')" class="mt-2" />
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Price <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400">$</span>
                        <input type="number" id="price" name="price" value="{{ old('price') }}" required step="0.01" min="0"
                            class="input-modern pl-8"
                            placeholder="0.00">
                    </div>
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <!-- Quantity -->
                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Quantity <span class="text-red-500">*</span>
                    </label>
                    <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" required min="0"
                        class="input-modern"
                        placeholder="0">
                    <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                </div>

                <!-- Category -->
                <div class="md:col-span-2">
                    <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Category
                    </label>
                    <select name="category_id" id="category_id" class="input-modern">
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Description
                    </label>
                    <textarea id="description" name="description" rows="4" 
                        class="input-modern resize-none"
                        placeholder="Enter product description...">{{ old('description') }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
            </div>

            <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                <a href="{{ route('products.index') }}" class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn-success">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Save Product
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
