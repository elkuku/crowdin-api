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
 * Class Translation
 *
 * @since  1.0
 */
Class Translation extends Package
{
	/**
	 * Upload existing translations to your Crowdin project.
	 *
	 * @param   \ElKuKu\Crowdin\Translation  $translation             The translation object.
	 * @param   string                       $language                The language tag.
	 * @param   boolean                      $importDuplicates        IDK.
	 * @param   boolean                      $importEqualSuggestions  IDK.
	 * @param   boolean                      $autoImproveImports      IDK.
	 *
	 * @see https://crowdin.com/page/api/upload-translation
	 *
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public function upload(
		\ElKuKu\Crowdin\Translation $translation, $language, $importDuplicates = false,
		$importEqualSuggestions = false, $autoImproveImports = false)
	{
		$path = sprintf(
			'project/%s/upload-translation?key=%s',
			$this->getProjectId(),
			$this->getApiKey()
		);

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
			'name'     => 'files[' . $translation->getCrowdinPath() . ']',
			'contents' => fopen($translation->getLocalPath(), 'r')
		];

		return $this->getHttpClient()
			->post($path, ['multipart' => $data]);
	}

	/**
	 * Track overall translation and proofreading progresses of each target language.
	 * Default response format is XML.
	 *
	 * @see https://crowdin.com/page/api/status
	 *
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public function status()
	{
		$path = sprintf(
			'project/%s/status?key=%s',
			$this->getProjectId(),
			$this->getApiKey()
		);

		return $this->getHttpClient()
			->get($path);
	}
}
