@props(['album', 'href' => '#'])
<div class="flex bg-transparent border rounded-lg shadow-md hover:bg-gray-900/10 border-gray-900/10">
  <img class="w-24 align-middle border-none rounded rounded-t-lg shadow" src="{{ asset($album->cover_image) }}"
    alt="{{ $album->title }}" style="width: 8rem; height: 8rem;object-fit: cover;" />
  <div class="flex flex-col items-center justify-center flex-1">
    <span class="text-2xl font-bold tracking-tight text-white uppercase">{{ $album->title }}</span>
    <span class="text-sm font-bold tracking-tight text-white uppercase">{{ $album->year }}</span>
    <a href="{{ $href }}"
      class="flex justify-center px-8 py-2 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-black/60 focus:ring-4 focus:outline-none">
      <x-feathericon-play />
    </a>
  </div>
</div>
