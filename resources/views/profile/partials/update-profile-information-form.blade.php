<section>
    <header>
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-lg bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center">
                <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-lg font-bold text-gray-900 dark:text-white">
                    {{ __('Profile Information') }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __("Update your account's profile information and email address.") }}
                </p>
            </div>
        </div>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Name
            </label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name"
                class="input-modern">
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Email
            </label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="username"
                class="input-modern">
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3">
                    <div class="alert alert-warning">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        <div>
                            <span>{{ __('Your email address is unverified.') }}</span>
                            <button form="send-verification" class="underline text-amber-700 dark:text-amber-300 hover:text-amber-800 dark:hover:text-amber-200 ml-1">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </div>
                    </div>

                    @if (session('status') === 'verification-link-sent')
                        <div class="alert alert-success mt-2">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>{{ __('A new verification link has been sent to your email address.') }}</span>
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-gray-100 dark:border-gray-700">
            <button type="submit" class="btn-primary">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                {{ __('Save Changes') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-emerald-600 dark:text-emerald-400 font-medium"
                >{{ __('Saved successfully!') }}</p>
            @endif
        </div>
    </form>
</section>
