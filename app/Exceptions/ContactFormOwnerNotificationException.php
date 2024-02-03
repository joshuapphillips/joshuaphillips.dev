<?php

namespace App\Exceptions;

use App\Models\Communication;
use Exception;

class ContactFormOwnerNotificationException extends Exception
{
    public function __construct(
        Communication $communication,
        string $message,
        int $code = 0,
        ?Exception $previous = null
    ) {
        $message = <<<EOT
        An error occurred while trying to notify the owner of a new contact form submission.
        Communication ID: {$communication->id}
        Message: {$message}
        EOT;

        parent::__construct($message, $code, $previous);
    }
}
