<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <title>MarcellaFy</title>
</head>

<body class="text-gray-100 bg-gradient-to-r from-purple-500 to-pink-500">
  <x-layout.topbar />
  <x-layout.nav />
  {{ $slot }}
</body>

</html>
