<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    WTFPL - See license.txt
 */

namespace ElKuKu\Crowdin;

/**
 * Language file class.
 *
 * @since  1.0.1
 */
class Languagefile
{
	/**
	 * The path on the local file system.
	 * @var string
	 */
	protected $localPath;

	/**
	 * The path at crowdin.
	 * @var string
	 */
	protected $crowdinPath;

	/**
	 * The language file title.
	 * @var string
	 */
	protected $title;

	/**
	 * The export pattern.
	 * @var string
	 */
	protected $exportPattern;

	/**
	 * Constructor.
	 *
	 * @param   string  $localPath    The path on the local file system.
	 * @param   string  $crowdinPath  The path on Crowdin.
	 */
	public function __construct(string $localPath, string $crowdinPath)
	{
		if (!file_exists($localPath))
		{
			throw new \InvalidArgumentException(sprintf('File %s does not exist', $localPath));
		}

		$this->localPath = $localPath;
		$this->crowdinPath = $crowdinPath;
	}

	/**
	 * Get the local path.
	 *
	 * @return string
	 */
	public function getLocalPath() : string
	{
		return $this->localPath ?: '';
	}

	/**
	 * Get the Crowdin path.
	 *
	 * @return string
	 */
	public function getCrowdinPath() : string
	{
		return $this->crowdinPath;
	}

	/**
	 * Set the export pattern.
	 *
	 * @param   string  $exportPattern  The export pattern.
	 *
	 * @return $this
	 */
	public function setExportPattern(string $exportPattern): self
    {
		$this->exportPattern = $exportPattern;

		return $this;
	}

	/**
	 * Get the export pattern.
	 *
	 * @return string
	 */
	public function getExportPattern() : string
	{
		return $this->exportPattern ?: '';
	}

	/**
	 * Set the title.
	 *
	 * @param   string  $title  The title.
	 *
	 * @return $this
	 */
	public function setTitle(string $title): self
    {
		$this->title = $title;

		return $this;
	}

	/**
	 * Get the title.
	 *
	 * @return string
	 */
	public function getTitle() : string
	{
		return $this->title ?: '';
	}
}
