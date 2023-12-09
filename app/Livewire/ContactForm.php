<?php

namespace App\Livewire;

use App\Models\Communication;
use App\Rules\IsBritishTelephoneNumber;
use Exception;
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
    public ?bool $termsAndConditions = false;

    // Honey Pot
    public string $username = '';

    public bool $processed = false;

    public ?string $error = null;

    public function save(): void
    {
        $this->error = null;
        $this->validate();

        $name = ucwords($this->name);
        $inputs = [
            'name' => $name,
            'company' => ucwords($this->company ?? ''),
            'email' => $this->email,
            'telephoneNumber' => str_replace(' ', '', $this->telephoneNumber),
            'message' => $this->message,
            'termsAndConditionsAccepted' => $this->termsAndConditions,
        ];

        try {
            throw new Exception('Oh No');
            if (empty($this->username)) {
                Communication::create([
                    'name' => $name,
                    'email_address' => $this->email,
                    'content' => $inputs,
                ]);
            } else {
                Log::info('Spam form submission', ['inputs' => $inputs]);
            }

            $this->reset();
            $this->processed = true;
        } catch (Throwable $exception) {
            Log::error("Contact form failed to save: {$exception->getMessage()}", ['inputs' => $inputs]);
            $this->processed = false;
            $this->error = 'Something went wrong try again later.';
        }
    }

    public function render(): View
    {
        return view('livewire.contact-form');
    }
}
