<x-guest-layout>
  <x-layout.topbar />
  <x-alert />
  <x-layout.nav />

  {{-- <label for="name">{{ $artist->name }}</label>
  <hr> --}}

  <div class="px-12">
    <div class="flex justify-end ">
      <x-button class="bg-black hover:text-opacity-75 mr-1 mb-1">
        <a href="{{ route('admin.artists.albums.create', $artist->id) }}">
          Cadastrar álbum
        </a>
      </x-button>
    </div>

    <div class="overflow-x-hidden shadow-md sm:rounded-lg text-gray-100 bg-transparent">
      <table class="w-full text-sm text-left text-white">
        <thead class="text-xs text-white uppercase bg-black">
          <tr>
            <th scope="col" class="px-2 py-3">Capa</th>
            <th scope="col" class="px-2 py-3">Título</th>
            <th scope="col" class="px-2 py-3">Ações</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($artist->albums as $album)
            <tr class="border-2 border-transparent hover:bg-gray-900/10">
              <td class="px-2 py-3">
                <div class="w-6/12 sm:w-4/12">
                  <img src="{{ asset($album->cover_image) }}" alt="{{ $artist->name }}"
                    class="shadow rounded w-24 align-middle border-none"
                    style="width: 5rem; height: 5rem;object-fit: cover;" />
                </div>
              </td>

              <td class="px-2 py-3" x-data="{ show: false }">
                <a href="{{ route('admin.albums.musics.index', $album->id) }}">{{ $album->title }}</a>
              </td>
              <td class="px-2 py-3" x-data="{ show: false }">
                <a href="{{ route('admin.albums.edit', $album->id) }}"
                  class="bg-black text-white active:bg-pink-600 hover:text-opacity-75 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Editar</a>

                <!-- Button trigger modal -->
                {{-- <button type="button" class="btn btn-danger" data-toggle="modal"
                  data-target="#destroyModal-{{ $album->id }}">
                  Deletar
                </button> --}}

                <!-- Modal -->
                {{-- <div class="modal fade" id="destroyModal-{{ $album->id }}" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deletar álbum</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Tem certeza que deseja deletar {{ $album->title }}?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('admin.albums.destroy', $album->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div> --}}

                <button @click="show=true"
                  class="bg-pink-600 text-white active:bg-pink-600 hover:text-opacity-75 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                  type="button">Deletar</button>
                <div x-cloak x-show="show"
                  class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
                  <div @click.away="show = false" class="max-w-sm p-6 bg-black ">
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
                          class="bg-red-600 text-white font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Cancelar</button>
                        <form class="m-0" action="{{ route('admin.albums.destroy', $album->id) }}"
                          method="post">
                          @csrf
                          @method('DELETE')
                          <button
                            class="bg-green-600 text-white font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Salvar</button>
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
