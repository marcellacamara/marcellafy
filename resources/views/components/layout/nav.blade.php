<nav class="relative flex flex-wrap items-center justify-between px-2 py-3 mb-3 bg-transparent">
  <div class="container flex flex-wrap items-center justify-between px-4 mx-auto">
    <div class="relative flex justify-between w-full px-4 lg:w-auto lg:static lg:block lg:justify-start">
      <a class="inline-block px-4 py-2 mr-4 text-sm font-bold leading-relaxed text-white uppercase transition-all rounded-md hover:opacity-75 whitespace-nowrap"
        href="/dashboard">
        Dashboard
      </a>
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
