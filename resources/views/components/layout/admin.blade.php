<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>MarcellaFy</title>
</head>

<body class="bg-black text-gray-100">
  <nav class=" relative flex flex-wrap items-center justify-between px-2 py-3 bg-pink-500 mb-3">
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
      <div class="w-full relative flex justify-between lg:w-auto  px-4 lg:static lg:block lg:justify-start">
        <a class="text-sm font-bold hover:bg-black rounded-md hover:text-lime-400 transition-all leading-relaxed inline-block mr-4 py-2 px-4 whitespace-nowrap uppercase text-white"
          href="/dashboard">
          Dashboard
        </a>
        <a class="text-sm font-bold hover:bg-black rounded-md hover:text-lime-400 transition-all leading-relaxed inline-block mr-4 py-2 px-4 whitespace-nowrap uppercase text-white"
          href="/admin/artists">
          Artistas
        </a>
        <button
          class="cursor-pointer text-xl leading-none px-3 py-1 border border-double rounded bg-transparent block lg:hidden outline-none focus:outline-none"
          type="button">
          <span class="block relative w-6 h-px rounded-sm bg-white"></span>
          <span class="block relative w-6 h-px rounded-sm bg-white mt-1"></span>
          <span class="block relative w-6 h-px rounded-sm bg-white mt-1"></span>
        </button>
      </div>
      <div class="lg:flex flex-grow items-center" id="example-navbar-warning">
        <ul class="flex flex-col lg:flex-row list-none ml-auto">
          {{-- texto e icone --}}
          <li class="nav-item">
            <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
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
