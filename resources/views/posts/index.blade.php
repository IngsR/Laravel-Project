@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">All Posts</h1>
            <a href="{{ route('posts.create') }}" class="px-6 py-3 text-white bg-indigo-600 hover:bg-indigo-700 rounded-full transition-colors duration-300">Create Post</a>
        </div>

        @if ($message = Session::get('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ $message }}</span>
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg">
            <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($posts as $post)
                    <li class="p-6 flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $post->title }}</h2>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">{{ Str::limit($post->content, 150) }}</p>
                        </div>
                        <div class="flex space-x-4">
                            <a href="{{ route('posts.show', $post->id) }}" class="px-4 py-2 text-white bg-blue-500 hover:bg-blue-600 rounded-full transition-colors duration-300">View</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="px-4 py-2 text-white bg-yellow-500 hover:bg-yellow-600 rounded-full transition-colors duration-300">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 text-white bg-red-500 hover:bg-red-600 rounded-full transition-colors duration-300">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
