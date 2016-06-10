<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    GNU General Public License version 2 or later
 */
namespace Tests;

use ElKuKu\Crowdin\Package\Project;
use Tests\Fake\FakeClient;

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
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @return void
	 */
	protected function setUp()
	{
		$this->object = new Project('{projectID}', '{APIKey}', new FakeClient);
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
				'project/{projectID}/info?key={APIKey}'
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
				'project/{projectID}/delete-project?key={APIKey}'
			)
		);
	}
}
