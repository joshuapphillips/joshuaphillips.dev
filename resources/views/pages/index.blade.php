<x-layouts.html class="grid items-center justify-center min-h-screen">
    <x-layouts.container width="xl" class="space-y-10 lg:space-y-0 lg:grid lg:grid-cols-2 py-10 ">
        @include('partials/index/info')
        <livewire:contact-form />
    </x-layouts.container>
    <x-miscellaneous.copyright class="text-center mb-5 lg:mb-0 lg:absolute lg:bottom-20 lg:-right-7G lg:-rotate-90" />
</x-layouts.html>
