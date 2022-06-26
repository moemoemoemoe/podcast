@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full border-gray-300 focus:border-cofe-500 focus:ring-0 rounded-md shadow-sm transition']) !!}></textarea>
