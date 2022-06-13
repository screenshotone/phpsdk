<?php

namespace ScreenshotOne\Sdk;

use GuzzleHttp\Client as HttpClient;

/**
 * The client for ScreenshotOne.com API to take screenshots of any URL.
 */
class Client
{
    private const API_BASE_URI = 'https://api.screenshotone.com';

    private HttpClient $httpClient;
    private $accessKey, $secretKey;

    public function __construct(string $accessKey, string $secretKey)
    {
        $this->httpClient = new HttpClient([
            'timeout'  => 30,
            'allow_redirects' => true,
        ]);

        $this->accessKey = $accessKey;
        $this->secretKey = $secretKey;
    }

    /**
     * Generates URL to take screenshots with ScreenshotOne.com API.
     */
    public function generateTakeUrl(TakeOptions $options): string
    {
        $queryString = $this->buildQueryString($options);
        $signature = hash_hmac('sha256', $queryString, $this->secretKey);
        $queryString .= '&signature=' . $signature;

        return sprintf("%s/take?%s", static::API_BASE_URI, $queryString);
    }

    /**
     * Take screenshot and return an image.
     * 
     * Returns the image stream.
     */
    public function take(TakeOptions $options): string
    {
        $response = $this->httpClient->get($this->generateTakeUrl($options), ['stream' => true]);

        return $response->getBody()->getContents();
    }

    private function buildQueryString(TakeOptions $options): string
    {
        $queryPairs = ['access_key=' . $this->accessKey];
        foreach ($options->query() as $key => $values) {
            if (is_array($values)) {
                foreach ($values as $value) {
                    $queryPairs[] = $key . '=' . urlencode($value);
                }
            } else {
                $queryPairs[] = $key . '=' . urlencode($values);
            }
        }

        return join("&", $queryPairs);
    }
}
