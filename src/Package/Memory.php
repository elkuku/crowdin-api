<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    WTFPL - See license.txt
 */

namespace ElKuKu\Crowdin\Package;

use ElKuKu\Crowdin\Package;

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
	 *
	 * @since 1.0.5
	 * @see   https://crowdin.com/page/api/download-tm
	 *
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public function download($includeAssigned = true)
	{
		return $this->getHttpClient()
			->get($this->getBasePath('download-tm') . '&include_assigned=' . (int) $includeAssigned);
	}

	/**
	 * Upload your Translation Memory for Crowdin Project in TMX file format.
	 *
	 * @param   string  $file  Full path to file to upload.
	 *
	 * @since 1.0.5
	 * @see   https://crowdin.com/page/api/upload-tm
	 *
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public function upload($file)
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
