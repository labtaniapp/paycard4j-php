<?php

namespace Paycard4jPhp\Enums;

enum PaymentMethod: int
{
    case ORANGE_MONEY = 1;
    case MOMO = 2;
    case CREDIT_CARD = 3;
    case PAYCARD = 4;

    /**
     * Get the code associated with the payment method.
     *
     * @return int The code of the payment method.
     */
    public function getCode(): int
    {
        return $this->value;
    }
}
