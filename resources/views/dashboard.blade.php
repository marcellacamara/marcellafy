<x-layout.guest>
  <x-layout.topbar />
  <x-layout.nav />
  <span class="p-4 text-6xl font-bold hover:font-extrabold uppercase tracking-tight text-black">Artistas</span>
  <div class="p-4 grid grid-cols-2 gap-4">
    @foreach ($artists as $artist)
      <x-layout.card :artist="$artist" :href="route('artists.albums.index', $artist->id)" />
    @endforeach
  </div>
</x-layout.guest>
