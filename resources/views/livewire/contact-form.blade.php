<div>
    @if($success) 
        {{-- Success Message --}}
    @else 
        {{-- Form --}}
        <form wire:submit="save" class="space-y-2">
            <x-forms.input wire="name" type="text"/>{{-- TODO: add required --}}
            <x-forms.input wire="email" type="email"/>{{-- TODO: add required --}}
            <x-forms.input wire="telephone" type="tel"/>{{-- TODO: add required --}}
            <x-forms.input wire="business" type="text"/>{{-- TODO: add required --}}
            <x-forms.input wire="username" type="text" class="hidden"/>{{-- TODO: add required --}}
            <x-forms.textarea wire="message"/>{{-- TODO: add required --}}
            <x-ui.button type="submit">Submit</x-ui>
        </form>
    @endif
</div>
