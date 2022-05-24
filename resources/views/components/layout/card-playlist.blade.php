@props(['playlist', 'href' => '#'])
<div
  class="flex items-center justify-between ml-1 bg-transparent border rounded-lg shadow-md hover:bg-gray-900/10 border-gray-900/10">

  <span class="ml-1 text-2xl font-bold tracking-tight text-center text-white uppercase">{{ $playlist->name }}</span>
  <div class="flex gap-1">
    <a href="{{ $href }}"
      class="flex justify-center px-8 py-2 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-black/60 focus:ring-4 focus:outline-none">
      <x-feathericon-play />
    </a>
    <a href="{{ $href }}"
      class="flex justify-center px-8 py-2 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-black/60 focus:ring-4 focus:outline-none">
      <x-feathericon-edit />
    </a>
    <a href="{{ $href }}"
      class="flex justify-center px-8 py-2 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-black/60 focus:ring-4 focus:outline-none">
      <x-feathericon-trash-2 />
    </a>
  </div>
</div>
