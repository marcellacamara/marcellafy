@extends('templates.template')

@section('content')
  @php
  $title = 'Músicas view';
  @endphp
  <h3 class="text-center">{{ $title }}</h3>

  <label for="name">{{ $album->title }}</label>
  <hr>

  <div>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
  </div>

  <div class="mt-3 mb-4 text-center">
    <a href="{{ route('admin.albums.musics.create', $album->id) }}" class="btn btn-success">Cadastrar música</a>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Player</th>
        <th scope="col">Título</th>
        <th scope="col">Duração</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($album->musics as $music)
        <tr>
          <th scope="row">{{ $music->id }}</th>
          <td>
            <audio controls>
              <source src="{{ asset($music->file) }}" type="audio/mpeg">
          </td>
          <td>{{ $music->title }}</td>
          <td>{{ $music->duration }}</td>
          <td>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal"
              data-target="#destroyModal-{{ $music->id }}">
              Deletar
            </button>

            <!-- Modal -->
            <div class="modal fade" id="destroyModal-{{ $music->id }}" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deletar música</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Tem certeza que deseja deletar {{ $music->title }}?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form action="{{ route('admin.albums.destroy', $music->id) }}" method="post">
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
@endsection
