<x-layouts.html class="grid min-h-screen items-center justify-center">
    <x-layouts.container class="space-y-10 py-10 lg:grid lg:grid-cols-2 lg:space-y-0" width="xl">
        @include('partials/index/info')
        <livewire:contact-form />
    </x-layouts.container>
    <x-miscellaneous.copyright class="mb-5 text-center lg:absolute lg:-right-7 lg:bottom-20 lg:mb-0 lg:-rotate-90" />
</x-layouts.html>
