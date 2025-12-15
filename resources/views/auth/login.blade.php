<x-guest-layout>
    <div x-data="{ isRegistering: {{ request()->has('register') ? 'true' : 'false' }} }" class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">

        {{-- Login Form --}}
        <div x-show="!isRegistering" 
             x-transition:enter="transition ease-out duration-300" 
             x-transition:enter-start="opacity-0 transform scale-95" 
             x-transition:enter-end="opacity-100 transform scale-100" 
             x-transition:leave="transition ease-in duration-200" 
             x-transition:leave-start="opacity-100 transform scale-100" 
             x-transition:leave-end="opacity-0 transform scale-95" 
             class="space-y-6">
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Sign in to our platform</h5>
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                <div>
                    <x-input-label for="email" value="Your email" />
                    <x-text-input id="email" name="email" type="email" placeholder="name@company.com" :value="old('email')" required autofocus autocomplete="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="password" value="Your password" />
                    <x-text-input id="password" name="password" type="password" placeholder="••••••••" required autocomplete="current-password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="flex items-start justify-between">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" name="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                        </div>
                        <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Lost Password?</a>
                    @endif
                </div>
                <x-primary-button class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    {{ __('Log in to your account') }}
                </x-primary-button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    Not registered? <button type="button" @click="isRegistering = true" class="text-blue-700 hover:underline dark:text-blue-500">Create account</button>
                </div>
            </form>
        </div>

        {{-- Register Form --}}
        <div x-show="isRegistering" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95" class="space-y-6" style="display: none;">
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Create a new account</h5>
            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf
                <div>
                    <x-input-label for="register_name" value="Your name" />
                    <x-text-input id="register_name" name="name" type="text" placeholder="John Doe" :value="old('name')" required autofocus autocomplete="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="register_email" value="Your email" />
                    <x-text-input id="register_email" name="email" type="email" placeholder="name@company.com" :value="old('email')" required autocomplete="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="register_password" value="Your password" />
                    <x-text-input id="register_password" name="password" type="password" placeholder="••••••••" required autocomplete="new-password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="password_confirmation" value="Confirm password" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" placeholder="••••••••" required autocomplete="new-password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <x-primary-button class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    {{ __('Create account') }}
                </x-primary-button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    Already registered? <button type="button" @click="isRegistering = false" class="text-blue-700 hover:underline dark:text-blue-500">Login</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>