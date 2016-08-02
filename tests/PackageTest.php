<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    WTFPL - See license.txt
 */
namespace Tests;

use Tests\Fake\FakeClient;
use Tests\Fake\FakePackage;

/**
 * Class PackageTest
 *
 * @since  1.0.7
 */
class PackageTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var FakePackage
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @return void
	 */
	protected function setUp()
	{
		$this->object = new FakePackage('foo', 'bar', new FakeClient);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package::getProjectId
	 *
	 * @return void
	 */
	public function testGetProjectId()
	{
		$this->assertThat(
			$this->object->testGetProjectId(),
			$this->equalTo('foo')
		);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package::getProjectId
	 *
	 * @return void
	 */
	public function testSetProjectId()
	{
		$this->assertThat(
			$this->object->testGetProjectId(),
			$this->equalTo('foo')
		);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package::__construct
	 *
	 * @return void
	 */
	public function test__construct()
	{
		$this->assertThat(
			$this->object,
			$this->isInstanceOf('Tests\Fake\FakePackage')
		);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package::getApiKey
	 *
	 * @return void
	 */
	public function testGetApiKey()
	{
		$this->assertThat(
			$this->object->testGetApiKey(),
			$this->equalTo('bar')
		);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package::getHttpClient
	 *
	 * @return void
	 */
	public function testGetHttpClient()
	{
		$this->assertThat(
			$this->object->testGetHttpClient(),
			$this->isInstanceOf('Tests\Fake\FakeClient')
		);
	}
}
