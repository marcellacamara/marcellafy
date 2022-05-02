<x-guest-layout>
  <x-layout.topbar />


  @if (session()->has('error'))
    <div x-data="{ show: true }" x-show="show" class="text-white px-6 py-1 border-0 rounded relative mb-4 mt-2 bg-black">
      <span class="text-xl inline-block mr-4 align-middle">
      </span>
      <span class="inline-block align-middle mr-4">
        <b class="capitalize">Alerta!</b> Não é possível deletar artista com álbum cadastrado!
      </span>
      <button @click="show=false"
        class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-1 mr-4 outline-none focus:outline-none">
        <span>×</span>
      </button>
    </div>
  @endif

  <nav class="relative flex flex-wrap items-center justify-between px-2 py-3 mb-3 bg-transparent">
    <div class="container flex flex-wrap items-center justify-between px-4 mx-auto">
      <div class="relative flex justify-between w-full px-4 lg:w-auto lg:static lg:block lg:justify-start">
        <a class="inline-block px-4 py-2 mr-4 text-sm font-bold leading-relaxed text-white uppercase transition-all rounded-md hover:opacity-75 whitespace-nowrap"
          href="/dashboard">
          Dashboard
        </a>
      </div>
      <div class="items-center flex-grow lg:flex" id="example-navbar-warning">
        <ul class="flex flex-col ml-auto list-none lg:flex-row">
          {{-- texto e icone --}}
          <li class="nav-item">
            <a class="flex items-center px-3 py-2 text-xs font-bold leading-snug text-white uppercase hover:opacity-75"
              href="('/user')">
              <x-feathericon-user />
              <span class="ml-2">Profile</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <div class="px-12">
    <div class="flex justify-end ">
      <x-button class="bg-black hover:bg-white">
        <a href="/artists/create">
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
              <th scope="row" class="px-2 py-3 font-medium text-base text-white">
                <a href="
                {{ route('admin.artists.albums.index', $artist->id) }}">{{ $artist->name }}</a>
              </th>
              <td class="px-2 py-3">
                <img src="{{ asset($artist->avatar) }}" alt="{{ $artist->name }}"
                  class="shadow rounded-full align-middle border-none"
                  style="width: 6rem; height: 6rem; border-radius: 6rem; object-fit: cover;" />
              </td>
              <td class="px-2 py-3" x-data="{ show: false }">

                <a href="{{ route('admin.artists.edit', $artist->id) }}"
                  class="bg-black text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Editar</a>


                {{-- <button type="button"
                  class="bg-pink-600 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                  data-modal-toggle="modal" data-target="#destroyModal-{{ $artist->id }}">
                  Deletar
                </button> --}}

                {{-- <div x-data="{ show: false }" class="flex"> --}}
                <button @click="show=true"
                  class="bg-pink-600 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                  type="button">Deletar</button>
                <div x-cloak x-show="show"
                  class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
                  <div @click.away="show = false" class="max-w-sm p-6 bg-black ">
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
                          class="bg-red-600 text-white font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Cancelar</button>
                        <form class="m-0" action="{{ route('admin.artists.destroy', $artist->id) }}"
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
                {{-- </div> --}}

                {{-- Modal --}}
                {{-- <div
                  class="modal fade hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full"
                  id="destroyModal-{{ $artist->id }}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-black rounded-lg shadow">
                      <!-- Modal header -->
                      <div class="lex justify-between items-start p-4 rounded-t border-b">
                        <h3 class="text-xl font-semibold text-white">Deletar artista</h3>
                        <button type="button"
                          class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                          data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <!-- Modal body -->
                      <div class="p-6 space-y-6">
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                          Tem certeza que deseja deletar {{ $artist->name }}?
                        </p>
                      </div>
                      <!-- Modal footer -->
                      <div
                        class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <button data-modal-toggle="destroyModal-{{ $artist->id }}" type="button"
                          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                          data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('admin.artists.destroy', $artist->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button data-modal-toggle="destroyModal-{{ $artist->id }}" type="submit"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Deletar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div> --}}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</x-guest-layout>
