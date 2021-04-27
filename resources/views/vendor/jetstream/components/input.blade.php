@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-0 border-b border-gray-300 focus:border-gray-300 bg-transparent focus:ring-0']) !!}>
