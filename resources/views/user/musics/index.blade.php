<x-layout.guest>
  <x-layout.topbar />
  <x-layout.nav />
  <span
    class="p-4 text-6xl font-bold tracking-tight text-black uppercase hover:font-extrabold">{{ $album->title }}</span>
  <span class="p-4 text-xl font-bold tracking-tight text-gray-900 uppercase hover:opacity-75">{{ $album->title }}
    •
    {{ $album->year }} • {{ $album->musics->count() }} músicas •
    {{ sprintf('%02d:%02d:%02d', $album->musics->sum('duration') / 3600, $album->musics->sum('duration') / 60, $album->musics->sum('duration') % 60) }}</span>
  <div class="grid grid-cols-1 gap-4 p-4">
    @foreach ($album->musics as $music)
      <x-layout.card-music :music="$music" :album="$album" :playlists="$playlists" />
    @endforeach
  </div>
</x-layout.guest>
