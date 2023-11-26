@props(['width' => 'xl'])

@php
    $maxWidth = match($width) {
        'sm' => 'max-w-screen-sm',
        'md' => 'max-w-screen-md',
        'lg' => 'max-w-screen-lg',
        'xl' => 'max-w-screen-xl',
        '2xl' => 'max-w-screen-2xl',
    }
@endphp

<div {{ $attributes->merge(['class' => "px-5 $width:px-0 m-auto w-screen $maxWidth"]) }}>
    {{ $slot }}
</div>