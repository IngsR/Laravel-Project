@props(['active' => false])

<a {{ $attributes->merge([
    'class' => 'flex items-center gap-3 w-full px-4 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700/50 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-700/50 transition-colors duration-150 ' . ($active ? 'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300' : '')
]) }}>{{ $slot }}</a>
