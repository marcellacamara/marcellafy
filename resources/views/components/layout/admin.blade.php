<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>MarcellaFy</title>
</head>

<body class="text-gray-100 bg-gradient-to-r from-purple-500 to-pink-500">
  <x-layout.topbar />
  <nav class="relative flex flex-wrap items-center justify-between px-2 py-3 mb-3 bg-transparent">
    <div class="container flex flex-wrap items-center justify-between px-4 mx-auto">
      <div class="relative flex justify-between w-full px-4 lg:w-auto lg:static lg:block lg:justify-start">
        <a class="inline-block px-4 py-2 mr-4 text-sm font-bold leading-relaxed text-white uppercase transition-all rounded-md hover:opacity-75 whitespace-nowrap"
          href="/dashboard">
          Dashboard
        </a>
        <a class="inline-block px-4 py-2 mr-4 text-sm font-bold leading-relaxed text-white uppercase transition-all rounded-md hover:opacity-75 whitespace-nowrap"
          href="/admin/artists">
          Artistas
        </a>
        <button
          class="block px-3 py-1 text-xl leading-none bg-transparent border border-double rounded outline-none cursor-pointer lg:hidden focus:outline-none"
          type="button">
          <span class="relative block w-6 h-px bg-white rounded-sm"></span>
          <span class="relative block w-6 h-px mt-1 bg-white rounded-sm"></span>
          <span class="relative block w-6 h-px mt-1 bg-white rounded-sm"></span>
        </button>
      </div>
      <div class="items-center flex-grow lg:flex" id="example-navbar-warning">
        <ul class="flex flex-col ml-auto list-none lg:flex-row">
          {{-- texto e icone --}}
          <li class="nav-item">
            <a class="flex items-center px-3 py-2 text-xs font-bold leading-snug text-white uppercase hover:opacity-75"
              href="('/user')">
              <x-feathericon-user />
              <span class="ml-2">Profile</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  {{ $slot }}
</body>

</html>
