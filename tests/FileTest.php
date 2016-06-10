<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    GNU General Public License version 2 or later
 */
namespace Tests;

use ElKuKu\Crowdin\Languagefile;
use ElKuKu\Crowdin\Package\File;

use Tests\Fake\FakeClient;

/**
 * Class FileTest
 *
 * @since  1.0.7
 */
class FileTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var File
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
		$this->object = new File('{projectID}', '{APIKey}', new FakeClient);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package\File::add
	 *
	 * @return void
	 */
	public function testAdd()
	{
		$this->assertThat(
			$this->object->add(
				new Languagefile(__dir__ . '/Data/test.txt', 'crowdinpath'),
				'type',
				'branch'
			),
			$this->equalTo(
				'project/{projectID}/add-file?key={APIKey}&multipart%5B0%5D%5Bname%5D=type&multipart%5B0%5D%5Bcontents%5D=type'
				. '&multipart%5B1%5D%5Bname%5D=branch&multipart%5B1%5D%5Bcontents%5D=branch&multipart%5B2%5D%5Bname%5D=files%5Bcrowdinpath%5D'
			)
		);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package\File::update
	 * @covers ElKuKu\Crowdin\Package\File::processLanguageFile
	 *
	 * @return void
	 */
	public function testUpdate()
	{
		$languageFile = new Languagefile(__dir__ . '/Data/test.txt', 'crowdinpath');
		$languageFile->setTitle('title');
		$languageFile->setExportPattern('pattern');

		$expected = 'project/{projectID}/update-file?key={APIKey}&multipart%5B0%5D%5Bname%5D=branch'
			. '&multipart%5B0%5D%5Bcontents%5D=branch&multipart%5B1%5D%5Bname%5D=files%5Bcrowdinpath%5D'
			. '&multipart%5B2%5D%5Bname%5D=titles%5Bcrowdinpath%5D&multipart%5B2%5D%5Bcontents%5D=title'
			. '&multipart%5B3%5D%5Bname%5D=export_patterns%5Bcrowdinpath%5D&multipart%5B3%5D%5Bcontents%5D=pattern';

		$this->assertThat(
			$this->object->update($languageFile, 'branch'),
			$this->equalTo($expected)
		);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package\File::delete
	 *
	 * @return void
	 */
	public function testDelete()
	{
		$this->assertThat(
			$this->object->delete(new Languagefile(__dir__ . '/Data/test.txt', 'crowdinpath')),
			$this->equalTo('project/{projectID}/delete-file?key={APIKey}&')
		);
	}

	/**
	 * Test method.
	 *
	 * @covers ElKuKu\Crowdin\Package\File::export
	 *
	 * @return void
	 */
	public function testExport()
	{
		$this->assertThat(
			$this->object->export('foo', 'lang', 'foo'),
			$this->equalTo(
				'project/{projectID}/export-file?key={APIKey}&file=foo&language=lang&sink=foo'
			)
		);
	}
}
