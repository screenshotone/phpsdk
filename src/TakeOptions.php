<?php

namespace ScreenshotOne\Sdk;

/**
 * Options for take screenshot method.
 */
class TakeOptions
{
    private array $query;

    private function __construct(array $query)
    {
        $this->query = $query;
    }

    /**
     * Initialize options with the URL.
     */
    public static function url(string $url): TakeOptions
    {
        return new TakeOptions(['url' => $url]);
    }

    /**
     * Initialize options with the HTML.
     */
    public static function html(string $html): TakeOptions
    {
        return new TakeOptions(['html' => $html]);
    }

    private function put(string $key, string ...$value)
    {
        if (count($value) == 1) {
            $this->query[$key] = $value[0];
        } else {
            $this->query[$key] = $value;
        }
    }

    /**
     * Selector is a CSS-like selector of the element to take a screenshot of.
     */
    public function selector(string $selector)
    {
        $this->put("selector", $selector);

        return $this;
    }
    
    
    /**
     * hideSelectors method allows hiding elements before taking a screenshot.
     * 
     * All elements that match each selector will be hidden by setting the `display` style 
     * property to `none !important`.
     */
    public function hideSelectors(string ...$selectors) {
        $this->put("hide_selectors", ...$selectors);

        return $this;
    }

    /**
     * errorOnSelectorNotFound determines the behavior of what to do when selector is not found.
     */
    public function errorOnSelectorNotFound(bool $errorOn) {
        $this->put("error_on_selector_not_found", $errorOn ? "true" : "false");

        return $this;
    }

    /**
     * Styles specifies custom CSS styles for the page.
     */
    public function styles(string $styles)
    {
        $this->put("styles", $styles);

        return $this;
    }

    /**
     * Scripts specifies custom scripts for the page.
     */
    public function scripts(string $scripts)
    {
        $this->put("scripts", $scripts);

        return $this;
    }

    /**
     * Renders the full page.
     */
    public function fullPage(bool $fullPage)
    {
        $this->put("full_page", $fullPage ? "true" : "false");

        return $this;
    }

    /**
     * Sets response format, one of: "png", "jpeg", "webp" or "jpg".
     */
    public function format(string $format)
    {
        $this->put("format", $format);

        return $this;
    }

    /**
     * Renders image with the specified quality. Available for the next formats: "jpeg" ("jpg"), "webp".
     */
    public function imageQuality(int $imageQuality)
    {
        $this->put("image_quality", (string) $imageQuality);

        return $this;
    }

    /**
     * Renders a transparent background for the image. Works only if the site has not defined background color.
     * Available for the following response formats: "png", "webp".
     */
    public function omitBackground(bool $omitBackground)
    {
        $this->put("omit_background", $omitBackground ? "true" : "false");

        return $this;
    }

    /**
     * Sets the width of the browser viewport (pixels).
     */
    public function viewportWidth(int $viewportWidth)
    {
        $this->put("viewport_width", (string) $viewportWidth);

        return $this;
    }

    /**
     * Sets the height of the browser viewport (pixels).
     */
    public function viewportHeight(int $viewportHeight)
    {
        $this->put("viewport_height", (string) $viewportHeight);

        return $this;
    }

    /**
     * Sets the device scale factor. Acceptable value is one of: 1, 2 or 3.
     */
    public function deviceScaleFactor(int $deviceScaleFactor)
    {
        $this->put("device_scale_factor", (string) $deviceScaleFactor);

        return $this;
    }

    /**
     * Sets geolocation latitude for the request.
     * Both latitude and longitude are required if one of them is set.
     */
    public function geolocationLatitude(float $latitude)
    {
        $this->put("geolocation_latitude", (string) $latitude);

        return $this;
    }

    /**
     * Sets geolocation longitude for the request. Both latitude and longitude are required if one of them is set.
     */
    public function geolocationLongitude(float $longitude)
    {
        $this->put("geolocation_longitude", (string) $longitude);

        return $this;
    }

    /**
     * Sets the geolocation accuracy in meters.
     */
    public function geolocationAccuracy(int $accuracy)
    {
        $this->put("geolocation_accuracy", $accuracy);

        return $this;
    }

    /**
     * Blocks ads.
     */
    public function blockAds(bool $blockAds)
    {
        $this->put("block_ads", $blockAds ? "true" : "false");

        return $this;
    }

    /**
     * Blocks trackers.
     */
    public function blockTrackers(bool $blockTrackers)
    {
        $this->put("block_trackers", $blockTrackers ? "true" : "false");

        return $this;
    }

    /**
     * Blocks requests by specifying URL, domain, or even a simple pattern.
     */
    public function blockRequests(string ...$blockRequests)
    {
        $this->put("block_requests", ...$blockRequests);

        return $this;
    }


    /**
     * Blocks loading resources by type. Available resource types are: "document", "stylesheet", "image", "media",
     * "font", "script", "texttrack", "xhr", "fetch", "eventsource", "websocket", "manifest", "other".
     */
    public function blockResources(string ...$blockResources)
    {
        $this->put("block_resources", ...$blockResources);

        return $this;
    }

    /**
     * Enables caching.
     */
    public function cache(bool $cache)
    {
        $this->put("cache", $cache ? "true" : "false");

        return $this;
    }

    /**
     * Sets cache TTL.
     */
    public function cacheTtl(int $cacheTtl)
    {
        $this->put("cache_ttl", (string) $cacheTtl);

        return $this;
    }

    /**
     * Sets cache key.
     */
    public function cacheKey(string $cacheKey)
    {
        $this->put("cache_key", $cacheKey);

        return $this;
    }

    /**
     * Sets a user agent for the request.
     */
    public function userAgent(string $userAgent)
    {
        $this->put("user_agent", $userAgent);

        return $this;
    }

    /**
     * Sets an authorization header for the request.
     */
    public function authorization(string $authorization)
    {
        $this->put("authorization", $authorization);

        return $this;
    }

    /**
     * Set cookies for the request.
     */
    public function cookies(string ...$cookies)
    {
        $this->put("cookies", ...$cookies);

        return $this;
    }

    /**
     * Sets extra headers for the request.
     */
    public function headers(string ...$headers)
    {
        $this->put("headers", ...$headers);

        return $this;
    }

    /**
     * TimeZone sets time zone for the request.
     * Available time zones are: "America/Santiago", "Asia/Shanghai", "Europe/Berlin", "America/Guayaquil",
     * "Europe/Madrid", "Pacific/Majuro", "Asia/Kuala_Lumpur", "Pacific/Auckland", "Europe/Lisbon", "Europe/Kiev",
     * "Asia/Tashkent", "Europe/London".
     */
    public function timeZone(string $timeZone)
    {
        $this->put("time_zone", $timeZone);

        return $this;
    }

    /**
     * Sets delay.
     */
    public function delay(int $delay)
    {
        $this->put("delay", (string) $delay);

        return $this;
    }

    /**
     * Sets timeout.
     */
    public function timeout(int $timeout)
    {
        $this->put("timeout", (string) $timeout);

        return $this;
    }

    /**
     * Ignore errors returned by the site and render the error page.
     */
    public function ignoreHostErrors(bool $ignoreHostErrors)
    {
        $this->put("ignore_host_errors", $ignoreHostErrors ? "true" : "false");

        return $this;
    }

    /**
     * Returns array that might be used to build a query string.
     */
    public function query(): array
    {
        return $this->query;
    }
}
