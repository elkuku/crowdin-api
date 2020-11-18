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
 * Class Directory
 *
 * @since  1.0.3
 */
class Directory extends Package
{
    /**
     * Add directory to Crowdin project.
     *
     * @param string $name The name of the directory to add.
     * @param boolean $isBranch If set to 1 the directory will be marked as a version branch.
     *                              Acceptable values are: 1 or 0.
     * @param string $branch The name of related version branch.
     *
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @see https://crowdin.com/page/api/add-directory
     * @since  1.0.3
     *
     */
    public function add(string $name, bool $isBranch = false, string $branch = ''): ResponseInterface
    {
        $parameters = ['name' => $name];

        if ($isBranch) {
            $parameters['is_branch'] = '1';
        }

        if ($branch) {
            $parameters['branch'] = $branch;
        }

        return $this->getHttpClient()
            ->post($this->getBasePath('add-directory'), ['form_params' => $parameters]);
    }

    /**
     * Rename directory or modify its attributes.
     * When renaming directory the path can not be changed
     * (it means new_name parameter can not contain path, name only).
     *
     * @param string $name Full directory path that should be modified (e.g. /MainPage/AboutUs).
     * @param string $newName New directory name.
     * @param string $title New directory title to be displayed in Crowdin UI.
     * @param string $exportPattern New directory export pattern.
     *                                  Is used to create directory name and path in resulted translations bundle.
     * @param string $branch The name of related version branch.
     *
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @see   https://crowdin.com/page/api/change-directory
     * @since 1.0.3
     *
     */
    public function update(
        string $name,
        string $newName = '',
        string $title = '',
        string $exportPattern = '',
        string $branch = ''
    ): ResponseInterface {
        $data = ['name' => $name];

        if ($newName) {
            $data['new_name'] = $newName;
        }

        if ($title) {
            $data['title'] = $title;
        }

        if ($exportPattern) {
            $data['export_pattern'] = $exportPattern;
        }

        if ($branch) {
            $data['branch'] = $branch;
        }

        return $this->getHttpClient()
            ->post($this->getBasePath('change-directory'), ['form_params' => $data]);
    }

    /**
     * Delete Crowdin project directory.
     * All nested files and directories will be deleted too.
     *
     * @param string $name The name of the directory to delete.
     *
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @see   https://crowdin.com/page/api/delete-directory
     * @since 1.0.3
     *
     */
    public function delete(string $name): ResponseInterface
    {
        return $this->getHttpClient()
            ->post($this->getBasePath('delete-directory'), ['form_params' => ['name' => $name]]);
    }
}
