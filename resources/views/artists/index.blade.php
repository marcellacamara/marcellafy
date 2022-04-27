@extends('templates.template')

@section('content')
  @php
  $title = 'Artista view';
  @endphp
  <h3 class="text-center">{{ $title }}</h3>
  <hr>

  @if (session()->has('error'))
    <div class="alert alert-dismissible alert-danger fade show">
      {{-- <button type="button" class="close" data-dismiss="alter" aria-label="Close"> --}}
      <span aria-hidden="true">&times;</span>
      </button>
      <strong>
        {!! session()->get('error') !!}
      </strong>
    </div>
  @endif

  <div class="mt-3 mb-4 text-center">
    <a href="{{ route('admin.artists.create') }}" class="btn btn-success">Cadastrar</a>
  </div>

  <div>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Artista</th>
        <th scope="col">Avatar</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($artists as $artist)
        <tr>
          <td>
            <a href="{{ route('admin.artists.albums.index', $artist->id) }}">{{ $artist->name }}</a>
          </td>
          <td>
            <img src="{{ asset($artist->avatar) }}" alt="{{ $artist->name }}"
              style="width: 4rem; height: 4rem; border-radius: 4rem; object-fit: cover;">
          </td>
          <td>
            <a href="{{ route('admin.artists.edit', $artist->id) }}" class="btn btn-primary">Editar</a>

            <button type="button" class="btn btn-danger" data-toggle="modal"
              data-target="#destroyModal-{{ $artist->id }}">
              Deletar
            </button>

            <div class="modal fade" id="destroyModal-{{ $artist->id }}" tabindex="-1" role="dialog"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deletar artista</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Tem certeza que deseja deletar {{ $artist->name }}?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form action="{{ route('admin.artists.destroy', $artist->id) }}" method="post">
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
