@if (session()->has('errors'))
  <div x-cloak x-data="{ show: true }" x-show="show"
    class="relative px-6 py-1 mt-2 mb-4 text-white bg-black border-0 rounded">
    <span class="inline-block mr-4 text-xl align-middle">
    </span>
    <span class="inline-block mr-4 align-middle">
      <ul>
        @foreach ($errors->all() as $error)
          <li>
            <b class="capitalize">Alert! </b>{{ $error }}
          </li>
        @endforeach
      </ul>
    </span>
    <button @click="show=false"
      class="absolute top-0 right-0 mt-1 mr-4 text-2xl font-semibold leading-none bg-transparent outline-none focus:outline-none">
      <span>×</span>
    </button>
  </div>
@endif
@if (session()->has('success'))
  <div x-cloak x-data="{ show: true }" x-show="show"
    class="relative px-6 py-1 mt-2 mb-4 text-white bg-black border-0 rounded">
    <span class="inline-block mr-4 text-xl align-middle">
    </span>
    <span class="inline-block mr-4 align-middle">
      <b class="capitalize">Success! </b>{{ session()->get('success') }}
    </span>
    <button @click="show=false"
      class="absolute top-0 right-0 mt-1 mr-4 text-2xl font-semibold leading-none bg-transparent outline-none focus:outline-none">
      <span>×</span>
    </button>
  </div>
@endif
