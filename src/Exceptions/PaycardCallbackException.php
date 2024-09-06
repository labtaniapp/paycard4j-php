<?php

namespace Paycard4jPhp\Exceptions;

class PaycardCallbackException extends \RuntimeException
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
