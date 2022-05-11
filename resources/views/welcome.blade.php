<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MarcellaFy</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>



<body class="w-screen bg-gradient-to-r from-purple-500 to-pink-500">
  <x-layout.topbar />
  <div class="grid grid-cols-1 place-items-center">
    <div>
      <img class="w-10 sm:w-20 pt-36" src="icons/icone-notas-musicais.png" alt="logo-welcome">
    </div>
    <div>
      <p class="pt-4 text-2xl font-semibold text-center text-black hover:font-bold sm:text-6xl">
        Music for Everyone
      </p>
    </div>
    <div class="flex gap-16 pt-24">
      <button type="submit">
        <a class="px-4 py-2 mb-1 mr-1 text-lg font-bold text-white uppercase transition-all duration-150 ease-linear bg-purple-400 rounded-md shadow outline-none hover:bg-gradient-to-l from-purple-400 to-pink-400 active:bg-pink-600 hover:shadow-md focus:outline-none"
          href="{{ route('login') }}">
          LOGIN
        </a>
      </button>
      <button type="submit">
        <a class="px-4 py-2 mb-1 mr-1 text-lg font-bold text-white uppercase transition-all duration-150 ease-linear bg-purple-400 rounded-md shadow outline-none hover:bg-gradient-to-l from-purple-400 to-pink-400 active:bg-pink-600 hover:shadow-md focus:outline-none"
          href="{{ route('register') }}">
          REGISTER
        </a>
      </button>
    </div>
</body>

</html>
