<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    WTFPL - See license.txt
 */

namespace Tests\Fake;

use ElKuKu\Crowdin\Package;

/**
 * Class FakePackage
 *
 * @since  1.0.7
 */
class FakePackage extends Package
{
	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package::getProjectId
	 * @return string
	 */
	public function testGetProjectId()
	{
		return $this->getProjectId();
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package::getApiKey
	 * @return string
	 */
	public function testGetApiKey()
	{
		return $this->getApiKey();
	}

	/**
	 * Test method.
	 *
	 * @param   string  $action  The action to perform.
	 *
	 * @covers ElKuKu\Crowdin\Package::getBasePath
	 * @return string
	 */
	public function testGetBasePath($action)
	{
		return $this->getBasePath($action);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package::getHttpClient
	 * @return \GuzzleHttp\Client
	 */
	public function testGetHttpClient()
	{
		return $this->getHttpClient();
	}
}
