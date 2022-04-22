@extends('templates.template')

@section('content')
  @php
  $title = 'Principal view';
  @endphp

  @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
      @auth
        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
      @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

        @if (Route::has('register'))
          <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
        @endif
      @endauth
    </div>
  @endif

  <h3 class="text-center">{{ $title }}</h3>
  <hr>

  <div>
    <ul>
      <li>
        <a href="{{ route('admin.artists.index') }}">Artistas</a>
      </li>
    </ul>
  </div>
@endsection
