<?php

namespace Paycard4jPhp\Models\Requests;

use Paycard4jPhp\Enums\PaymentMethod;

class CreatePaymentRequest
{
    private float $amount;
    private ?string $description;
    private ?string $reference;
    private ?PaymentMethod $paymentMethod;
    private ?string $callbackUrl;
    private bool $autoRedirect;
    private bool $redirectWithGet;

    public function __construct(
        float $amount = 0.0,
        ?string $description = null,
        ?string $reference = null,
        ?PaymentMethod $paymentMethod = null,
        ?string $callbackUrl = null,
        bool $autoRedirect = false,
        bool $redirectWithGet = false
    ) {
        $this->amount = $amount;
        $this->description = $description;
        $this->reference = $reference;
        $this->paymentMethod = $paymentMethod;
        $this->callbackUrl = $callbackUrl;
        $this->autoRedirect = $autoRedirect;
        $this->redirectWithGet = $redirectWithGet;
    }

    // Getters and Setters
    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }

    public function getPaymentMethod(): ?PaymentMethod
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(?PaymentMethod $paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function getCallbackUrl(): ?string
    {
        return $this->callbackUrl;
    }

    public function setCallbackUrl(?string $callbackUrl): void
    {
        $this->callbackUrl = $callbackUrl;
    }

    public function isAutoRedirect(): bool
    {
        return $this->autoRedirect;
    }

    public function setAutoRedirect(bool $autoRedirect): void
    {
        $this->autoRedirect = $autoRedirect;
    }

    public function isRedirectWithGet(): bool
    {
        return $this->redirectWithGet;
    }

    public function setRedirectWithGet(bool $redirectWithGet): void
    {
        $this->redirectWithGet = $redirectWithGet;
    }
}
