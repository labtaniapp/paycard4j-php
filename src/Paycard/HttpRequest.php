<?php

namespace Paycard4jPhp\Paycard;

use Paycard4jPhp\Enums\HttpMethod;

interface HttpRequest
{
    public function baseUrl(): string;

    public function body(): ?array;

    public function method(): HttpMethod;

    public function uri(): string;
}

abstract class AbstractHttpRequest implements HttpRequest
{
    public function baseUrl(): string
    {
        return "https://mapaycard.com";
    }

    public function body(): ?array
    {
        return null;
    }

    public function method(): HttpMethod
    {
        return HttpMethod::GET;
    }

    public function uri(): string
    {
        return "";
    }
}
