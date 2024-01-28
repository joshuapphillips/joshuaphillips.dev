<?php

namespace App\Livewire\Forms;

use App\Enums\CommunicationTypes;
use App\Events\Forms\ContactFormSubmitted;
use App\Models\Communication;
use App\Rules\IsBritishTelephoneNumber;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Throwable;

class ContactForm extends Component
{
    const DEFAULT_FORM_ERROR_MESSAGE = 'Something went wrong try again later.';

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
        $this->clearFormError();
        $this->validate();

        $inputs = $this->getInputs();

        try {
            if ($this->isHoneyPotEmpty()) {
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
            $this->displayFormError();
        }
    }

    private function isHoneyPotEmpty(): bool
    {
        return empty($this->username);
    }

    /**
     * @return array<string, mixed>
     */
    private function getInputs(): array
    {
        $inputs = [
            'name' => $this->name,
            'company' => $this->company,
            'email' => $this->email,
            'telephone_number' => $this->telephoneNumber,
            'message' => $this->message,
            'privacy_policy' => $this->privacyPolicy,
        ];

        // Trim All Values
        $trimmedInputs = collect($inputs)
            ->mapWithKeys(function (mixed $value, string $key) {

                if (is_string($value)) {
                    $value = trim($value);
                }

                return [$key => $value];
            })
            ->toArray();

        return $trimmedInputs;
    }

    private function displayFormError(?string $message = null): void
    {
        $this->formErrorMessage = empty($message) ? self::DEFAULT_FORM_ERROR_MESSAGE : $message;
    }

    private function clearFormError(): void
    {
        $this->formErrorMessage = null;
    }

    public function render(): View
    {
        return view('livewire.forms.contact-form');
    }
}
