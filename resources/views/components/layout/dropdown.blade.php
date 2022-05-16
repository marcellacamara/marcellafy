<div class="hidden md:block">
  <div class="flex items-center ml-4 md:ml-6">
    <!-- Profile dropdown -->
    <div @click.away="open = false" class="relative ml-3" x-data="{ open: false }">
      <div>
        <button @click="open = !open" type="button"
          class="flex items-center max-w-xs text-sm bg-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
          id="user-menu-button" aria-expanded="false" aria-haspopup="true">
          <span class="sr-only">Open user menu</span>
          <img class="w-8 h-8 rounded-md"
            src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&color=FFFFFF&background=000000"
            alt="User Avatar">
        </button>
      </div>
      <!--
          Dropdown menu, show/hide based on menu state.
          Entering: "transition ease-out duration-100"
            From: "transform opacity-0 scale-95"
            To: "transform opacity-100 scale-100"
          Leaving: "transition ease-in duration-75"
            From: "transform opacity-100 scale-100"
            To: "transform opacity-0 scale-95"
        -->
      <div x-cloak x-show="open" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute right-0 flex flex-col w-48 h-20 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
        <!-- Active: "bg-gray-100", Not Active: "" -->
        {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
            id="user-menu-item-0">Your Profile</a> --}}

        <a href="{{ route('user') }}" class="flex px-4 py-2 text-sm text-left text-black hover:bg-gray-900/10"
          role="menuitem" tabindex="-1" id="theme-toggle">
          {{-- <x-heroicon-s-moon id="theme-toggle-dark-icon" class="hidden w-5 h-5" />
          <x-heroicon-s-sun id="theme-toggle-light-icon" class="hidden w-5 h-5" /> --}}
          <x-feathericon-user />
          <span class="flex items-center ml-2 text-sm font-bold leading-snug text-black uppercase hover:opacity-75">
            PROFILE
          </span>
        </a>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="flex w-full px-4 py-2 text-sm text-left text-black hover:bg-gray-900/10"
            role="menuitem" tabindex="-1" id="user-menu-item-2">
            {{-- <x-heroicon-s-logout class="w-5 h-5" /> --}}
            <x-feathericon-log-out />
            <span class="flex items-center ml-2 text-sm font-bold leading-snug text-black uppercase hover:opacity-75">
              LOG OUT
            </span>
          </button>
        </form>

      </div>
    </div>
  </div>
</div>
