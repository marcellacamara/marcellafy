@props(['music', 'album'])
<div class="flex bg-transparent border rounded-lg shadow-md hover:bg-gray-900/10 border-gray-900/10">

  <img class="w-24 align-middle border-none rounded rounded-t-lg shadow" src="{{ asset($album->cover_image) }}"
    alt="{{ $album->title }}" style="width: 8rem; height: 8rem;object-fit: cover;" />
  <div class="flex flex-col items-center justify-center flex-1">
    <span class="text-2xl font-bold tracking-tight text-white uppercase">{{ $music->title }} </span>
    <audio controls>
      <source src="{{ asset($music->file) }}" type="audio/mpeg">
    </audio>
  </div>
  <div class="flex flex-row-reverse items-center justify-end">
    <div @click.away="open = false" class="relative ml-3" x-data="{ open: false }">
      <div>
        <button @click="open = !open" type="button"
          class="bg-black text-white hover:text-opacity-75 active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 mr-4 rounded shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150"
          id="playlist-button" aria-expanded="false" aria-haspopup="true">
          <span class="sr-only uppercase">Adicionar música a playlist</span>
          Adicionar música a playlist
        </button>
      </div>
      <div x-cloak x-show="open" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute right-0 flex flex-col w-48 h-20 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
        <a href="{{ route('user') }}" class="flex px-4 py-2 text-sm text-left text-black hover:bg-gray-900/10"
          role="menuitem" tabindex="-1" id="theme-toggle">
          <span class="flex items-center ml-2 text-sm font-bold leading-snug text-black uppercase hover:opacity-75">
            PROFILE
          </span>
        </a>
      </div>
    </div>
  </div>
</div>
