<x-layout.guest>
  <x-layout.topbar />
  <x-layout.nav />
  <span
    class="p-4 text-6xl font-bold tracking-tight text-black uppercase hover:font-extrabold">{{ $playlist->name }}</span>
  <div class="grid grid-cols-1 gap-4 p-4">
    @foreach ($playlist->musics as $music)
      <x-layout.card-music-playlist :music="$music" :playlist="$playlist" />
    @endforeach
  </div>
</x-layout.guest>
