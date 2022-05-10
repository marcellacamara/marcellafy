@props(['artist', 'href' => '#'])
<div class="flex bg-transparent hover:bg-gray-900/10 rounded-lg border border-gray-900/10 shadow-md">

  <img class="shadow rounded w-24 align-middle border-none rounded-t-lg" src="{{ $artist->avatar }}"
    alt="{{ $artist->name }}" style="width: 8rem; height: 8rem;object-fit: cover;" />
  <div class="flex flex-1 flex-col justify-center items-center">

    <span class="text-2xl font-bold uppercase tracking-tight text-white">{{ $artist->name }}</span>

    <a href="{{ $href }}"
      class="flex justify-center py-2 px-8 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-black/60 focus:ring-4 focus:outline-none">
      <x-feathericon-play />

    </a>
  </div>
</div>
