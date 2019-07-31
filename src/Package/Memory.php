<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    WTFPL - See license.txt
 */

namespace ElKuKu\Crowdin\Package;

use ElKuKu\Crowdin\Package;

use Psr\Http\Message\ResponseInterface;

/**
 * Class Memory
 *
 * @since  1.0.5
 */
Class Memory extends Package
{
	/**
	 * Download Crowdin project Translation Memory as TMX file.
	 *
	 * @param   boolean  $includeAssigned  Defines whether the assigned TMs should be included in downloaded TMX file.
	 *                                     Acceptable values are: 0, 1.
	 *                                     Default is 1.
	 * @param   boolean  $sourceLanguage Defines a source language for language pair. Сrowdin language code should be used.
	 * @param   boolean  $targetLanguage Defines a target language for language pair. Сrowdin language code should be used.
	 *
	 * @since 1.0.5
	 * @see   https://crowdin.com/page/api/download-tm
	 *
	 * @return ResponseInterface
	 */
	public function download(bool $includeAssigned = true, string $sourceLanguage = '', string $targetLanguage = '') : ResponseInterface
	{
		$url = $this->getBasePath('download-tm');
		if ($includeAssigned) {
			$url .= '&include_assigned=1';
		}
		if (!empty($sourceLanguage)) {
			$url .= '&source_language=' . $sourceLanguage;
		}
		if (!empty($targetLanguage)) {
			$url .= '&target_language=' . $targetLanguage;
		}
		return $this->getHttpClient()
			->get($url);
	}

	/**
	 * Upload your Translation Memory for Crowdin Project in TMX file format.
	 *
	 * @param   string  $file  Full path to file to upload.
	 *
	 * @since 1.0.5
	 * @see   https://crowdin.com/page/api/upload-tm
	 *
	 * @return ResponseInterface
	 */
	public function upload(string $file) : ResponseInterface
	{
		if (false === file_exists($file))
		{
			throw new \UnexpectedValueException('File not found for upload');
		}

		$data = [[
			'name'     => 'file',
			'contents' => fopen($file, 'r')
		]];

		return $this->getHttpClient()
			->post($this->getBasePath('upload-tm'), ['multipart' => $data]);
	}
}
