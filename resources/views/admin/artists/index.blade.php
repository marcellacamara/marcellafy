<x-guest-layout>
  <x-layout.topbar />
  <x-alert />
  <x-layout.nav />

  <div class="px-12">
    <div class="flex justify-end ">
      <x-button class="bg-black hover:text-opacity-75 mr-1 mb-1">
        <a href="{{ route('admin.artists.create') }}">
          Cadastrar artista
        </a>
      </x-button>
    </div>
    <div class="overflow-x-hidden shadow-md sm:rounded-lg text-gray-100 bg-transparent">
      <table class="w-full text-sm text-left text-white">
        <thead class="text-xs text-white uppercase bg-black">
          <tr>
            <th scope="col" class="px-2 py-3">Artista</th>
            <th scope="col" class="px-2 py-3">Avatar</th>
            <th scope="col" class="px-2 py-3">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($artists as $artist)
            <tr class="border-2 border-transparent hover:bg-gray-900/10">
              <th scope="row" class="px-2 py-3 uppercase font-medium text-sm text-white hover:underline">
                <a href="
                {{ route('admin.artists.albums.index', $artist->id) }}">{{ $artist->name }}</a>
              </th>
              <td class="px-2 py-3">
                <div class="w-6/12 sm:w-4/12">
                  <img src="{{ asset($artist->avatar) }}" alt="{{ $artist->name }}"
                    class="shadow rounded w-24 align-middle border-none"
                    style="width: 5rem; height: 5rem;object-fit: cover;" />
                </div>
              </td>

              <td class="px-2 py-3" x-data="{ show: false }">
                <a href="{{ route('admin.artists.edit', $artist->id) }}"
                  class="bg-black text-white active:bg-pink-600 hover:text-opacity-75 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Editar</a>

                {{-- <div x-data="{ show: false }" class="flex"> --}}
                <button @click="show=true"
                  class="bg-pink-600 text-white active:bg-pink-600 hover:text-opacity-75 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                  type="button">Deletar</button>
                <div x-cloak x-show="show"
                  class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
                  <div @click.away="show = false" class="max-w-sm p-6 bg-black rounded-lg">
                    <div class="flex items-center justify-between">
                      <h3 class="text-2xl">Deletar artista</h3>
                      <svg @click="show=false" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>

                    </div>
                    <div class="mt-4">
                      <p class="mb-4 text-sm">Tem certeza que deseja deletar {{ $artist->name }}?</p>
                      <div class="flex">
                        <button @click="show=false"
                          class="bg-white text-black hover:text-opacity-75 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Cancelar</button>
                        <form class="m-0" action="{{ route('admin.artists.destroy', $artist->id) }}"
                          method="post">
                          @csrf
                          @method('DELETE')
                          <button
                            class="bg-pink-600 text-white hover:text-opacity-75 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Salvar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- </div> --}}

              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</x-guest-layout>
