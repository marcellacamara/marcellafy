<x-guest-layout>
  <x-layout.topbar />
  <x-alert />
  <x-layout.nav />

  <div class="px-12">
    <div class="flex items-center justify-between">
      <h1 class="text-2xl font-semibold hover:font-bold">Álbuns de <span
          class="uppercase">{{ $artist->name }}</span></h1>
      <button
        class="px-4 py-2 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-black rounded shadow outline-none active:bg-pink-500 hover:text-opacity-75 hover:shadow-md focus:outline-none">
        <a href="{{ route('admin.artists.albums.create', $artist->id) }}">
          Cadastrar álbum
        </a>
      </button>
    </div>

    <div class="overflow-x-hidden text-gray-100 bg-transparent shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left text-white">
        <thead class="text-xs text-white uppercase bg-black">
          <tr>
            <th scope="col" class="px-2 py-3">Capa</th>
            <th scope="col" class="px-2 py-3">Título</th>
            <th scope="col" class="px-2 py-3">Músicas</th>
            <th scope="col" class="px-2 py-3">Duração</th>
            <th scope="col" class="px-2 py-3">Ações</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($artist->albums as $album)
            <tr class="border-2 border-transparent hover:bg-gray-900/10">
              <td class="px-2 py-3">
                <div class="w-6/12 sm:w-4/12">
                  <img src="{{ asset($album->cover_image) }}" alt="{{ $artist->name }}"
                    class="w-24 align-middle border-none rounded shadow"
                    style="width: 5rem; height: 5rem;object-fit: cover;" />
                </div>
              </td>

              <td class="px-2 py-3 font-medium uppercase hover:underline" x-data="{ show: false }">
                <a href="{{ route('admin.albums.musics.index', $album->id) }}">{{ $album->title }}</a>
              </td>

              <td class="px-2 py-3 font-medium">
                {{ $album->musics->count() }}
              </td>

              <td class="px-2 py-3 font-medium">
                {{ sprintf('%02d:%02d:%02d', $album->musics->sum('duration') / 3600, $album->musics->sum('duration') / 60, $album->musics->sum('duration') % 60) }}
              </td>

              <td class="px-2 py-3" x-data="{ show: false }">
                <a href="{{ route('admin.albums.edit', $album->id) }}"
                  class="px-4 py-2 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-black rounded shadow outline-none active:bg-pink-600 hover:text-opacity-75 hover:shadow-md focus:outline-none">Editar</a>

                {{-- Modal --}}
                <button @click="show=true"
                  class="px-4 py-2 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-pink-600 rounded shadow outline-none active:bg-pink-600 hover:text-opacity-75 hover:shadow-md focus:outline-none"
                  type="button">Deletar</button>
                <div x-cloak x-show="show"
                  class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
                  <div @click.away="show = false" class="max-w-sm p-6 bg-black rounded-lg">
                    <div class="flex items-center justify-between">
                      <h3 class="text-2xl">Deletar álbum</h3>
                      <svg @click="show=false" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                    </div>
                    <div class="mt-4">
                      <p class="mb-4 text-sm">Tem certeza que deseja deletar {{ $album->title }}?</p>
                      <div class="flex">
                        <button @click="show=false"
                          class="px-4 py-2 mb-1 mr-1 text-xs font-bold text-black uppercase transition-all duration-150 ease-linear bg-white rounded outline-none hover:text-opacity-75 focus:outline-none">Cancelar</button>
                        <form class="m-0" action="{{ route('admin.albums.destroy', $album->id) }}"
                          method="post">
                          @csrf
                          @method('DELETE')
                          <button
                            class="px-4 py-2 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-pink-600 rounded outline-none hover:text-opacity-75 focus:outline-none">Salvar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</x-guest-layout>
