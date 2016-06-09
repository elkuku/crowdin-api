<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    GNU General Public License version 2 or later
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
	 * @var string
	 */
	private $projectId;

	/**
	 * @var string
	 */
	private $apiKey;

	/**
	 * @var HttpClient
	 */
	private $httpClient;

	/**
	 * Constructor.
	 *
	 * @param   string      $projectId   The project ID.
	 * @param   string      $apiKey      The API key
	 * @param   HttpClient  $httpClient  The HTTP client object.
	 */
	public function __construct($projectId, $apiKey, HttpClient $httpClient)
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
	protected function getProjectId()
	{
		return $this->projectId;
	}

	/**
	 * Get the API key.
	 *
	 * @return string
	 */
	protected function getApiKey()
	{
		return $this->apiKey;
	}

	/**
	 * Get the HTTP client object.
	 *
	 * @return HttpClient
	 */
	protected function getHttpClient()
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
	protected function getBasePath($action)
	{
		return sprintf(
			'project/%s/%s?key=%s',
			$this->getProjectId(),
			$action,
			$this->getApiKey()
		);
	}
}
