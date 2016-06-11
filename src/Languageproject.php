<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    GNU General Public License version 2 or later
 */

namespace ElKuKu\Crowdin;

/**
 * Project class.
 *
 * @since  1.0.7
 */
class Languageproject
{
	/**
	 * Project name.
	 * @var string
	 */
	public $name;

	/**
	 * Project identifier. Should be unique among other Crowdin projects.
	 * @var string
	 */
	public $identifier;

	/**
	 * Source files language. Should be a two letters language code.
	 * @var string
	 */
	public $source_language;

	/**
	 * An array of language codes project should be translate to.
	 * @var array
	 */
	public $languages = [];

	/**
	 * Project join policy. Acceptable values are: open, private
	 * @var string
	 */
	public $join_policy;

	/**
	 * Defines how project members can access target languages. Acceptable values are:
	 * - "open" - any translator can access any language. (default)
	 * - "moderate" - translator should be granted with access to certain language.
	 * @var string
	 */
	public $language_access_policy;

	/**
	 * Defines whether duplicated strings should be displayed to translators or should be hidden and translated automatically.
	 * Acceptable values are: 1 or 0.
	 * @var boolean
	 */
	public $hide_duplicates;

	/**
	 * Defines whether only translated strings will be exported to the final file. We do not recommend to set this
	 * option if you have text (*.html, *.txt, *.docx etc.) documents in your project since it may damage resulted files.
	 * Acceptable values are: 1 or 0.
	 * @var boolean
	 */
	public $export_translated_only;

	/**
	 * If set to 1 only approved translations will be exported in resulted ZIP file.
	 * Acceptable values are: 1 or 0.
	 * @var boolean
	 */
	public $export_approved_only;

	/**
	 * Untranslated strings of dialect will be translated automatically in exported file, leveraging translations from main language.
	 * Acceptable values are: 1 or 0.
	 * @var boolean
	 */
	public $auto_translate_dialects;

	/**
	 * Defines whether "Download" button visible to everyone on Crowdin webpages.
	 * Acceptable values are: 1 or 0.
	 * @var boolean
	 */
	public $public_downloads;

	/**
	 * Defines if translations would be leveraged from Crowdin Global Translation Memory.
	 * When using this option any translations made in your project will be commited to Crowdin Global TM automatically.
	 * Acceptable values are: 1 or 0.
	 * @var boolean
	 */
	public $use_global_tm;

	/**
	 * Project logo at Crowdin.
	 * @var string
	 */
	public $logo;

	/**
	 * Custom domain name for Crowdin project.
	 * @var string
	 */
	public $cname;

	/**
	 * Project description.
	 * @var string
	 */
	public $description;

	/**
	 * Defines whether the In-Context should be active in the project.
	 * Acceptable values are: 1 or 0.
	 * @var boolean
	 */
	public $in_context;

	/**
	 * Specify the language code for the In-Context's pseudo-language that will store some operational data.
	 * @var string
	 */
	public $pseudo_language;

	/**
	 * Open this URL when one of the project files is translated.
	 * URL will be opened with "project" - project identifier, "language" - language code, "file_id" - Crowdin file identifier and "file" - file name.
	 * @var string
	 */
	public $webhook_file_translated;

	/**
	 * Open this URL when one of the project files is proofread.
	 * URL will be opened with "project" - project identifier, "language" - language code, "file_id" - Crowdin file identifier and "file" - file name.
	 * @var string
	 */
	public $webhook_file_proofread;

	/**
	 * Open this URL when project translation is complete. URL will be opened with "project" - project identifier and "language" - language code.
	 * @var string
	 */
	public $webhook_project_translated;

	/**
	 * Open this URL when project proofreading is complete. URL will be opened with "project" - project identifier and "language" - language code.
	 * @var string
	 */
	public $webhook_project_proofread;

	/**
	 * Convert tye object to query string.
	 *
	 * @return array
	 */
	public function toQuery()
	{
		$array = [];

		foreach (get_object_vars($this) as $name => $value)
		{
			if (null === $value)
			{
				continue;
			}

			if (is_array($value))
			{
				if (count($value))
				{
					foreach ($value as $v)
					{
						$array[] = [
							'name'     => $name . '[]',
							'contents' => $v
						];
					}
				}
			}
			else
			{
				$array[] = [
					'name'     => $name,
					'contents' => $value
				];
			}
		}

		return $array;
	}
}
