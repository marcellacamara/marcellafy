<x-guest-layout>
  <x-layout.topbar />
  <x-alert />
  <x-form-card>
    <form method="POST" action="{{ route('admin.musics.update', $music->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mt-1 text-black">
        <x-label for="name">Nome da música</x-label>
        <x-input type="text" name="title" id="title" class="block w-full mt-1 text-black"
          value="{{ $music->title }}" />
      </div>
      <div class="mt-1">
        <x-label for="file">Arquivo da música</x-label>
        <x-input type="file" name="file" id="file" class="block w-full mt-1 text-black" />
      </div>

      <div class="flex items-center justify-end mt-3">
        <a href="{{ route('admin.artists.index') }}"
          class="bg-white text-black hover:text-opacity-75 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none ml-3 ease-linear transition-all duration-150">
          Cancelar
        </a>
        <x-button class="ml-3">
          {{ __('Editar') }}
        </x-button>
      </div>
    </form>
  </x-form-card>
</x-guest-layout>
