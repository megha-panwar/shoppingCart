<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
        <!-- Google Login Button -->
    <div class="mt-4 flex justify-center">
        <a href="{{ route('google.redirect') }}"
           class="w-full flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 48 48"><path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.09 2.7 29.91.5 24 .5 14.64.5 6.6 6.96 3.64 15.64l7.98 6.2C13.3 13.54 18.29 9.5 24 9.5z"/><path fill="#4285F4" d="M46.5 24c0-1.57-.14-3.08-.39-4.5H24v9h12.7c-.55 2.91-2.21 5.37-4.7 7.01l7.27 5.64C43.91 37.07 46.5 31 46.5 24z"/><path fill="#FBBC05" d="M11.62 28.46A14.5 14.5 0 019.5 24c0-1.54.27-3.02.75-4.46l-7.98-6.2A23.92 23.92 0 00.5 24c0 3.92.94 7.62 2.62 10.9l8.5-6.44z"/><path fill="#34A853" d="M24 47.5c6.48 0 11.92-2.14 15.9-5.82l-7.27-5.64c-2.02 1.36-4.61 2.16-8.63 2.16-5.71 0-10.7-4.04-12.38-9.64l-8.5 6.44C6.6 41.04 14.64 47.5 24 47.5z"/></svg>
            Continue with Google
        </a>
    </div>
</x-guest-layout>
