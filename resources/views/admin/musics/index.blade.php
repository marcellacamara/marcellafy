<x-guest-layout>
  <x-layout.topbar />
  <x-alert />
  <x-layout.nav />

  <div class="px-12">
    <div class="flex items-center justify-between">
      <h1 class="text-2xl font-semibold hover:font-bold">Músicas do álbum <span
          class="uppercase">{{ $album->title }}</span></h1>
      <button
        class="bg-black text-white active:bg-pink-500 hover:text-opacity-75 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
        <a href="{{ route('admin.albums.musics.create', $album->id) }}">
          Cadastrar música
        </a>
      </button>
    </div>

    <div class="overflow-x-hidden text-gray-100 bg-transparent shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left text-white">
        <thead class="text-xs text-white uppercase bg-black">
          <tr>
            <th scope="col" class="px-2 py-3">#</th>
            <th scope="col" class="px-2 py-3">Player</th>
            <th scope="col" class="px-2 py-3">Título</th>
            <th scope="col" class="px-2 py-3">Duração</th>
            <th scope="col" class="px-2 py-3">Ações</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($album->musics as $music)
            <tr class="border-2 border-transparent hover:bg-gray-900/10">
              <td class="px-2 py-3">
                {{ $music->id }}
              </td>

              <td class="px-2 py-3 font-medium uppercase hover:underline">
                <audio controls>
                  <source src="{{ asset($music->file) }}" type="audio/mpeg">
              </td>

              <td class="px-2 py-3 font-medium uppercase">
                {{ $music->title }}
              </td>

              <td class="px-2 py-3 font-medium">
                {{ sprintf('%02d:%02d', ($music->duration / 60) % 60, $music->duration % 60) }}
              </td>

              <td class="px-2 py-3" x-data="{ show: false }">
                <a href="{{ route('admin.musics.edit', $music->id) }}"
                  class="px-4 py-2 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-black rounded shadow outline-none active:bg-pink-600 hover:text-opacity-75 hover:shadow-md focus:outline-none">Editar</a>

                {{-- Modal --}}
                <button @click="show=true"
                  class="px-4 py-2 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear bg-pink-600 rounded shadow outline-none active:bg-pink-600 hover:text-opacity-75 hover:shadow-md focus:outline-none"
                  type="button">Deletar</button>
                <div x-cloak x-show="show"
                  class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
                  <div @click.away="show = false" class="max-w-sm p-6 bg-black rounded-lg">
                    <div class="flex items-center justify-between">
                      <h3 class="text-2xl">Deletar música</h3>
                      <svg @click="show=false" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                    </div>
                    <div class="mt-4">
                      <p class="mb-4 text-sm">Tem certeza que deseja deletar {{ $music->title }}?</p>
                      <div class="flex">
                        <button @click="show=false"
                          class="px-4 py-2 mb-1 mr-1 text-xs font-bold text-black uppercase transition-all duration-150 ease-linear bg-white rounded outline-none hover:text-opacity-75 focus:outline-none">Cancelar</button>
                        <form class="m-0" action="{{ route('admin.musics.destroy', $music->id) }}"
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
