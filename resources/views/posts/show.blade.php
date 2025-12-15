<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post Details') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        @if ($post->image)
            <img class="rounded-t-lg w-full h-96 object-cover" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" />
        @endif
        <div class="p-5 sm:p-8">
            <h1 class="mb-2 text-3xl sm:text-4xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">Published on {{ $post->created_at->format('M d, Y') }}</p>
            
            <div class="prose prose-lg dark:prose-invert max-w-none font-normal text-gray-700 dark:text-gray-400 space-y-4">
                {{ $post->content }}
            </div>

            <hr class="my-8 border-gray-200 dark:border-gray-700">

            <div class="flex items-center space-x-4">
                <a href="{{ route('posts.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">
                    <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                    </svg>
                    Back to Posts
                </a>
                <a href="{{ route('posts.edit', $post->id) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Edit
                </a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900" onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>