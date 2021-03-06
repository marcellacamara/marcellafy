<x-guest-layout>
  <x-layout.topbar />
  <x-auth-card>
    <x-slot name="logo">
      <a href="/">
        <x-application-logo class="w-10 sm:w-20" />
      </a>
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-black" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4 text-black" :errors="$errors" />

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <!-- Email Address -->
      <div>
        <x-label for="email">Email</x-label>

        <x-input id="email" class="block w-full mt-1 text-black" type="email" name="email" :value="old('email')" required
          autofocus />
      </div>

      <!-- Password -->
      <div class="mt-4 text-black">
        <x-label for="password">Password</x-label>

        <x-input id="password" class="block w-full mt-1" type="password" name="password" required
          autocomplete="current-password" />
      </div>

      <!-- Remember Me -->
      <div class="block mt-4 text-white">
        <label for="remember_me" class="inline-flex items-center">
          <input id="remember_me" type="checkbox"
            class="text-purple-400 border-purple-300 rounded shadow-sm focus:border-purple-300 focus:ring focus:ring-purple-300 focus:ring-opacity-50"
            name="remember">
          <span class="ml-2 text-sm text-gray-300">{{ __('Remember me') }}</span>
        </label>
      </div>

      <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
          <a class="text-sm text-gray-400 underline hover:text-gray-500" href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
          </a>
        @endif

        <x-button class="ml-3 mr-1 mb-1">
          {{ __('Login') }}
        </x-button>
      </div>
    </form>
  </x-auth-card>
</x-guest-layout>
