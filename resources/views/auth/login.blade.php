<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-[#10b981]" />
            <input id="email" class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-[#10b981] shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-[#10b981]" />

            <input id="password" class="block mt-1 w-full border rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-[#10b981] shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981]" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center text-[#10b981]">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-[#18181b] border-[#10b981] dark:border-gray-700 text-[#10b981] shadow-sm focus:ring-[#10b981] dark:focus:ring-[#10b981] dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-[#10b981]">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-[#10b981] hover:text-[#0e9e74]" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
