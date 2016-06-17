<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    WTFPL - See license.txt
 */
namespace Tests;

use ElKuKu\Crowdin\Package\Directory;

use Tests\Fake\FakeClient;

/**
 * Class DirectoryTest
 *
 * @since  1.0.7
 */
class DirectoryTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var Directory
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
		$this->object = new Directory('{projectID}', '{APIKey}', new FakeClient);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package\Directory::add
	 *
	 * @return void
	 */
	public function testAdd()
	{
		$this->assertThat(
			$this->object->add('foo', true, 'branch'),
			$this->equalTo(
				'project/{projectID}/add-directory?key={APIKey}&form_params%5Bname%5D=foo&form_params%5Bis_branch%5D=1&form_params%5Bbranch%5D=branch'
			)
		);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package\Directory::update
	 *
	 * @return void
	 */
	public function testUpdate()
	{
		$this->assertThat(
			$this->object->update('foo', 'bar', 'title', 'pattern', 'branch'),
			$this->equalTo(
				'project/{projectID}/change-directory?key={APIKey}&form_params%5Bname%5D=foo&form_params%5Bnew_name%5D=bar'
				. '&form_params%5Btitle%5D=title&form_params%5Bexport_pattern%5D=pattern&form_params%5Bbranch%5D=branch'
			)
		);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package\Directory::delete
	 *
	 * @return void
	 */
	public function testDelete()
	{
		$this->assertThat(
			$this->object->delete('foo'),
			$this->equalTo(
				'project/{projectID}/delete-directory?key={APIKey}&form_params%5Bname%5D=foo'
			)
		);
	}
}
