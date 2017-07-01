<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    WTFPL - See license.txt
 */

namespace ElKuKu\Crowdin;

use GuzzleHttp\Client as HttpClient;

/**
 * Class Package
 *
 * @since  1.0
 */
abstract class Package
{
	/**
	 * The Crowdin project id.
	 * @var string
	 */
	private $projectId = '';

	/**
	 * The Crowdin API key.
	 * @var string
	 */
	private $apiKey = '';

	/**
	 * The HTTP client object.
	 * @var HttpClient
	 */
	private $httpClient = null;

	/**
	 * Constructor.
	 *
	 * @param   string      $projectId   The project ID.
	 * @param   string      $apiKey      The API key
	 * @param   HttpClient  $httpClient  The HTTP client object.
	 */
	public function __construct(string $projectId, string $apiKey, HttpClient $httpClient)
	{
		$this->projectId  = $projectId;
		$this->apiKey     = $apiKey;
		$this->httpClient = $httpClient;
	}

	/**
	 * Get the project ID.
	 *
	 * @return string
	 */
	protected function getProjectId() : string
	{
		return $this->projectId;
	}

	/**
	 * Get the API key.
	 *
	 * @return string
	 */
	protected function getApiKey() : string
	{
		return $this->apiKey;
	}

	/**
	 * Get the HTTP client object.
	 *
	 * @return HttpClient
	 */
	protected function getHttpClient() : HttpClient
	{
		return $this->httpClient;
	}

	/**
	 * Get the base path for the command including an action.
	 *
	 * @param   string  $action  The action to perform.
	 *
	 * @return string
	 */
	protected function getBasePath(string $action) : string
	{
		return sprintf(
			'project/%s/%s?key=%s',
			$this->getProjectId(),
			$action,
			$this->getApiKey()
		);
	}
}
