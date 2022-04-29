@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'px-1 rounded-md shadow-md bg-purple-300 border-pink-500 focus:border-pink-500  focus:ring focus:ring-pink-400 focus:ring-opacity-400']) !!}>
