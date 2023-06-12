<?php

namespace App\OutsideAPI;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Uri;

/**
 * Example HTTP Service
 */
class HttpClientService
{
    private Client $httpClient;

    private string $baseUri;

    public function __construct(string $baseUri)
    {
        $this->httpClient = new Client();
        $this->baseUri    = $baseUri;
    }

    /**
     * Get Hello String
     */
    public function getHelloString(string $name): string
    {
        $response = $this->httpClient->get(new Uri("{$this->baseUri}/api/course"), [
            'headers' => ['Content-Type' => 'application/json']
        ]);
        $body   = $response->getBody();
        $object = \json_decode($body, null, 512, JSON_THROW_ON_ERROR);

        if (isset($object->message)) {
            return $object->message;
        } else {

            return "Default hello string";
        }
    }


    /**
     * Get Goodbye String
     */
    public function getGoodbyeString(string $name): string
    {
        $response = $this->httpClient->get("{$this->baseUri}/goodbye/{$name}", [
            'headers' => ['Content-Type' => 'application/json']
        ]);
        $body   = $response->getBody();
        $object = \json_decode($body, null, 512, JSON_THROW_ON_ERROR);

        return $object->message;
    }
}
