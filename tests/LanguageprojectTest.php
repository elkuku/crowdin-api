<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    GNU General Public License version 2 or later
 */
namespace Tests;

use ElKuKu\Crowdin\Languageproject;

/**
 * Class LanguageprojectTest
 *
 * @since  1.0.7
 */
class LanguageprojectTest extends \PHPUnit_Framework_TestCase
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
