<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-bold text-gray-800">{{ $product->name }}</h3>
                        <div>
                            <a href="{{ route('products.edit', $product->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">
                                Edit
                            </a>
                            <a href="{{ route('products.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Back to Products
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <strong class="text-gray-600">SKU:</strong>
                            <p class="text-gray-800">{{ $product->sku }}</p>
                        </div>
                        <div>
                            <strong class="text-gray-600">Category:</strong>
                            <p class="text-gray-800">{{ $product->category->name ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <strong class="text-gray-600">Price:</strong>
                            <p class="text-gray-800">${{ number_format($product->price, 2) }}</p>
                        </div>
                        <div>
                            <strong class="text-gray-600">Quantity in Stock:</strong>
                            <p class="text-gray-800">{{ $product->quantity }}</p>
                        </div>
                        <div class="md:col-span-2">
                            <strong class="text-gray-600">Description:</strong>
                            <p class="text-gray-800 mt-1">{{ $product->description ?? 'No description provided.' }}</p>
                        </div>
                        <div>
                            <strong class="text-gray-600">Created At:</strong>
                            <p class="text-gray-800">{{ $product->created_at->format('M d, Y h:i A') }}</p>
                        </div>
                        <div>
                            <strong class="text-gray-600">Last Updated:</strong>
                            <p class="text-gray-800">{{ $product->updated_at->format('M d, Y h:i A') }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
