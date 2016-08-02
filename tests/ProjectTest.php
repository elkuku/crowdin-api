<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    WTFPL - See license.txt
 */
namespace Tests;

use ElKuKu\Crowdin\Languageproject;
use ElKuKu\Crowdin\Package\Project;

use Tests\Fake\FakeClient;
use Tests\Fake\FakeResponse;

/**
 * Class ProjectTest
 *
 * @since  1.0.7
 */
class ProjectTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var Project
	 */
	protected $object;

	/**
	 * @var FakeResponse
	 */
	protected $testResponse;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @return void
	 */
	protected function setUp()
	{
		$this->object = new Project('{projectID}', '{APIKey}', new FakeClient);
		$this->testResponse = new FakeResponse;
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package\Project::create
	 *
	 * @return void
	 */
	public function testCreate()
	{
		$project = new Languageproject;

		$this->assertThat(
			$this->object->create('{login}', '{account-key}', $project),
			$this->equalTo(
				$this->testResponse->setBody(
					'account/create-project?account-key={account-key}&multipart%5B0%5D%5Bname%5D=login&multipart%5B0%5D%5Bcontents%5D=%7Blogin%7D'
				)
			)
		);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package\Project::edit
	 *
	 * @return void
	 */
	public function testEdit()
	{
		$project = new Languageproject;

		$this->assertThat(
			$this->object->edit($project),
			$this->equalTo(
				$this->testResponse->setBody(
					'project/{projectID}/edit-project?key={APIKey}&'
				)
			)
		);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package\Project::getList
	 *
	 * @return void
	 */
	public function testGetList()
	{
		$this->assertThat(
			$this->object->getList('{login}', '{account-key}'),
			$this->equalTo(
				$this->testResponse->setBody(
					'account/get-projects?account-key={account-key}&login={login}'
				)
			)
		);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package\Project::getInfo
	 *
	 * @return void
	 */
	public function testGetInfo()
	{
		$this->assertThat(
			$this->object->getInfo(),
			$this->equalTo(
				$this->testResponse->setBody(
					'project/{projectID}/info?key={APIKey}'
				)
			)
		);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package\Project::delete
	 *
	 * @return void
	 */
	public function testDelete()
	{
		$this->assertThat(
			$this->object->delete(),
			$this->equalTo(
				$this->testResponse->setBody(
					'project/{projectID}/delete-project?key={APIKey}'
				)
			)
		);
	}
}
