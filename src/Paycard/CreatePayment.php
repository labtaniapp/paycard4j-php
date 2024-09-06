<?php

namespace Paycard4jPhp\Paycard;

use Paycard4jPhp\Enums\HttpMethod;
use Paycard4jPhp\Enums\PaymentMethod;
use Paycard4jPhp\Exceptions\PaycardGlobalException;
use Paycard4jPhp\Models\Requests\CreatePaymentRequest;
use GuzzleHttp\Psr7\Request;
use JsonException;

class CreatePayment extends AbstractHttpRequest
{
    private const CONTENT_TYPE = 'application/json';

    private string $merchantCode;
    private CreatePaymentRequest $createPaymentRequest;

    public function __construct(string $merchantCode, CreatePaymentRequest $createPaymentRequest)
    {
        $this->merchantCode = $merchantCode;
        $this->createPaymentRequest = $createPaymentRequest;
    }

    public function method(): HttpMethod
    {
        return HttpMethod::POST;
    }

    public function uri(): string
    {
        return $this->baseUrl() . '/epay/create';
    }

    public function body(): array
    {
        $data = [
            'c' => $this->merchantCode,
            'paycard-amount' => (string) $this->createPaymentRequest->getAmount(),
            'paycard-auto-redirect' => $this->createPaymentRequest->isAutoRedirect() ? 'on' : 'off',
            'paycard-redirect-with-get' => $this->createPaymentRequest->isRedirectWithGet() ? 'on' : 'off',
        ];

        if ($this->createPaymentRequest->getDescription() !== null) {
            $data['paycard-description'] = $this->createPaymentRequest->getDescription();
        }

        if ($this->createPaymentRequest->getReference() !== null) {
            $data['paycard-operation-reference'] = $this->createPaymentRequest->getReference();
        }

        if ($this->createPaymentRequest->getCallbackUrl() !== null) {
            $data['paycard-callback-url'] = $this->createPaymentRequest->getCallbackUrl();
        }

        if ($this->createPaymentRequest->getPaymentMethod() !== null) {
            switch ($this->createPaymentRequest->getPaymentMethod()) {
                case PaymentMethod::PAYCARD:
                    $data['paycard-jump-to-paycard'] = 'on';
                    break;
                case PaymentMethod::CREDIT_CARD:
                    $data['paycard-jump-to-cc'] = 'on';
                    break;
                case PaymentMethod::ORANGE_MONEY:
                    $data['paycard-jump-to-om'] = 'on';
                    break;
                case PaymentMethod::MOMO:
                    $data['paycard-jump-to-momo'] = 'on';
                    break;
            }
        }

        return $data;
    }

    /**
     * Creates the Guzzle HTTP request.
     *
     * @return Request The Guzzle HTTP request.
     * @throws PaycardGlobalException If JSON encoding fails.
     */
    public function createHttpRequest(): Request
    {
        try {
            $json = json_encode($this->body(), JSON_THROW_ON_ERROR);
            return new Request(
                $this->method()->name(),
                $this->uri(),
                ['Content-Type' => self::CONTENT_TYPE],
                $json
            );
        } catch (JsonException $e) {
            throw new PaycardGlobalException("Les données fournies sont incorrectes: " . $e->getMessage());
        }
    }
}
