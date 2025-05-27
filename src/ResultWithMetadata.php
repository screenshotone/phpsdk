<?php

namespace ScreenshotOne\Sdk;

use DateTime;

class ImageSize
{
    public int $width;
    public int $height;
}


class Content
{
    public final string $url;
    public final ?DateTime $expires = null;

    public function __construct(string $url, DateTime $expires)
    {
        $this->url = $url;
        $this->expires = $expires;
    }
}

class OpenGraph
{
    public ?string $title = null;
    public ?string $description = null;
    public ?string $image = null;
}

class HTTPResponse
{
    public ?int $statusCode = null;
    public array $headers = [];
}

class Cache
{
    public final string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }
}

class Icon
{
    public final string $url;
    public final string $type;

    public function __construct(string $url, string $type)
    {
        $this->url = $url;
        $this->type = $type;
    }
}

class Font
{
    public string $first;
    public array $fallback = [];
    public array $elements = [];

    public function __construct(string $first, array $fallback, array $elements)
    {
        $this->first = $first;
        $this->fallback = $fallback;
        $this->elements = $elements;
    }
}

class ResultWithMetadata
{
    public final ?Cache $cache = null;
    public final ?string $screenshot = null;
    public final ?ImageSize $imageSize = null;
    /**
     * @var Font[]|null
     */
    public final ?array $fonts = null;
    public final ?Icon $icon = null;
    public final ?OpenGraph $openGraph = null;
    public final ?string $pageTitle = null;
    public final ?Content $content = null;
    public final ?HTTPResponse $httpResponse = null;
}
