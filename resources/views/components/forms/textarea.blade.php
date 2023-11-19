<div>
    <textarea wire:model="{{ $wire }}" :type="$type" {{ $attributes->merge(['class' => 'border border-grey-900']) }}>{{ $slot }}</textarea>
    <x-forms.error :id="$wire" />
</div>