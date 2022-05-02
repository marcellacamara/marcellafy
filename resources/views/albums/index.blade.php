<x-layout.topbar />
<x-guest-layout>
  @php
    $title = 'Álbum view';
  @endphp
  <h3 class="text-center">{{ $title }}</h3>

  <label for="name">{{ $artist->name }}</label>
  <hr>

  <div class="mt-3 mb-4 text-center">
    <a href="{{ route('dashboard') }}" class="btn btn-dark">Dashboard</a>
    <a href="{{ route('admin.artists.albums.create', $artist->id) }}" class="btn btn-success">Cadastrar álbum</a>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Capa</th>
        <th scope="col">Título</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($artist->albums as $album)
        <tr>
          <td>
            <img src="{{ asset($album->cover_image) }}" alt="{{ $artist->name }}"
              style="width: 4rem; height: 4rem; border-radius: 4rem; object-fit: cover;">
          </td>
          <td>
            <a href="{{ route('admin.albums.musics.index', $album->id) }}">{{ $album->title }}</a>
          </td>
          <td>
            <a href="{{ route('admin.albums.edit', $album->id) }}" class="btn btn-dark">Editar</a>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal"
              data-target="#destroyModal-{{ $album->id }}">
              Deletar
            </button>

            <!-- Modal -->
            <div class="modal fade" id="destroyModal-{{ $album->id }}" tabindex="-1" role="dialog"
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
            </div>
          </td>
        </tr>
      @endforeach

    </tbody>
  </table>
</x-guest-layout>
