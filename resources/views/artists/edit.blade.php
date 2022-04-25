@extends('templates.template')

@section('content')
  @php
  $title = 'Edit view';
  @endphp
  <h3 class="text-center">{{ $title }}</h3>
  <hr>

  <div class="m-auto col-8">
    <form action="{{ route('admin.artists.update', $artist->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Nome do artista</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Nome:" value="{{ $artist->name }}">
      </div>

      <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" name="avatar" id="avatar" class="form-control">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-success">Salvar</button>
      </div>
    </form>
  </div>
@endsection
