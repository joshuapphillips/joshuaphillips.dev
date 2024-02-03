<?php

namespace App\Exceptions;

use App\Models\Communication;
use Exception;

class ContactFormUserNotificationException extends Exception
{
    public function __construct(
        private Communication $communication,
        private string $message,
        private int $code = 0,
        private ?Exception $previous = null
    ) {
        $message = <<<EOT
        An error occurred while trying to notify the User of a new contact form submission.
        Communication ID: {$this->communication->id}
        Message: {$this->message}
        EOT;

        parent::__construct($this->message, $this->code, $this->previous);
    }
}
