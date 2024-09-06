<?php

namespace Paycard4jPhp\Enums;

enum HttpMethod: int
{
    case POST = 1;
    case GET = 2;

    /**
     * Get the code associated with the HTTP method.
     *
     * @return int The code of the HTTP method.
     */
    public function getCode(): int
    {
        return $this->value;
    }
}
