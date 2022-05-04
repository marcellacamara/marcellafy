@if (session()->has('error') || session()->has('errors'))
  <div x-cloak x-data="{ show: true }" x-show="show"
    class="text-white px-6 py-1 border-0 rounded relative mb-4 mt-2 bg-black">
    <span class="text-xl inline-block mr-4 align-middle">
    </span>
    <span class="inline-block align-middle mr-4">
      @foreach ($errors->all() as $error)
        <li>
          <b class="capitalize">Alert! </b>{{ $error }}
        </li>
      @endforeach
    </span>
    <button @click="show=false"
      class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-1 mr-4 outline-none focus:outline-none">
      <span>×</span>
    </button>
  </div>
@endif
