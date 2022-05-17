<x-layout.guest>
  <x-layout.topbar />
  <x-layout.nav />
  <x-alert />
  <x-form-card>
    <form method="POST" action="{{ route('playlists.store') }}">
      @csrf
      <div class="mt-1 text-black">
        <x-label for="name">Nome da playlist</x-label>
        <x-input type="text" name="name" id="name" class="block w-full mt-1 text-black" value="{{ old('name') }}" />
      </div>
      <div class="flex items-center justify-end mt-3">
        <x-button class="ml-3">
          {{ __('Cadastrar') }}
        </x-button>
      </div>
    </form>
  </x-form-card>
</x-layout.guest>
