<div class="block p-6 bg-white border border-gray-200 rounded-lg shadow-xl">
    @if($processed) 
        {{-- Success Message --}}
    @else 
        {{-- Form --}}
        <form wire:submit="save" class="space-y-3">
            <h3 class="text-2xl font-bold">Get in touch</h3>
            <x-forms.input wire="name" type="text" placeholder="Your name"/>{{-- TODO: add required --}}
            <x-forms.input wire="email" type="email" placeholder="Your email address"/>{{-- TODO: add required --}}
            <x-forms.input wire="telephoneNumber" type="tel" placeholder="Your telephone number"/>{{-- TODO: add required --}}
            <x-forms.input wire="company" type="text" placeholder="Your company name"/>{{-- TODO: add required --}}
            <x-forms.input wire="username" type="text" class="hidden" placeholder="Your username"/>{{-- TODO: add required --}}
            <x-forms.textarea wire="message" placeholder="Let me know about your project"/>{{-- TODO: add required --}}
            <x-forms.terms-and-conditions wire="termsAndConditions"/>
            <x-ui.button type="submit" class="w-full">Submit</x-ui>
        </form>
    @endif
</div>
