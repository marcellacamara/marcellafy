<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MarcellaFy</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>



<body class="bg-gradient-to-r from-purple-500 to-pink-500 w-screen">
  <x-layout.topbar />
  <div class="grid grid-cols-1 place-items-center">
    <div>
      <img class="w-10 sm:w-20 pt-36" src="icons/icone-notas-musicais.png" alt="logo-welcome">
    </div>
    <div>
      <p class="text-black text-center font-semibold hover:font-bold text-2xl sm:text-6xl pt-4">
        Music for Everyone
      </p>
    </div>
    <div class="flex gap-16 pt-24">
      <button type="submit">
        <a class="bg-purple-400 hover:bg-gradient-to-l from-purple-400 to-pink-400 text-white active:bg-pink-600 font-bold uppercase text-base px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
          href="{{ route('login') }}">
          LOGIN
        </a>
      </button>
      <button type="submit">
        <a class="bg-purple-400 hover:bg-gradient-to-l from-purple-400 to-pink-400 text-white active:bg-pink-600 font-bold uppercase text-base px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
          href="{{ route('register') }}">
          REGISTER
        </a>
      </button>
    </div>
</body>

</html>
