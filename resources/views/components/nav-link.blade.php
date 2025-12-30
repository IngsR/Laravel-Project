@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3 py-2 border-b-2 border-indigo-500 text-sm font-medium text-indigo-700 dark:text-indigo-300 focus:outline-none focus:border-indigo-700 transition duration-200 ease-in-out'
            : 'inline-flex items-center px-3 py-2 border-b-2 border-transparent text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 transition duration-200 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
