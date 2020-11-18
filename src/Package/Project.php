<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    WTFPL - See license.txt
 */

namespace ElKuKu\Crowdin\Package;

use ElKuKu\Crowdin\{Languageproject, Package};
use Psr\Http\Message\ResponseInterface;

/**
 * Class Project
 *
 * @since  1.0.5
 */
class Project extends Package
{
    /**
     * Create Crowdin project.
     *
     * @param string $login The user login.
     * @param string $accountKey The user account key.
     * @param Languageproject $project The project object.
     *
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @see https://crowdin.com/page/api/create-project
     * @since 1.0.7
     *
     */
    public function create(string $login, string $accountKey, Languageproject $project): ResponseInterface
    {
        $path = 'account/create-project?account-key=' . $accountKey;

        $params = $project->toQuery();

        $params[] = [
            'name' => 'login',
            'contents' => $login,
        ];

        return $this->getHttpClient()
            ->post($path, ['multipart' => $params]);
    }

    /**
     * Edit Crowdin project.
     *
     * @param Languageproject $project The language project object.
     *
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @see https://crowdin.com/page/api/edit-project
     * @since 1.0.7
     *
     */
    public function edit(Languageproject $project): ResponseInterface
    {
        $project->identifier = null;
        $project->source_language = null;

        return $this->getHttpClient()
            ->post($this->getBasePath('edit-project'), ['multipart' => $project->toQuery()]);
    }

    /**
     * Get Crowdin Project details.
     *
     * @param string $login Your Crowdin Account login name.
     * @param string $accountKey Account API key (profile settings -> "API & SSO" tab).
     *
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @see https://crowdin.com/page/api/get-projects
     * @since 1.0.7
     *
     */
    public function getList(string $login, string $accountKey): ResponseInterface
    {
        $path = sprintf(
            'account/get-projects?account-key=%s&login=%s',
            $accountKey,
            $login
        );

        return $this->getHttpClient()
            ->post($path);
    }

    /**
     * Get Crowdin Project details.
     *
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @since 1.0.5
     * @see   https://crowdin.com/page/api/info
     *
     */
    public function getInfo(): ResponseInterface
    {
        return $this->getHttpClient()
            ->post($this->getBasePath('info'));
    }

    /**
     * Delete Crowdin project with all translations.
     *
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @since 1.0.5
     * @see   https://crowdin.com/page/api/delete-project
     *
     */
    public function delete(): ResponseInterface
    {
        return $this->getHttpClient()
            ->get($this->getBasePath('delete-project'));
    }
}
