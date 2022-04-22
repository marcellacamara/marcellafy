@extends('templates.template')

@section('content')
  @php
  $title = 'Artista view';
  @endphp
  <h3 class="text-center">{{ $title }}</h3>
  <hr>

  <div class="mt-3 mb-4 text-center">
    <a href="{{ route('admin.artists.create') }}" class="btn btn-success">Cadastrar</a>
  </div>

  <li>
    <a href="{{ route('principal') }}">Principal</a>
  </li>
  {{-- <li>
    <a href="{{ route('admin.artists.albums.index') }}">Álbums</a>
  </li> --}}
@endsection
