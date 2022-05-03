<x-guest-layout>
  <x-layout.topbar />
  <x-auth-card>
    <x-slot name="logo">
      <a href="/">
        <x-application-logo class="w-20 h-20 text-black fill-current" />
      </a>
    </x-slot>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <!-- Name -->
      <div>
        <x-label for="name">Name</x-label>

        <x-input id="name" class="block w-full mt-1 text-black" type="text" name="name" :value="old('name')" required
          autofocus />
      </div>

      <!-- Email Address -->
      <div class="mt-4">
        <x-label for="email">Email</x-label>

        <x-input id="email" class="block w-full mt-1 text-black" type="email" name="email" :value="old('email')" required />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-label for="password">Password</x-label>

        <x-input id="password" class="block w-full mt-1 text-black" type="password" name="password" required
          autocomplete="new-password" />
      </div>

      <!-- Confirm Password -->
      <div class="mt-4">
        <x-label for="password_confirmation">Confirm Password</x-label>

        <x-input id="password_confirmation" class="block w-full mt-1 text-black" type="password"
          name="password_confirmation" required />
      </div>

      <div class="flex items-center justify-end mt-4">
        <a class="text-sm text-gray-400 underline hover:text-gray-500" href="{{ route('login') }}">
          {{ __('Already registered?') }}
        </a>

        <x-button class="ml-4">
          {{ __('Register') }}
        </x-button>
      </div>
    </form>
  </x-auth-card>
</x-guest-layout>
