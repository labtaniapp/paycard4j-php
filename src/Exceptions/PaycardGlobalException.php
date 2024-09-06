<?php

namespace Paycard4jPhp\Exceptions;

class PaycardGlobalException extends \RuntimeException
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
