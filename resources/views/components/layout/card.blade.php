@props(['artist', 'href' => '#'])
<div
  class="mx-4 mt-4 grid grid-cols-3 max-w-sm bg-transparent hover:bg-gray-900/10 rounded-lg border border-gray-900/20 shadow-md">
  <a href="{{ $href }}">
    <img class="max-w-full shadow rounded w-24 align-middle border-none rounded-t-lg" src="{{ $artist->avatar }}"
      alt="{{ $artist->name }}" style="width: 8rem; height: 8rem;object-fit: cover;" />
  </a>
  <div class="p-5">
    <a href="{{ $href }}">
      <h5 class="mb-2 mx-16 text-2xl font-bold uppercase tracking-tight text-white">{{ $artist->name }}</h5>
    </a>
    <a href="{{ $href }}"
      class="inline-flex mx-16 py-2 px-8 text-sm font-medium text-center text-white bg-pink-500 rounded-lg hover:bg-pink-400 focus:ring-4 focus:outline-none">
      <x-feathericon-play />
    </a>
  </div>
</div>
