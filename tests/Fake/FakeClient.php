<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    WTFPL - See license.txt
 */

namespace Tests\Fake;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class FakeClient
 *
 * @since  1.0.7
 */
class FakeClient extends Client
{
    /**
     * Get.
     *
     * @param string $uri The URI.
     * @param array $options Array with options.
     *
     * @return ResponseInterface
     */
    public function get($uri, array $options = []): ResponseInterface
    {
        return (new FakeResponse)
            ->setBody(count($options) ? $uri . '&' . http_build_query($options) : $uri);
    }

    /**
     * Post.
     *
     * @param string $uri The URI.
     * @param array $options Array with options.
     *
     * @return ResponseInterface
     */
    public function post($uri, array $options = []): ResponseInterface
    {
        return (new FakeResponse)
            ->setBody(count($options) ? $uri . '&' . http_build_query($options) : $uri);
    }
}
