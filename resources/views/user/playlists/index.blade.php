<x-guest-layout>
  <x-layout.topbar />
  <x-layout.nav />
  <span class="p-4 text-6xl font-bold tracking-tight text-black uppercase hover:font-extrabold">Playlists</span>
  <div class="grid grid-cols-1 gap-4 p-4">
    @foreach ($playlists as $playlist)
      <x-layout.card-playlist :playlist="$playlist" />
    @endforeach
</x-guest-layout>
