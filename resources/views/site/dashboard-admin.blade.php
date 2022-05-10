<x-layout.admin>

  <div class="p-4 grid grid-cols-2 gap-4">
    @foreach ($artists as $artist)
      <x-layout.card :artist="$artist" :href="route('admin.artists.albums.index', $artist->id)" />
    @endforeach
  </div>


</x-layout.admin>
