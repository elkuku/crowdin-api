<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    WTFPL - See license.txt
 */
namespace Tests;

use ElKuKu\Crowdin\Languagefile;

/**
 * Class LanguagefileTest
 *
 * @since  1.0.7
 */
class LanguagefileTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var Languagefile
	 */
	protected $object;

	/**
	 * @var string
	 */
	protected $dataDir = '';

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @return void
	 */
	protected function setUp()
	{
		$this->dataDir = __DIR__ . '/Data';

		$this->object = new Languagefile($this->dataDir . '/test.txt', 'path/at/crowdin/test.txt');
	}

	/**
	 * Test method.
	 *
	 * @expectedException  \InvalidArgumentException
	 *
	 * @return void
	 */
	public function test()
	{
		new Languagefile('invalid/path', 'path/at/crowdin/test.txt');
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Languagefile::getLocalPath
	 *
	 * @return void
	 */
	public function testGetLocalPath()
	{
		$this->assertThat(
			$this->object->getLocalPath(),
			$this->equalTo($this->dataDir . '/test.txt')
		);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Languagefile::getCrowdinPath
	 *
	 * @return void
	 */
	public function testGetCrowdinPath()
	{
		$this->assertThat(
			$this->object->getCrowdinPath(),
			$this->equalTo('path/at/crowdin/test.txt')
		);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Languagefile::setExportPattern
	 *
	 * @return void
	 */
	public function testSetExportPattern()
	{
		$this->object->setExportPattern('fooBar');

		$this->assertThat(
			$this->object->getExportPattern(),
			$this->equalTo('fooBar')
		);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Languagefile::getExportPattern
	 *
	 * @return void
	 */
	public function testGetExportPattern()
	{
		$this->object->setExportPattern('fooBar');

		$this->assertThat(
			$this->object->getExportPattern(),
			$this->equalTo('fooBar')
		);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Languagefile::setTitle
	 *
	 * @return void
	 */
	public function testSetTitle()
	{
		$this->object->setTitle('fooBar');

		$this->assertThat(
			$this->object->getTitle(),
			$this->equalTo('fooBar')
		);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Languagefile::getTitle
	 *
	 * @return void
	 */
	public function testGetTitle()
	{
		$this->object->setTitle('fooBar');

		$this->assertThat(
			$this->object->getTitle(),
			$this->equalTo('fooBar')
		);
	}
}
