<x-guest-layout>
  <x-layout.topbar />
  <x-layout.nav />
  <x-alert />
  <x-form-card>
    <form action=" {{ route('user.update', $user->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mt-1 text-black">
        <x-label for="name">Nome</x-label>
        <x-input type="text" name="name" id="name" class="block w-full mt-1 text-black" value="{{ $user->name }}" />
      </div>
      <div class="mt-1 text-black">
        <x-label for="email">E-mail</x-label>
        <x-input type="email" name="email" id="email" class="block w-full mt-1 text-black"
          value="{{ $user->email }}" />
      </div>
      <div class="mt-1 text-black">
        <x-label for="password">Senha</x-label>
        <x-input type="password" name="password" id="password" class="block w-full mt-1 text-black" />
      </div>
      <div class="mt-1 text-black">
        <x-label for="password_confirmation">Confirmar senha</x-label>
        <x-input type="password" name="password_confirmation" id="password_confirmation"
          class="block w-full mt-1 text-black" />
      </div>
      <div class="flex items-center justify-end mt-3">
        <a href="{{ route('dashboard') }}"
          class="bg-white text-black hover:text-opacity-75 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none ml-3 ease-linear transition-all duration-150">
          Cancelar
        </a>
        <x-button class="ml-3">
          {{ __('Atualizar') }}
        </x-button>
      </div>
    </form>
  </x-form-card>
</x-guest-layout>
