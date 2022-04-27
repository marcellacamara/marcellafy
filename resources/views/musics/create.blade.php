@extends('templates.template')

@section('content')
  @php
  $title = 'Cadastrar música';
  @endphp
  <h3 class="text-center">{{ $title }}</h3>

  <div class="m-auto col-8">
    <form action="{{ route('admin.albums.musics.store', $album->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="name">Nome da música</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Nome:" value="{{ old('name') }}">
      </div>

      <div class="form-group">
        <label for="file">Arquivo da música</label>
        <input type="file" name="file" id="file" class="form-control">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-success">Cadastrar música</button>
      </div>
    </form>
  @endsection
