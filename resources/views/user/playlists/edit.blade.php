<x-layout.guest>
  <x-layout.topbar />
  <x-alert />
  <x-form-card>
    <form method="POST" action="{{ route('playlists.update', $playlist->id) }}">
      @csrf
      @method('PUT')
      <div class="mt-1 text-black">
        <x-label for="name">Nome da playlist</x-label>
        <x-input type="text" name="name" id="name" class="block w-full mt-1 text-black"
          value="{{ $playlist->name }}" />
      </div>
      <div class="flex items-center justify-end mt-3">
        <a href="{{ route('playlists.index') }}"
          class="px-4 py-2 ml-3 text-xs font-bold text-black uppercase transition-all duration-150 ease-linear bg-white rounded outline-none hover:text-opacity-75 focus:outline-none">
          Cancelar
        </a>
        <x-button class="ml-3">
          {{ __('Editar') }}
        </x-button>
      </div>
    </form>
  </x-form-card>
</x-layout.guest>
