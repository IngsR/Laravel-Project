<section>
    <header>
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-lg bg-emerald-100 dark:bg-emerald-900/50 flex items-center justify-center">
                <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-lg font-bold text-gray-900 dark:text-white">
                    {{ __('Update Password') }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Ensure your account is using a long, random password to stay secure.') }}
                </p>
            </div>
        </div>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Current Password
            </label>
            <input type="password" id="update_password_current_password" name="current_password" autocomplete="current-password"
                class="input-modern"
                placeholder="••••••••">
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                New Password
            </label>
            <input type="password" id="update_password_password" name="password" autocomplete="new-password"
                class="input-modern"
                placeholder="••••••••">
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Confirm Password
            </label>
            <input type="password" id="update_password_password_confirmation" name="password_confirmation" autocomplete="new-password"
                class="input-modern"
                placeholder="••••••••">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-gray-100 dark:border-gray-700">
            <button type="submit" class="btn-primary">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                {{ __('Update Password') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-emerald-600 dark:text-emerald-400 font-medium"
                >{{ __('Password updated!') }}</p>
            @endif
        </div>
    </form>
</section>
