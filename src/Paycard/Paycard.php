<?php

namespace Paycard4jPhp\Paycard;

use Paycard4jPhp\Exceptions\PaycardAmountException;
use Paycard4jPhp\Exceptions\PaycardCallbackException;
use Paycard4jPhp\Exceptions\PaycardGlobalException;
use Paycard4jPhp\Models\Requests\CreatePaymentRequest;
use Paycard4jPhp\Models\Responses\CreatePaymentResponse;
use Paycard4jPhp\Models\Responses\PaymentStatusResponse;
use Paycard4jPhp\Utils\URLValidator;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use JsonException;

class Paycard
{
    private string $merchantCode;

    public function __construct(string $merchantCode)
    {
        $this->merchantCode = $merchantCode;
    }

    public function createPayment(CreatePaymentRequest $request): CreatePaymentResponse
    {
        if ($request->getAmount() == 0) {
            throw new PaycardAmountException("Le montant est obligatoire");
        }

        if ($request->getCallbackUrl() !== null && !URLValidator::isValid($request->getCallbackUrl())) {
            throw new PaycardCallbackException("L'URL du callback est incorrect");
        }

        $createPayment = new CreatePayment($this->merchantCode, $request);

        $createPaymentResponse = $this->performRequest($createPayment, CreatePaymentResponse::class);

        if ($createPaymentResponse->getCode() !== 0) {
            throw new PaycardGlobalException($createPaymentResponse->getErrorMessage());
        }

        return $createPaymentResponse;
    }

    public function getPaymentStatus(string $reference): PaymentStatusResponse
    {
        $statusPayment = new StatusPayment($this->merchantCode, $reference);

        $paymentStatusResponse = $this->performRequest($statusPayment, PaymentStatusResponse::class);

        if ($paymentStatusResponse->getCode() !== 0) {
            throw new PaycardGlobalException($paymentStatusResponse->getErrorMessage());
        }

        return $paymentStatusResponse;
    }

    private function performRequest(HttpRequest $httpRequest, string $responseClass)
    {
        $client = new Client();
        try {
            $response = $client->request($httpRequest->method()->name, $httpRequest->uri(), [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => $httpRequest->body(),
            ]);

            $responseData = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

            return new $responseClass(...$responseData);
        } catch (GuzzleException $e) {
            throw new PaycardGlobalException("Erreur de requête : " . $e->getMessage());
        } catch (JsonException $e) {
            throw new PaycardGlobalException("Erreur de traitement JSON : " . $e->getMessage());
        }
    }
}
