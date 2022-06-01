<x-layout.guest>
  <x-layout.topbar />
  <x-alert />
  <x-form-card>
    <form method="post" action="{{ route('admin.artists.update', $artist->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mt-1 text-black">
        <x-label for="name">Nome do artista</x-label>
        <x-input type="text" name="name" id="name" class="block w-full mt-1 text-black" value="{{ $artist->name }}" />
      </div>
      <div class="mt-1">
        <x-label for="file">Avatar</x-label>
        <x-input type="file" name="avatar" id="avatar" class="block w-full mt-1 text-black" />
      </div>

      <div class="flex items-center justify-end mt-3">
        <a href="{{ route('admin.artists.index') }}"
          class="px-4 py-2 ml-3 text-xs font-bold text-black uppercase transition-all duration-150 ease-linear bg-white rounded outline-none hover:text-opacity-75 focus:outline-none">
          Cancelar
        </a>
        <x-button class="ml-3 hover:text-opacity-75">
          {{ __('Editar') }}
        </x-button>
      </div>
    </form>
  </x-form-card>
</x-layout.guest>
