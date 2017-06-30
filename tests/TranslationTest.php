<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    WTFPL - See license.txt
 */
namespace Tests;

use ElKuKu\Crowdin\Languagefile;
use ElKuKu\Crowdin\Package\Translation;

use PHPUnit\Framework\TestCase;
use Tests\Fake\FakeClient;
use Tests\Fake\FakeResponse;

/**
 * Class TranslationTest
 *
 * @since  1.0.7
 */
class TranslationTest extends TestCase
{
	/**
	 * @var Translation
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
		$this->object = new Translation('{projectID}', '{APIKey}', new FakeClient);
		$this->testResponse = new FakeResponse;
	}

	/**
	 * Test method.
	 *
	 * @covers \ElKuKu\Crowdin\Package\Translation::upload
	 *
	 * @return void
	 */
	public function testUpload()
	{
		$languageFile = new Languagefile(__DIR__ . '/Data/test.txt', '{crowdinpath');

		$this->assertThat(
			$this->object->upload($languageFile, '{language}'),
			$this->equalTo(
				$this->testResponse->setBody(
					'project/{projectID}/upload-translation?key={APIKey}&multipart%5B0%5D%5Bname%5D=import_duplicates'
					. '&multipart%5B0%5D%5Bcontents%5D=0&multipart%5B1%5D%5Bname%5D=import_eq_suggestions'
					. '&multipart%5B1%5D%5Bcontents%5D=0&multipart%5B2%5D%5Bname%5D=auto_approve_imported'
					. '&multipart%5B2%5D%5Bcontents%5D=0&multipart%5B3%5D%5Bname%5D=language'
					. '&multipart%5B3%5D%5Bcontents%5D=%7Blanguage%7D&multipart%5B4%5D%5Bname%5D=files%5B%7Bcrowdinpath%5D'
				)
			)
		);
	}

	/**
	 * Test method.
	 *
	 * @covers \ElKuKu\Crowdin\Package\Translation::export
	 *
	 * @return void
	 */
	public function testExport()
	{
		$this->assertThat(
			$this->object->export('{branch}'),
			$this->equalTo(
				$this->testResponse->setBody(
					'project/{projectID}/export?key={APIKey}&branch={branch}'
				)
			)
		);
	}

	/**
	 * Test method.
	 *
	 * @covers \ElKuKu\Crowdin\Package\Translation::download
	 *
	 * @return void
	 */
	public function testDownload()
	{
		$this->assertThat(
			$this->object->download('{package}', '{toPath}', '{branch}'),
			$this->equalTo(
				$this->testResponse->setBody(
					'project/{projectID}/download/{package}?key={APIKey}&branch={branch}&sink=%7BtoPath%7D'
				)
			)
		);
	}

	/**
	 * Test method.
	 *
	 * @covers \ElKuKu\Crowdin\Package\Translation::getStatus
	 *
	 * @return void
	 */
	public function testGetStatus()
	{
		$this->assertThat(
			$this->object->getStatus(),
			$this->equalTo(
				$this->testResponse->setBody(
					'project/{projectID}/status?key={APIKey}'
				)
			)
		);
	}
}
