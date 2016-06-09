<?php
namespace Tests\Fake;

use ElKuKu\Crowdin\Package;

/**
 * Created by PhpStorm.
 * User: elkuku
 * Date: 09.06.16
 * Time: 10:34
 */
class FakePackage extends Package
{
	public function testGetProjectId()
	{
		return $this->getProjectId();
	}

	public function testGetApiKey()
	{
		return $this->getApiKey();
	}
	public function testGetBasePath($action)
	{
		return $this->getBasePath($action);
	}
	public function testGetHttpClient()
	{
		return $this->getHttpClient();
	}

}
