@php
    $errorClasses = $errors->has($wire) ? 'bg-red-50 border-solid border rounded-md border-red-300' : '';
@endphp

<div {{ $attributes->merge(['class' => "relative flex p-3 gap-x-3 $errorClasses"]) }}>
    <div class="flex h-6 items-center">
        <input id="comments" wire:model="{{ $wire }}" name="comments" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600 ">
    </div>
    <div class="text-sm leading-6">
        <label for="comments" class="font-medium text-gray-900">Terms & Conditions</label>
        <p class="text-gray-500 text-xs 2xl:text-sm">By submitting your details, you confirm that you agree to the storing and processing of your personal data by {{ config('app.name')}} as described in the <a href="{{ route('privacy-policy') }}" target="_blank" class="underline">Privacy Policy</a>.</p>
    </div>
</div>