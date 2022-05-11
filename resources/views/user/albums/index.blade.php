<x-guest-layout>
  <x-layout.topbar />
  <x-layout.nav />
  <span
    class="p-4 text-6xl font-bold tracking-tight text-black uppercase hover:font-extrabold">{{ $artist->name }}</span>
  <div class="grid grid-cols-2 gap-4 p-4">
    @foreach ($albums as $album)
      <x-layout.card-album :album="$album" :href="route('albums.musics.index', $album->id)" />
    @endforeach
  </div>
</x-guest-layout>
