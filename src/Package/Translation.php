<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    WTFPL - See license.txt
 */

namespace ElKuKu\Crowdin\Package;

use ElKuKu\Crowdin\
{
	Languagefile, Package
};

use Psr\Http\Message\ResponseInterface;

/**
 * Class Translation
 *
 * @since  1.0
 */
Class Translation extends Package
{
	/**
	 * Upload existing translations to your Crowdin project.
	 *
	 * @param   Languagefile  $languagefile            The translation object.
	 * @param   string        $language                The language tag.
	 * @param   boolean       $importDuplicates        Defines whether to add translation if there is
	 *                                                 the same translation previously added.
	 *                                                 Acceptable values are: 0 or 1. Default is 0.
	 * @param   boolean       $importEqualSuggestions  Defines whether to add translation if it is equal to
	 *                                                 source string at Crowdin.
	 *                                                 Acceptable values are: 0 or 1. Default is 0.
	 * @param   boolean       $autoImproveImports      Mark uploaded translations as approved.
	 *                                                 Acceptable values are: 0 or 1. Default is 0.
	 *
	 * @see     https://crowdin.com/page/api/upload-translation
	 * @since   1.0.1
	 *
	 * @return ResponseInterface
	 */
	public function upload(
		Languagefile $languagefile, string $language, bool $importDuplicates = false,
		bool $importEqualSuggestions = false, bool $autoImproveImports = false) : ResponseInterface
	{
		$data = [];

		$data[] = [
			'name'     => 'import_duplicates',
			'contents' => (int) $importDuplicates
		];

		$data[] = [
			'name'     => 'import_eq_suggestions',
			'contents' => (int) $importEqualSuggestions
		];

		$data[] = [
			'name'     => 'auto_approve_imported',
			'contents' => (int) $autoImproveImports
		];

		$data[] = [
			'name'     => 'language',
			'contents' => $language
		];

		$data[] = [
			'name'     => 'files[' . $languagefile->getCrowdinPath() . ']',
			'contents' => fopen($languagefile->getLocalPath(), 'r')
		];

		return $this->getHttpClient()
			->post($this->getBasePath('upload-translation'), ['multipart' => $data]);
	}

	/**
	 * Build ZIP archive with the latest translations. Please note that this method can be invoked
	 * only once per 30 minutes (there is no such restriction for organization plans). Also API
	 * call will be ignored if there were no changes in the project since previous export. You can
	 * see whether ZIP archive with latest translations was actually build by status attribute
	 * ("built" or "skipped") returned in response.
	 *
	 * @param   string  $branch  The name of related version branch.
	 *
	 * @since 1.0.4
	 * @see   https://crowdin.com/page/api/export
	 *
	 * @return ResponseInterface
	 */
	public function export(string $branch = '') : ResponseInterface
	{
		$path = $this->getBasePath('export');

		if ($branch)
		{
			$path .= '&branch=' . $branch;
		}

		return $this->getHttpClient()
			->get($path);
	}

	/**
	 * Download ZIP file with translations. You can choose the language of translation
	 * you need or download all of them at once.
	 * Note: If you would like to download the most recent translations you may want
	 * to use export API method before downloading.
	 *
	 * @param   string  $package  Language code or "all" to download a bundle with translations to all languages.
	 * @param   string  $toPath   Local path where to download the translation package.
	 * @param   string  $branch   The name of related version branch.
	 *
	 * @since 1.0.4
	 * @see   https://crowdin.com/page/api/download
	 *
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public function download(string $package, string $toPath, string $branch = '') : ResponseInterface
	{
		$path = sprintf(
			'project/%s/download/%s?key=%s',
			$this->getProjectId(),
			$package,
			$this->getApiKey()
		);

		if ($branch)
		{
			$path .= '&branch=' . $branch;
		}

		return $this->getHttpClient()
			->get($path, ['sink' => $toPath]);
	}

	/**
	 * Track overall translation and proofreading progresses of each target language.
	 * Default response format is XML.
	 *
	 * @see    https://crowdin.com/page/api/status
	 * @since  1.0.4
	 *
	 * @return ResponseInterface
	 */
	public function getStatus() : ResponseInterface
	{
		return $this->getHttpClient()
			->get($this->getBasePath('status'));
	}
}
