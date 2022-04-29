<button
  {{ $attributes->merge(['type' => 'submit','class' =>'bg-purple-500 hover:bg-gradient-to-l from-purple-400 to-pink-400 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150']) }}>
  {{ $slot }}
</button>
