<?php

namespace Paycard4jPhp\Models\Responses;

class CreatePaymentResponse
{
    private int $code;
    private int $paymentAmount;
    private ?string $paymentAmountFormatted;
    private string $paymentDescription;
    private string $operationReference;
    private string $paymentUrl;
    private ?string $errorMessage;

    public function __construct(
        int $code = 0,
        int $paymentAmount = 0,
        ?string $paymentAmountFormatted = null,
        string $paymentDescription = '',
        string $operationReference = '',
        string $paymentUrl = '',
        ?string $errorMessage = null
    ) {
        $this->code = $code;
        $this->paymentAmount = $paymentAmount;
        $this->paymentAmountFormatted = $paymentAmountFormatted;
        $this->paymentDescription = $paymentDescription;
        $this->operationReference = $operationReference;
        $this->paymentUrl = $paymentUrl;
        $this->errorMessage = $errorMessage;
    }

    // Getters and Setters
    public function getCode(): int
    {
        return $this->code;
    }

    public function setCode(int $code): void
    {
        $this->code = $code;
    }

    public function getPaymentAmount(): int
    {
        return $this->paymentAmount;
    }

    public function setPaymentAmount(int $paymentAmount): void
    {
        $this->paymentAmount = $paymentAmount;
    }

    public function getPaymentAmountFormatted(): ?string
    {
        return $this->paymentAmountFormatted;
    }

    public function setPaymentAmountFormatted(?string $paymentAmountFormatted): void
    {
        $this->paymentAmountFormatted = $paymentAmountFormatted;
    }

    public function getPaymentDescription(): string
    {
        return $this->paymentDescription;
    }

    public function setPaymentDescription(string $paymentDescription): void
    {
        $this->paymentDescription = $paymentDescription;
    }

    public function getOperationReference(): string
    {
        return $this->operationReference;
    }

    public function setOperationReference(string $operationReference): void
    {
        $this->operationReference = $operationReference;
    }

    public function getPaymentUrl(): string
    {
        return $this->paymentUrl;
    }

    public function setPaymentUrl(string $paymentUrl): void
    {
        $this->paymentUrl = $paymentUrl;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public function setErrorMessage(?string $errorMessage): void
    {
        $this->errorMessage = $errorMessage;
    }

    public function __toString(): string
    {
        return sprintf(
            "CreatePaymentResponse{code=%d, paymentAmount=%d, paymentAmountFormatted='%s', paymentDescription='%s', operationReference='%s', paymentUrl='%s', errorMessage='%s'}",
            $this->code,
            $this->paymentAmount,
            $this->paymentAmountFormatted ?? '',
            $this->paymentDescription,
            $this->operationReference,
            $this->paymentUrl,
            $this->errorMessage ?? ''
        );
    }
}
