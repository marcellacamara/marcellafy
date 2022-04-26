@extends('templates.template')

@section('content')
  @php
  $title = 'Editar álbum';
  @endphp
  <h3 class="text-center">{{ $album->marcella() }}</h3>
  <hr>

  <div class="m-auto col-8">
    <form action="{{ route('admin.albums.update', $album->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Nome do álbum</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Nome:" value="{{ $album->name }}">
      </div>

      <div class="form-group">
        <label for="avatar">Capa do álbum</label>
        <input type="file" name="cover_image" id="cover_image" class="form-control">
      </div>

      <div class="form-group">
        <label for="avatar">Ano</label>
        <input type="year" name="year" id="year" class="form-control">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-success">Salvar</button>
      </div>
    </form>
  </div>
@endsection
