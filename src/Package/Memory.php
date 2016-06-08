<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    GNU General Public License version 2 or later
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
	 * @return string
	 */
	public function upload($file)
	{
		if (false === file_exists($file))
		{
			throw new \UnexpectedValueException('File not found for upload');
		}

		/*
		 * @todo Crowdin does not accept Guzzle's POST requests.
		 * She just tells me:
		 * <code>4</code>
		 * <message>No files specified in request</message>
		 *
		 *  :(

		return $this->getHttpClient()
			->post($this->getBasePath('upload-tm'), ['form_params' => ['file' => $file]]);

		HELP WANTED !!!

		 */

		$post_params = array();
		$request_url = 'https://api.crowdin.com/api/' . $this->getBasePath('upload-tm');

		if (function_exists('curl_file_create'))
		{
			$post_params['file'] = curl_file_create($file);
		}
		else
		{
			/*
			 * This does NOT seem to work with Mrs. Crowdin...
			 * ... comes from their docs
			 * $post_params['file'] = '@/home/crowdin/test.tmx';
			 */
			throw new \RuntimeException('This version of cURL does not seem to work (with Crowdin...)');
		}

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $request_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_params);

		$result = curl_exec($ch);

		curl_close($ch);

		if (false === $result)
		{
			throw new \UnexpectedValueException('File upload failed');

			// @todo Some more errors pls....
		}

		return 'File has been uploaded (?)';
	}
}
