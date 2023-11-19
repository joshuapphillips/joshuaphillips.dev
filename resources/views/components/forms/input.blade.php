
<div>
    <input wire:model="{{ $wire }}" :type="$type" {{ $attributes->merge(['class' => 'border border-grey-900']) }} />
    <x-forms.error :id="$wire" />
</div>