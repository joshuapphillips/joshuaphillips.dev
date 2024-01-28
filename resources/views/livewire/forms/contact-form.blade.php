<x-cards.card class="p-6 xl:px-10 shadow-xl">
    @if($showSuccessMessage) 
        {{-- Success Message --}}
        
    @else 
        @if($errors->any())
            {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif
        {{-- Form --}}
        <form wire:submit="save" class="space-y-3">
            <h3 class="text-2xl font-bold">Contact Me</h3>
             <p class="text-gray-500 text-sm 2xl:text-base">
                Feel free to reach out by <a class="underline text-base text-indigo-600 font-semibold" href="mailto:{{ config('contact.email_address') }}">email</a> 
                or use the convenient form below to get in touch. Whether you have questions, need more information, or have a project in mind, I'm here to assist you. 
            </p>
            <x-forms.input  wire="name" type="text" placeholder="Your name (required)"/>{{-- TODO: add required --}}
            <x-forms.input  wire="email" type="email" placeholder="Your email address (required)"/>{{-- TODO: add required --}}
            <x-forms.input  wire="telephoneNumber" type="tel" placeholder="Your telephone number"/>{{-- TODO: add required --}}
            <x-forms.input  wire="company" type="text" placeholder="Your company name"/>{{-- TODO: add required --}}
            <x-forms.input  wire="username" type="text" class="hidden" placeholder="Your username (required)"/>{{-- TODO: add required --}}
            <x-forms.textarea wire="message" placeholder="Let me know about your project (required)"/>{{-- TODO: add required --}}
            <x-forms.privacy-policy wire="privacyPolicy"/>
            @isset($formErrorMessage)
                <x-alerts.warning :title="$error" />
            @endisset
            <x-button type="submit" class="w-full">Submit</x-ui>
        </form>
    @endif
</x-cards.card>
