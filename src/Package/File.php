<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    GNU General Public License version 2 or later
 */

namespace ElKuKu\Crowdin\Package;

use ElKuKu\Crowdin\Package;
use ElKuKu\Crowdin\Languagefile;

/**
 * Class File
 *
 * @since  1.0
 */
Class File extends Package
{
	/**
	 * Add new file to Crowdin project.
	 *
	 * @param   Languagefile  $languagefile  The translation file object
	 * @param   string        $type          The type.
	 * @param   string        $branch        The branch.
	 *
	 * @see https://crowdin.com/page/api/add-file
	 * @since  1.0
	 *
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public function add(Languagefile $languagefile, $type = '', $branch = '')
	{
		$path = sprintf(
			'project/%s/add-file?key=%s',
			$this->getProjectId(),
			$this->getApiKey()
		);

		$data = [];

		if ('' !== $type)
		{
			$data[] = [
				'name'     => 'type',
				'contents' => $type
			];
		}

		if ('' !== $branch)
		{
			$data[] = [
				'name'     => 'branch',
				'contents' => $branch
			];
		}

		$data[] = [
			'name'     => 'files[' . $languagefile->getCrowdinPath() . ']',
			'contents' => fopen($languagefile->getLocalPath(), 'r')
		];

		if ($languagefile->getTitle())
		{
			$data[] = [
				'name'     => 'titles[' . $languagefile->getCrowdinPath() . ']',
				'contents' => $languagefile->getTitle()
			];
		}

		if ($languagefile->getExportPattern())
		{
			$data[] = [
				'name'     => 'export_patterns[' . $languagefile->getCrowdinPath() . ']',
				'contents' => $languagefile->getExportPattern()
			];
		}

		return $this->getHttpClient()
			->post($path, ['multipart' => $data]);
	}

	/**
	 * Upload latest version of your localization file to Crowdin.
	 *
	 * @param   Languagefile  $languagefile  The translation file object
	 * @param   string        $branch        The branch.
	 *
	 * @see https://crowdin.com/page/api/update-file
	 * @since  1.0
	 *      
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public function update(Languagefile $languagefile, $branch = '')
	{
		$path = sprintf(
			'project/%s/update-file?key=%s',
			$this->getProjectId(),
			$this->getApiKey()
		);

		$data = [];

		if ('' !== $branch)
		{
			$data[] = [
				'name'     => 'branch',
				'contents' => $branch
			];
		}

		$data[] = [
			'name'     => 'files[' . $languagefile->getCrowdinPath() . ']',
			'contents' => fopen($languagefile->getLocalPath(), 'r')
		];

		if ($languagefile->getTitle())
		{
			$data[] = [
				'name'     => 'titles[' . $languagefile->getCrowdinPath() . ']',
				'contents' => $languagefile->getTitle()
			];
		}

		if ($languagefile->getExportPattern())
		{
			$data[] = [
				'name'     => 'export_patterns[' . $languagefile->getCrowdinPath() . ']',
				'contents' => $languagefile->getExportPattern()
			];
		}

		return $this->getHttpClient()
			->post($path, ['multipart' => $data]);
	}

	/**
	 * Delete file from Crowdin project. All the translations will be lost without ability to restore them.
	 *
	 * @param   string  $file  The file to delete.
	 *
	 * @see https://crowdin.com/page/api/delete-file
	 * @since  1.0
	 *
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public function delete($file)
	{
		$path = sprintf(
			'project/%s/delete-file?key=%s',
			$this->getProjectId(),
			$this->getApiKey()
		);

		return $this->getHttpClient()
			->post($path, ['form_params' => ['file' => $file]]);
	}

	/**
	 * This method exports single translated files from Crowdin.
	 * Additionally, it can be applied to export XLIFF files for offline localization. (@todo)
	 *
	 * @param   string  $file      The file name.
	 * @param   string  $language  The language tag.
	 * @param   string  $toPath    Export to path.
	 *
	 * @see    https://crowdin.com/page/api/export-file
	 * @since  1.0
	 *
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public function export($file, $language, $toPath)
	{
		$path = sprintf(
			'project/%s/export-file?key=%s&file=%s&language=%s',
			$this->getProjectId(),
			$this->getApiKey(),
			$file,
			$language
		);

		return $this->getHttpClient()
			->get($path, ['sink' => $toPath]);
	}
}
