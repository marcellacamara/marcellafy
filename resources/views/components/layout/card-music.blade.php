@props(['music', 'album'])
<div class="flex bg-transparent border rounded-lg shadow-md hover:bg-gray-900/10 border-gray-900/10">

  <img class="w-24 align-middle border-none rounded rounded-t-lg shadow" src="{{ asset($album->cover_image) }}"
    alt="{{ $album->title }}" style="width: 8rem; height: 8rem;object-fit: cover;" />
  <div class="flex flex-col items-center justify-center flex-1">

    <span class="text-2xl font-bold tracking-tight text-white uppercase">{{ $music->title }} </span>
    <audio controls>
      <source src="{{ asset($music->file) }}" type="audio/mpeg">
      <x-feathericon-play />
  </div>
</div>
