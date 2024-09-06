<?php

namespace Paycard4jPhp\Utils;

use Paycard4jPhp\Enums\HttpMethod;
use Paycard4jPhp\Exceptions\PaycardGlobalException;
use Paycard4jPhp\Models\Responses\HttpResponse;
use Paycard4jPhp\Paycard\HttpRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;

class RequestUtil
{
    private static Client $httpClient;

    private function __construct()
    {
        // Constructor is private to prevent instantiation
    }

    public static function initializeClient(): void
    {
        self::$httpClient = new Client();
    }

    /**
     * Performs the HTTP request and returns the response as an instance of the specified class.
     *
     * @param HttpRequest $httpRequest The HTTP request to perform.
     * @param string $class The class to map the JSON response to.
     * @return object An instance of the specified class with data from the JSON response.
     * @throws PaycardGlobalException|JsonException
     */
    public static function performRequest(HttpRequest $httpRequest, string $class): object
    {
        $httpResponse = self::execute($httpRequest);

        return JsonUtils::getObjectFromJsonString($httpResponse->getData(), $class);
    }

    /**
     * Executes the HTTP request and returns an HttpResponse object.
     *
     * @param HttpRequest $httpRequest The HTTP request to execute.
     * @return HttpResponse The HTTP response.
     * @throws PaycardGlobalException
     */
    private static function execute(HttpRequest $httpRequest): HttpResponse
    {
        try {
            $response = self::$httpClient->request($httpRequest->method()->name(), $httpRequest->uri(), [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'body' => $httpRequest->method() === HttpMethod::POST ? $httpRequest->body() : null,
            ]);

            return self::createHttpResponse($response);
        } catch (GuzzleException $e) {
            throw new PaycardGlobalException("Request failed: " . $e->getMessage());
        }
    }

    /**
     * Creates an HttpResponse object from the Guzzle response.
     *
     * @param \Psr\Http\Message\ResponseInterface $response The Guzzle HTTP response.
     * @return HttpResponse The HttpResponse object.
     * @throws PaycardGlobalException
     */
    private static function createHttpResponse($response): HttpResponse
    {
        $httpResponse = new HttpResponse();
        $httpResponse->setStatus($response->getStatusCode());
        
        $body = $response->getBody();
        if ($body) {
            $httpResponse->setData($body->getContents());
        } else {
            throw new PaycardGlobalException("Response body is null");
        }
        
        return $httpResponse;
    }
}

# Initialize the HTTP client before using the RequestUtil
RequestUtil::initializeClient();
