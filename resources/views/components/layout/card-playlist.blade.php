@props(['playlist'])
<div
  class="flex items-center justify-between ml-1 bg-transparent border rounded-lg shadow-md hover:bg-gray-900/10 border-gray-900/10">

  <a href="{{ route('playlists.show', $playlist->id) }}"
    class="ml-1 text-2xl font-bold tracking-tight text-center text-white uppercase hover:underline">{{ $playlist->name }}</a>
  <div class="flex gap-1" x-data="{ show: false }">
    <a href="{{ route('playlists.edit', $playlist->id) }}"
      class="flex justify-center px-4 py-2 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-black/60 focus:ring-4 focus:outline-none">
      <x-feathericon-edit class="w-4 h-4" />
    </a>

    {{-- Modal --}}
    <button @click="show=true"
      class="flex justify-center px-4 py-2 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-black/60 focus:ring-4 focus:outline-none"
      type="button">
      <x-feathericon-trash-2 class="w-4 h-4" />
    </button>
    <div x-cloak x-show="show" class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
      <div @click.away="show = false" class="max-w-sm p-6 bg-black rounded-lg">
        <div class="flex items-center justify-between">
          <h3 class="text-2xl">Deletar playlist</h3>
          <svg @click="show=false" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <div class="mt-4">
          <p class="mb-4 text-sm">Tem certeza que deseja deletar {{ $playlist->name }}?</p>
          <div class="flex">
            <button @click="show=false"
              class="px-4 py-2 mb-1 mr-1 text-xs font-bold text-black uppercase transition-all duration-150 ease-linear bg-white rounded outline-none hover:text-opacity-75 focus:outline-none">Cancelar</button>
            <form action="{{ route('playlists.destroy', $playlist->id) }}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit"
                class="px-4 py-2 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-pink-600 rounded outline-none hover:text-opacity-75 focus:outline-none">Deletar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
