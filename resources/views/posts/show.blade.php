@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
            <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white">{{ $post->title }}</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Published on {{ $post->created_at->format('M d, Y') }}</p>

            <div class="prose dark:prose-invert max-w-none mt-8 text-gray-700 dark:text-gray-300">
                {{ $post->content }}
            </div>

            <div class="mt-12 flex items-center space-x-4">
                <a href="{{ route('posts.index') }}" class="px-6 py-3 text-white bg-gray-500 hover:bg-gray-600 rounded-full transition-colors duration-300">Back to Posts</a>
                <a href="{{ route('posts.edit', $post->id) }}" class="px-6 py-3 text-white bg-yellow-500 hover:bg-yellow-600 rounded-full transition-colors duration-300">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-3 text-white bg-red-500 hover:bg-red-600 rounded-full transition-colors duration-300">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection