@extends('templates.template')

@section('content')
  @php
  $title = 'Principal view';
  @endphp

  @if (Route::has('login'))
    <div class="fixed top-0 right-0 hidden px-6 py-4 sm:block">
      @auth
        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline dark:text-gray-500">Dashboard</a>
      @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline dark:text-gray-500">Log in</a>

        @if (Route::has('register'))
          <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline dark:text-gray-500">Register</a>
        @endif
      @endauth
    </div>
  @endif

  <h2 class="text-center">{{ $title }}</h2>
  <hr>

  <div>
    <ul>
      <a href="{{ route('admin.artists.index') }}"><button type="button " class="btn btn-dark">Artistas</button></a>
    </ul>
  </div>

  {{-- <div>
    <ul>
      <a href="{{ route('admin.artists.albums.index', $artist->id) }}"><button type="button "
          class="btn btn-dark">Álbuns</button></a>
    </ul>
  </div> --}}

  {{-- <div>
    <ul>
      <a href="{{ route('admin.albums.musics.index', $album->id) }}"><button type="button "
          class="btn btn-dark">Músicas</button></a>
    </ul>
  </div> --}}
@endsection
