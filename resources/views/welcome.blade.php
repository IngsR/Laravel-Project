<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
        <div class="container mx-auto px-4">

            <header class="flex justify-between items-center py-8">
                <div>
                    <a href="/" class="text-2xl font-bold text-gray-900 dark:text-white">My Application</a>
                </div>
                <nav>
                    <a href="{{ route('posts.index') }}" class="px-6 py-3 text-white bg-indigo-600 hover:bg-indigo-700 rounded-full transition-colors duration-300">All Posts</a>
                </nav>
            </header>

            <main>
                <div class="text-center py-20">
                    <h1 class="text-5xl font-extrabold text-gray-900 dark:text-white">Welcome to My Application</h1>
                    <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">A place to share your thoughts and ideas with the world.</p>
                </div>

                <div>
                    <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-white mb-12">Recent Posts</h2>

                    @if($posts->count())
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach ($posts as $post)
                                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                                    <div class="p-6">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $post->title }}</h3>
                                        <p class="mt-4 text-gray-600 dark:text-gray-400">{{ Str::limit($post->content, 100) }}</p>
                                        <div class="mt-6">
                                            <a href="{{ route('posts.show', $post) }}" class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-200 font-semibold">Read more &rarr;</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center text-gray-500 dark:text-gray-400">No posts found.</p>
                    @endif
                </div>

                <div class="text-center py-20">
                    <a href="{{ route('posts.index') }}" class="px-8 py-4 text-white bg-indigo-600 hover:bg-indigo-700 rounded-full transition-colors duration-300 text-lg">View All Posts</a>
                </div>
            </main>

            <footer class="text-center py-8 text-gray-500 dark:text-gray-400">
                <p>&copy; {{ date('Y') }} My Application. All rights reserved.</p>
            </footer>

        </div>
    </body>
</html>