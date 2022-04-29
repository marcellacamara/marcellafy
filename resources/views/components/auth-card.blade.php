<div
  class="flex flex-col items-center min-h-screen pt-6 bg-gradient-to-r from-purple-500 to-pink-500 sm:justify-center sm:pt-0">
  <div>
    {{ $logo }}
  </div>

  <div class="w-full px-6 py-4 mt-6 overflow-hidden text-white bg-black shadow-md sm:max-w-md sm:rounded-lg">
    {{ $slot }}
  </div>
</div>
