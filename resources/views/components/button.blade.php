@props(['class'])
@props(['type'])
@props(['href'])
@props(['disabled'])
@props(['attributes'])
@props(['size'])



@if ($href == '')
    <button {{ $disabled ? 'disabled' : '' }} {{ $attributes }} type="{{ $type }}"
        class="btn btn-{{ $size }} {{ $class }}">
        {{ $slot }}
    </button>
@else
    <a href="{{ $href }}" {{ $attributes }} class="btn btn-{{ $size }} {{ $class }}">
        {{ $slot }}
    </a>
@endif
