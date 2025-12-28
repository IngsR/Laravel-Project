<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
                    {{ __('Profile Settings') }}
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Manage your account information and security</p>
            </div>
        </div>
    </x-slot>

    <div class="max-w-4xl space-y-6">
        <!-- Profile Information -->
        <div class="card p-6 sm:p-8 animate-slide-up">
            @include('profile.partials.update-profile-information-form')
        </div>

        <!-- Update Password -->
        <div class="card p-6 sm:p-8 animate-slide-up delay-100">
            @include('profile.partials.update-password-form')
        </div>

        <!-- Delete Account -->
        <div class="card p-6 sm:p-8 animate-slide-up delay-200 border-red-100 dark:border-red-900/50">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-app-layout>
