<x-guest-layout>
  <x-layout.topbar />
  <x-layout.nav />
  <div class="p-4 grid grid-cols-2 gap-4">
    @foreach ($albums as $album)
      <x-layout.card-album :album="$album" :href="route('admin.albums.musics.index', $album->id)" />
    @endforeach
  </div>


</x-guest-layout>
