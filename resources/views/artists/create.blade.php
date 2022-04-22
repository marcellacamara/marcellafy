@extends('templates.template')

@section('content')
  @php
  $title = 'Cadastrar artista';
  @endphp
  <h3 class="text-center">{{ $title }}</h3>

  <div class="m-auto col-8">
    <form action="{{ route('admin.artists.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="name">Nome do artista:</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Nome" value="{{ old('name') }}">
      </div>

      <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" name="avatar" id="avatar" class="form-control">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-success">Cadastrar</button>
      </div>
    </form>
  </div>

  <?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $nameArtist = $_POST['name'];
      $path = "artist/{$nameArtist}";

      if (!is_dir($path)) {
          mkdir($path);
      }

      $file = $_FILES['avatar'];
      $fileInfo = explode('.', $file['name']);

      $extension = $fileInfo[1];
      $nameAvatar = $nameArtist . '.' . $extension;

      if (move_uploaded_file($file['tmp_name'], $path . '/' . $nameAvatar)) {
          header('Location: ?page=albums');
      } else {
          echo 'Falha no upload';
      }
  }

  ?>
@endsection
