<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('categories.index') }}" class="p-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <div>
                <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
                    {{ __('Edit Category') }}
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Update category information</p>
            </div>
        </div>
    </x-slot>

    <div class="max-w-2xl">
        <div class="card p-8 animate-slide-up">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Category Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required autofocus
                            class="input-modern"
                            placeholder="e.g., Electronics, Clothing, Books">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Description
                        </label>
                        <textarea id="description" name="description" rows="4" 
                            class="input-modern resize-none"
                            placeholder="Describe what products belong in this category...">{{ old('description', $category->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100 dark:border-gray-700">
                    <a href="{{ route('categories.index') }}" class="btn-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
