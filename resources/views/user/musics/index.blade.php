<x-guest-layout>
  <x-layout.topbar />
  <x-layout.nav />
  <span
    class="p-4 text-6xl font-bold tracking-tight text-black uppercase hover:font-extrabold">{{ $album->title }}</span>
  <div class="grid grid-cols-2 gap-4 p-4">
    @foreach ($album->musics as $music)
      <x-layout.card-music :music="$music", :album="$album" />
    @endforeach
  </div>
</x-guest-layout>
