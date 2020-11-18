<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    WTFPL - See license.txt
 */

namespace ElKuKu\Crowdin\Package;

use ElKuKu\Crowdin\Package;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Language
 *
 * @since  1.0.5
 */
class Language extends Package
{
    /**
     * Get supported languages list with Crowdin codes mapped to locale name and standardized codes.
     *
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @since 1.0.5
     * @see https://crowdin.com/page/api/supported-languages
     *
     */
    public function getSupported(): ResponseInterface
    {
        return $this->getHttpClient()
            ->get('supported-languages');
    }

    /**
     * Get the detailed translation progress for specified language.
     *
     * @param string $language The language code.
     *
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @since 1.0.5
     * @see https://crowdin.com/page/api/language-status
     *
     */
    public function getStatus(string $language): ResponseInterface
    {
        return $this->getHttpClient()
            ->post($this->getBasePath('language-status'), ['form_params' => ['language' => $language]]);
    }
}
