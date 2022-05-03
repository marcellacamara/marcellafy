<button
  {{ $attributes->merge(['type' => 'submit','class' =>'bg-purple-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150']) }}>
  {{ $slot }}
</button>
