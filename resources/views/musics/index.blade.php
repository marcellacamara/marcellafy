@extends('templates.template')

@section('content')
  @php
  $title = 'Músicas view';
  @endphp
  <h3 class="text-center">{{ $title }}</h3>

  <label for="name">{{ $album->name }}</label>
  <hr>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Título</th>
        <th scope="col">Duração</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($album->musics as $music)
        <tr>
          <th scope="row">{{ $music->id }}</th>
          <td>{{ $music->title }}</td>
          <td>{{ $music->duration }}</td>
        </tr>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroyModal-{{ $music->id }}">
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
      @endforeach
    @endsection
