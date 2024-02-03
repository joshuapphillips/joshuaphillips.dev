<?php

namespace App\Livewire;

use App\Enums\CommunicationTypes;
use App\Events\ContactFormSubmitted;
use App\Models\Communication;
use App\Rules\IsBritishTelephoneNumber;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Throwable;

class ContactForm extends Component
{
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

    // Honey Pot
    public string $username = '';

    public bool $showSuccessMessage = false;

    public ?string $formErrorMessage = null;

    public function save(): void
    {
        $this->formErrorMessage = null;
        $this->validate();

        try {
            $inputs = [
                'name' => $this->name,
                'company' => $this->company,
                'email' => $this->email,
                'telephone_number' => $this->telephoneNumber,
                'message' => $this->message,
                'privacy_policy' => $this->privacyPolicy,
            ];

            // If Honey Pot empty
            if (empty($this->username)) {
                $communication = Communication::create([
                    'type' => CommunicationTypes::GENERAL_CONTACT,
                    'content' => $inputs,
                ]);
                ContactFormSubmitted::dispatch($communication);
            } else {
                Log::info('Spam form submission', ['inputs' => $inputs]);
            }

            $this->reset();
            $this->showSuccessMessage = true;
        } catch (Throwable $exception) {
            Log::error("Contact form failed to save: {$exception->getMessage()}", ['inputs' => $inputs]);

            // Display form error message
            $this->formErrorMessage = 'Something went wrong try again later.';
        }
    }

    public function render(): View
    {
        return view('livewire.contact-form');
    }
}
