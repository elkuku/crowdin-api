<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    WTFPL - See license.txt
 */
namespace Tests;

use ElKuKu\Crowdin\Package\Language;

use PHPUnit\Framework\TestCase;
use Tests\Fake\FakeClient;
use Tests\Fake\FakeResponse;

/**
 * Class LanguageTest
 *
 * @since  1.0.7
 */
class LanguageTest extends TestCase
{
	/**
	 * @var Language
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
		$this->object = new Language('{projectID}', '{APIKey}', new FakeClient);
		$this->testResponse = new FakeResponse;
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
				$this->testResponse->setBody(
					'supported-languages'
				)
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
				$this->testResponse->setBody(
					'project/{projectID}/language-status?key={APIKey}&form_params%5Blanguage%5D=%7Blanguage%7D'
				)
			)
		);
	}
}
