@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-md bg-purple-400 border-pink-500 focus:border-pink-500  focus:ring focus:ring-pink-400 focus:ring-opacity-400']) !!}>
