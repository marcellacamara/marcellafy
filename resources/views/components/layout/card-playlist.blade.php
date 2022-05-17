@props(['playlist', 'href' => '#'])
<div class="flex bg-transparent border rounded-lg shadow-md hover:bg-gray-900/10 border-gray-900/10">
  <span class="text-2xl font-bold tracking-tight text-white uppercase">{{ $playlist->name }}</span>
  <a href="{{ $href }}"
    class="flex justify-center px-8 py-2 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-black/60 focus:ring-4 focus:outline-none">
    <div class="flex flex-row-reverse justify-end">
      <x-feathericon-play />
    </div>
  </a>
</div>
