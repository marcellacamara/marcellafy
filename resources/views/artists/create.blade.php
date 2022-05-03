<x-guest-layout>
  <x-layout.topbar />
  <x-alert />
  <x-form-card>
    <form method="POST" action="{{ route('admin.artists.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="mt-1 text-black">
        <x-label for="name">Nome do artista</x-label>
        <x-input type="text" name="name" id="name" class="block w-full mt-1 text-black" value="{{ old('name') }}" />
      </div>
      <div class="mt-1">
        <x-label for="file">Avatar</x-label>
        <x-input type="file" name="avatar" id="avatar" class="block w-full mt-1 text-black" />
      </div>

      <div class="flex items-center justify-end mt-3">
        <x-button class="ml-3">
          {{ __('Cadastrar') }}
        </x-button>
      </div>
    </form>
  </x-form-card>
</x-guest-layout>
