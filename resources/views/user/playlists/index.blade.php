<x-layout.guest>
  <x-layout.topbar />
  <x-layout.nav />
  <span class="p-4 text-6xl font-bold tracking-tight text-black uppercase hover:font-extrabold">Playlists</span>
  <div class="px-4">
    <div class="flex items-center">
      <button
        class="px-4 py-2 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-black rounded shadow outline-none active:bg-pink-500 hover:text-opacity-75 hover:shadow-md focus:outline-none">
        <a href="{{ route('playlists.create') }}">
          Cadastrar playlist
        </a>
      </button>
    </div>
  </div>
  <div class="grid grid-cols-1 gap-4 p-4">
    @foreach ($playlists as $playlist)
      <x-layout.card-playlist :playlist="$playlist" />
    @endforeach
  </div>
</x-layout.guest>
