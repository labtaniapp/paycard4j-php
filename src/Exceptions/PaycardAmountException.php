<?php

namespace Paycard4jPhp\Exceptions;

class PaycardAmountException extends \RuntimeException
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
