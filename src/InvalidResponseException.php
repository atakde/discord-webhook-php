<?php

namespace Atakde\DiscordWebhook;

use Exception;

class InvalidResponseException extends Exception
{
    public function __construct($message = "", $code = 500)
    {
        parent::__construct($message, $code);
    }
}
