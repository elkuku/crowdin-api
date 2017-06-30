<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    WTFPL - See license.txt
 */
namespace Tests;

use ElKuKu\Crowdin\Package\Memory;
use PHPUnit\Framework\TestCase;
use Tests\Fake\FakeClient;
use Tests\Fake\FakeResponse;

/**
 * Class MemoryTest
 *
 * @since  1.0.7
 */
class MemoryTest extends TestCase
{
	/**
	 * @var Memory
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
		$this->object = new Memory('{projectID}', '{APIKey}', new FakeClient);
		$this->testResponse = new FakeResponse;
	}

	/**
	 * Test method.
	 *
	 * @covers \ElKuKu\Crowdin\Package\Memory::download
	 *
	 * @return void
	 */
	public function testDownload()
	{
		$this->assertThat(
			$this->object->download(),
			$this->equalTo(
				$this->testResponse->setBody(
					'project/{projectID}/download-tm?key={APIKey}&include_assigned=1')
			)
		);
	}

	/**
	 * Test method.
	 *
	 * @covers \ElKuKu\Crowdin\Package\Memory::upload
	 *
	 * @return void
	 */
	public function testUpload()
	{
		$this->assertThat(
			$this->object->upload(__DIR__ . '/Data/test.txt'),
			$this->equalTo(
				$this->testResponse->setBody(
					'project/{projectID}/upload-tm?key={APIKey}&multipart%5B0%5D%5Bname%5D=file')
			)
		);
	}

	/**
	 * Test method.
	 *
	 * @covers \ElKuKu\Crowdin\Package\Memory::upload
	 * @expectedException  \UnexpectedValueException
	 *
	 * @return void
	 */
	public function testUploadException()
	{
		$this->object->upload('/file/not/found');
	}
}
