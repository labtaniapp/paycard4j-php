<?php

namespace Paycard4jPhp\Models\Responses;

class PaymentStatusResponse
{
    private int $code;
    private ?string $transactionDate;
    private string $status;
    private string $statusDescription;
    private string $errorMessage;
    private ?string $paymentMethod;
    private ?string $description;
    private string $reference;
    private ?string $paymentReference;
    private ?string $paymentMethodReference;
    private string $amount;
    private string $formattedAmount;
    private string $eCommerceDescription;
    private ?string $merchantName;

    public function __construct(
        int $code = 0,
        ?string $transactionDate = null,
        string $status = '',
        string $statusDescription = '',
        string $errorMessage = '',
        ?string $paymentMethod = null,
        ?string $description = null,
        string $reference = '',
        ?string $paymentReference = null,
        ?string $paymentMethodReference = null,
        string $amount = '',
        string $formattedAmount = '',
        string $eCommerceDescription = '',
        ?string $merchantName = null
    ) {
        $this->code = $code;
        $this->transactionDate = $transactionDate;
        $this->status = $status;
        $this->statusDescription = $statusDescription;
        $this->errorMessage = $errorMessage;
        $this->paymentMethod = $paymentMethod;
        $this->description = $description;
        $this->reference = $reference;
        $this->paymentReference = $paymentReference;
        $this->paymentMethodReference = $paymentMethodReference;
        $this->amount = $amount;
        $this->formattedAmount = $formattedAmount;
        $this->eCommerceDescription = $eCommerceDescription;
        $this->merchantName = $merchantName;
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

    public function getTransactionDate(): ?string
    {
        return $this->transactionDate;
    }

    public function setTransactionDate(?string $transactionDate): void
    {
        $this->transactionDate = $transactionDate;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getStatusDescription(): string
    {
        return $this->statusDescription;
    }

    public function setStatusDescription(string $statusDescription): void
    {
        $this->statusDescription = $statusDescription;
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

    public function setErrorMessage(string $errorMessage): void
    {
        $this->errorMessage = $errorMessage;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(?string $paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    public function getPaymentReference(): ?string
    {
        return $this->paymentReference;
    }

    public function setPaymentReference(?string $paymentReference): void
    {
        $this->paymentReference = $paymentReference;
    }

    public function getPaymentMethodReference(): ?string
    {
        return $this->paymentMethodReference;
    }

    public function setPaymentMethodReference(?string $paymentMethodReference): void
    {
        $this->paymentMethodReference = $paymentMethodReference;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

    public function getFormattedAmount(): string
    {
        return $this->formattedAmount;
    }

    public function setFormattedAmount(string $formattedAmount): void
    {
        $this->formattedAmount = $formattedAmount;
    }

    public function getECommerceDescription(): string
    {
        return $this->eCommerceDescription;
    }

    public function setECommerceDescription(string $eCommerceDescription): void
    {
        $this->eCommerceDescription = $eCommerceDescription;
    }

    public function getMerchantName(): ?string
    {
        return $this->merchantName;
    }

    public function setMerchantName(?string $merchantName): void
    {
        $this->merchantName = $merchantName;
    }

    public function __toString(): string
    {
        return sprintf(
            "PaymentStatusResponse{code=%d, transactionDate='%s', status='%s', statusDescription='%s', errorMessage='%s', paymentMethod='%s', description='%s', reference='%s', paymentReference='%s', paymentMethodReference='%s', amount='%s', formattedAmount='%s', eCommerceDescription='%s', merchantName='%s'}",
            $this->code,
            $this->transactionDate ?? '',
            $this->status,
            $this->statusDescription,
            $this->errorMessage,
            $this->paymentMethod ?? '',
            $this->description ?? '',
            $this->reference,
            $this->paymentReference ?? '',
            $this->paymentMethodReference ?? '',
            $this->amount,
            $this->formattedAmount,
            $this->eCommerceDescription,
            $this->merchantName ?? ''
        );
    }
}
