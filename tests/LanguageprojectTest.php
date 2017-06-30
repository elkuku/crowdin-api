<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    WTFPL - See license.txt
 */
namespace Tests;

use ElKuKu\Crowdin\Languageproject;
use PHPUnit\Framework\TestCase;

/**
 * Class LanguageprojectTest
 *
 * @since  1.0.7
 */
class LanguageprojectTest extends TestCase
{
	/**
	 * @var Languageproject
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
		$this->object = new Languageproject;
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Languageproject::toQuery
	 *
	 * @return void
	 */
	public function testToQuery()
	{
		$this->object->name = '{name}';
		$this->object->languages = ['{a}', '{b}'];

		$expected = [
			[
				'name' => 'name',
				'contents' => '{name}'
			],
			[
				'name' => 'languages[]',
				'contents' => '{a}'
			],
			[
				'name' => 'languages[]',
				'contents' => '{b}'
			]
		];

		$this->assertThat(
			$this->object->toQuery(),
			$this->equalTo($expected)
		);
	}
}
