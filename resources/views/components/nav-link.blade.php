@props(['active' => false])

@php
$classes = ($active ?? false)
            ? 'px-5 py-1.5 text-gold transition duration-300 rounded-lg text-sm font-bold leading-normal hover:text-green'
            : 'px-5 py-1.5 text-green transition duration-300 rounded-lg text-sm font-bold leading-normal hover:text-gold';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
