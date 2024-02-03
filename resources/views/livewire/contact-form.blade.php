<x-cards.card class="p-6 shadow-xl xl:px-10">
    @unless ($showSuccessMessage)
        <form class="space-y-3" wire:submit="save">
            <h3 class="text-2xl font-bold">Contact Me</h3>
            <p class="text-sm text-gray-500 2xl:text-base">
                Feel free to reach out by <a class="text-base font-semibold text-indigo-600 underline"
                    href="mailto:{{ config('contact.email_address') }}">email</a>
                or use the convenient form below to get in touch. Whether you have questions, need more information, or have
                a project in mind, I'm here to assist you.
            </p>

            <x-forms.input placeholder="Your name (required)" required type="text" wire="name" />
            <x-forms.input placeholder="Your email address (required)" required type="email" wire="email" />
            <x-forms.input placeholder="Your telephone number" required type="tel" wire="telephoneNumber" />
            <x-forms.input placeholder="Your company name" required type="text" wire="company" />
            <x-forms.input class="hidden" placeholder="Your username (required)" type="text" wire="username" />
            <x-forms.textarea placeholder="Let me know about your project (required)" required wire="message" />
            <x-forms.privacy-policy wire="privacyPolicy" />

            @isset($formErrorMessage)
                <x-alerts.warning :title="$formErrorMessage" />
            @endisset

            <x-button class="w-full" type="submit">
                <span wire:loading.remove.delay>Submit</span>
                <span wire:loading.delay>Submitting...</span>
            </x-button>
        </form>
    @else
        <h3 class="mb-3 text-2xl font-bold">Your message has landed safely in my inbox! &#x1F44D;</h3>
        <p class="text-sm text-gray-500 2xl:text-base">
            I'll get back to you as soon as possible. Thank you for reaching out!
        </p>
    @endunless
</x-cards.card>
