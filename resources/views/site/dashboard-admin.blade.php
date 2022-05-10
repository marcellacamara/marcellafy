<x-layout.admin>

  <div class="grid grid-cols-3">
    @foreach ($artists as $artist)
      <x-layout.card :artist="$artist" />
    @endforeach
  </div>


</x-layout.admin>
