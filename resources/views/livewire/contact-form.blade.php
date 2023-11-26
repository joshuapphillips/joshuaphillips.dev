<x-cards.card class="p-6 xl:px-10 shadow-xl">
    @if($processed) 
        {{-- Success Message --}}
    @else 
        {{-- Form --}}
        <form wire:submit="save" class="space-y-3">
            <h3 class="text-2xl font-bold">Contact Me</h3>
            <p class="text-gray-500"><a class="underline text-base text-indigo-600 font-semibold" href="mailto:{{ config('contact.email_address') }}">Email me</a> or fill in the form below to get in touch.</p>
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
</x-cards.card>
