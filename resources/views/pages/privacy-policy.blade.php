<?php
use \Illuminate\Support\Facades\File;
use function Laravel\Folio\name;

name('privacy-policy');
?>

<x-layouts.html title="Terms & Conditions">
    <x-layouts.container>
        <x-markdown>{{ File::get(storage_path('app/content/pages/privacy-policy.md')) }}</x-markdown>
    </x-layouts.container>
    {{-- <x-layouts.footer/> --}}
</x-layouts.html>