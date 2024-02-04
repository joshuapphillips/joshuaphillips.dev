<?php

namespace App\Livewire;

use App\Rules\IsBritishTelephoneNumber;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Spatie\Honeypot\Http\Livewire\Concerns\HoneypotData;
use Spatie\Honeypot\Http\Livewire\Concerns\UsesSpamProtection;

class ContactForm extends Component
{
    use UsesSpamProtection;

    const DEFAULT_ERROR_MESSAGE = 'Something went wrong try again later.';

    #[Rule(['required', 'string', 'min:2', 'max:20'])]
    public string $name = '';

    #[Rule(['required', 'string', 'min:1', 'max:20'])]
    public string $company = '';

    #[Rule(['required', 'string', 'email'])]
    public string $email = '';

    #[Rule(['required', new IsBritishTelephoneNumber])]
    public string $telephoneNumber = '';

    #[Rule(['required', 'string', 'min:3', 'max:500'])]
    public string $message = '';

    #[Rule(['required', 'accepted'])]
    public ?bool $privacyPolicy = false;

    public HoneypotData $extraFields;

    public bool $successful = false;

    public ?string $errorMessage = null;

    public function mount()
    {
        $this->extraFields = new HoneypotData();
    }

    public function save(): bool
    {
        $this->protectAgainstSpam();

        $this->errorMessage = null;
        $this->validate();

        try {
            $communication = Communication::create([
                'type' => CommunicationTypes::GENERAL_CONTACT->value,
                'content' => $this->only(['name', 'company', 'email', 'telephoneNumber', 'message', 'privacyPolicy']),
            ]);
            ContactFormSubmitted::dispatch($communication);
            $this->successful = true;
        } catch (Exception $exception) {
            Log::error("Contact form failed to save: {$exception->getMessage()}", ['inputs' => $this->all()]);
            $this->errorMessage = self::DEFAULT_ERROR_MESSAGE;
            $this->successful = false;
        }
    }

    public function render(): View
    {
        return view('livewire.contact-form');
    }
}
