@extends('templates.template')

@section('content')
  @php
  $title = 'Cadastrar álbum';
  @endphp
  <h3 class="text-center">{{ $title }}</h3>

  <div class="m-auto col-8">
    <form action="{{ route('admin.artists.albums.store', $artist->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="name">Nome do álbum</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Nome:" value="{{ old('name') }}">
      </div>

      <div class="form-group">
        <label for="file">Capa do álbum</label>
        <input type="file" name="cover_image" id="cover_image" class="form-control">
      </div>

      <div class="form-group">
        <label for="avatar">Ano</label>
        <input type="year" name="year" id="year" class="form-control">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-success">Cadastrar</button>
      </div>
    </form>
  </div>
@endsection
