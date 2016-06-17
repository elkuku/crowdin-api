<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    WTFPL - See license.txt
 */
namespace Tests;

use ElKuKu\Crowdin\Package\Language;
use Tests\Fake\FakeClient;

/**
 * Class LanguageTest
 *
 * @since  1.0.7
 */
class LanguageTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var Language
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
		$this->object = new Language('{projectID}', '{APIKey}', new FakeClient);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package\Language::getSupported
	 *
	 * @return void
	 */
	public function testGetSupported()
	{
		$this->assertThat(
			$this->object->getSupported(),
			$this->equalTo(
				'supported-languages'
			)
		);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package\Language::getStatus
	 *
	 * @return void
	 */
	public function testGetStatus()
	{
		$this->assertThat(
			$this->object->getStatus('{language}'),
			$this->equalTo(
				'project/{projectID}/language-status?key={APIKey}&form_params%5Blanguage%5D=%7Blanguage%7D'
			)
		);
	}
}
