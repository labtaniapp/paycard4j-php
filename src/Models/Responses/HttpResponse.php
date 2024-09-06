<?php

namespace Paycard4jPhp\Models\Responses;

class HttpResponse
{
    private int $status;
    private string $data;

    public function __construct(int $status = 0, string $data = '')
    {
        $this->status = $status;
        $this->data = $data;
    }

    // Getters and Setters
    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function setData(string $data): void
    {
        $this->data = $data;
    }

    public function __toString(): string
    {
        return sprintf("HttpResponse{status=%d, data='%s'}", $this->status, $this->data);
    }
}
