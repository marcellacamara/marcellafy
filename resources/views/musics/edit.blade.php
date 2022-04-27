@extends('templates.template')

@section('content')
  @php
  $title = 'Editar música';
  @endphp
  <h3 class="text-center">{{ $title }}</h3>
  <hr>

  <div class="m-auto col-8">
    <form action="{{ route('admin.musics.update', $music->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Nome da música</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Título:"
          value="{{ $music->title }}">
      </div>

      <div class="form-group">
        <label for="file">Arquivo da música</label>
        <input type="file" name="file" id="file" class="form-control">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-success">Salvar</button>
      </div>
    </form>
  </div>
@endsection
