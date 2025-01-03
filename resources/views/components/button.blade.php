@props([
    'class' => '',
    'type' => 'button',
    'href' => '',
    'disabled' => false,
    'attributes' => '',
    'size' => 'md',
])


@if (empty($href))
    <button {{ $disabled ? 'disabled' : '' }} {{ $attributes }} type="{{ $type }}"
        class="btn btn-{{ $size }} {{ $class }}">
        {{ $slot }}
    </button>
@else
    <a href="{{ $href }}" {{ $attributes }} class="btn btn-{{ $size }} {{ $class }}">
        {{ $slot }}
    </a>
@endif
