<?php

use PHPUnit\Framework\TestCase;

use ScreenshotOne\Sdk\Client;
use ScreenshotOne\Sdk\TakeOptions;

final class ClientTest extends TestCase
{
    public function testGenerateTakeUrl(): void
    {
        $client = new Client('access_key', 'secret_key');

        $options = TakeOptions::url("https://example.com")
            ->fullPage(true)
            ->delay(2)
            ->geolocationLatitude(48.857648)
            ->geolocationLongitude(2.294677)
            ->geolocationAccuracy(50);

        $url = $client->generateTakeUrl($options);

        $this->assertEquals(
            'https://api.screenshotone.com/take?access_key=access_key&url=https%3A%2F%2Fexample.com&full_page=true&delay=2&geolocation_latitude=48.857648&geolocation_longitude=2.294677&geolocation_accuracy=50&signature=617c66eeedd9ebffac97e5c9429be10471632362da96e796be54911987c47ff0', 
            $url
        );
    }
}
