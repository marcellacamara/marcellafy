@extends('templates.template')

@section('content')
  @php
  $title = 'Álbum view';
  @endphp
  <h3 class="text-center">{{ $title }}</h3>

  <ul>
    <li>
      <a href="{{ route('admin.albums.musics') }}">Músicas</a>
    </li>
  </ul>
@endsection
