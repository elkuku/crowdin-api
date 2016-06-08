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
 * Class Project
 *
 * @since  1.0.5
 */
Class Project extends Package
{
	/**
	 * Get Crowdin Project details.
	 *
	 * @since 1.0.5
	 * @see   https://crowdin.com/page/api/info
	 *
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public function getInfo()
	{
		return $this->getHttpClient()
			->post($this->getBasePath('info'));
	}

	/**
	 * Delete Crowdin project with all translations.
	 *
	 * @since 1.0.5
	 * @see   https://crowdin.com/page/api/delete-project
	 *
	 * @return \Psr\Http\Message\ResponseInterface
	 */
	public function delete()
	{
		return $this->getHttpClient()
			->get($this->getBasePath('delete-project'));
	}
}
