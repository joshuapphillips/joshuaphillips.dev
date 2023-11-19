<?php

namespace App\Livewire;

use App\Models\Communication;
use App\Rules\IsBritishTelephoneNumber;
use Illuminate\Support\Facades\Log;
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
    public string $termsAndConditions = '';

    public string $username = '';

    public bool $processed = false;

    public ?string $error = null;

    public function save()
    {
        try {
            $this->error = null;
            $this->validate();

            $content = [
                'name' => $this->name,
                'company' => $this->company,
                'email' => $this->email,
                'telephone_number' => $this->telephoneNumber,
                'message' => $this->message,
            ];

            if (! empty($this->username)) {
                Log::info('Spam form submission:'.json_encode($content));
            } else {
                Communication::create(['content' => $content]);
            }

            $this->processed = true;
        } catch (Throwable $exception) {
            Log::error("{$exception->getMessage()}");
            $this->error = 'Something went wrong try again later.';
        }
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
