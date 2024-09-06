<?php

namespace Paycard4jPhp\Paycard;

use Paycard4jPhp\Enums\HttpMethod;

class StatusPayment extends AbstractHttpRequest
{
    private string $merchantCode;
    private string $reference;

    public function __construct(string $merchantCode, string $reference)
    {
        $this->merchantCode = $merchantCode;
        $this->reference = $reference;
    }

    public function uri(): string
    {
        return $this->baseUrl()
            . '/epay'
            . '/' . urlencode($this->merchantCode)
            . '/' . urlencode($this->reference)
            . '/status';
    }

    public function method(): HttpMethod
    {
        return HttpMethod::GET;
    }
}
