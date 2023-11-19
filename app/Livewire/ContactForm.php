<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;

class ContactForm extends Component
{
    public bool $success = false;

    #[Rule('required|string|min:2|max:20')]
    public string $name = '';

    #[Rule('required|string|email')]
    public string $email = '';

    #[Rule('required|numeric|digits_between:9,15')]
    public string $telephone = '';

    #[Rule('required|string|min:1|max:20')]
    public string $business = '';

    #[Rule('required|string|min:3|max:500')]
    public string $message = '';

    public string $username = '';

    public function save()
    {
        $this->validate();

        dd('saved');
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
