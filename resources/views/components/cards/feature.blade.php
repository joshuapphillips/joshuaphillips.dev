<dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none">
    <div class="relative pl-16">
        <dt class="text-base font-semibold leading-5 text-gray-900">
            <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                {{ $icon }}
            </div>
            {{ $title }}
        </dt>
        <dd class="mt-2 leading-5 text-gray-600 text-sm 2xl:text-base">{{ $slot }}</dd>
    </div>
</dl>
