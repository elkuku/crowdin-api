<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    GNU General Public License version 2 or later
 */
namespace Tests;

use ElKuKu\Crowdin\Crowdin;

/**
 * Class CrowdinTest
 *
 * @since  1.0.7
 */
class CrowdinTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var Crowdin
	 */
	protected $object;

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Crowdin::__construct
	 *
	 * @return void
	 */
	public function test()
	{
		$this->assertThat(
			$this->object,
			$this->isInstanceOf('ElKuKu\Crowdin\Crowdin')
		);
	}

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @return void
	 */
	protected function setUp()
	{
		$this->object = new Crowdin('x', 'y');
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Crowdin::__get
	 *
	 * @return void
	 */
	public function test__get()
	{
		$this->assertThat(
			$this->object->file,
			$this->isInstanceOf('ElKuKu\Crowdin\Package\File')
		);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Crowdin::__get
	 * @expectedException  \InvalidArgumentException
	 *
	 * @return void
	 */
	public function test__getException()
	{
		$this->object->invalid;
	}
}
