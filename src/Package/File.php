<?php
/**
 * Crowdin API implementation in PHP.
 *
 * @copyright  Copyright (C) 2016 Nikolai Plath (elkuku)
 * @license    WTFPL - See license.txt
 */

namespace ElKuKu\Crowdin\Package;

use ElKuKu\Crowdin\{Languagefile, Package};
use Psr\Http\Message\ResponseInterface;

/**
 * Class File
 *
 * @since  1.0
 */
class File extends Package
{
    /**
     * Add new file to Crowdin project.
     *
     * @param Languagefile $languagefile The translation file object
     * @param string $type The type.
     * @param string $branch The branch.
     *
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @see https://crowdin.com/page/api/add-file
     * @since  1.0
     *
     */
    public function add(Languagefile $languagefile, string $type = '', string $branch = ''): ResponseInterface
    {
        $data = [];

        if ($type) {
            $data[] = [
                'name' => 'type',
                'contents' => $type,
            ];
        }

        if ($branch) {
            $data[] = [
                'name' => 'branch',
                'contents' => $branch,
            ];
        }

        $data = $this->processLanguageFile($data, $languagefile);

        return $this->getHttpClient()
            ->post($this->getBasePath('add-file'), ['multipart' => $data]);
    }

    /**
     * Upload latest version of your localization file to Crowdin.
     *
     * @param Languagefile $languagefile The translation file object
     * @param string $branch The branch.
     *
     * @return ResponseInterface
     * @since  1.0
     *
     * @see https://crowdin.com/page/api/update-file
     */
    public function update(Languagefile $languagefile, $branch = ''): ResponseInterface
    {
        $data = [];

        if ($branch) {
            $data[] = [
                'name' => 'branch',
                'contents' => $branch,
            ];
        }

        $data = $this->processLanguageFile($data, $languagefile);

        return $this->getHttpClient()
            ->post($this->getBasePath('update-file'), ['multipart' => $data]);
    }

    /**
     * Delete file from Crowdin project. All the translations will be lost without ability to restore them.
     *
     * @param Languagefile $file The file to delete.
     *
     * @return ResponseInterface
     * @since  1.0
     *
     * @see https://crowdin.com/page/api/delete-file
     */
    public function delete(Languagefile $file): ResponseInterface
    {
        return $this->getHttpClient()
            ->post($this->getBasePath('delete-file'), ['form_params' => ['file' => $file->getCrowdinPath()]]);
    }

    /**
     * This method exports single translated files from Crowdin.
     * Additionally, it can be applied to export XLIFF files for offline localization. (@param string $file The file name.
     * @param string $language The language tag.
     * @param string $toPath Export to path.
     *
     * @return ResponseInterface
     * @see    https://crowdin.com/page/api/export-file
     * @since  1.0
     *
     * @todo)
     *
     */
    public function export(string $file, string $language, string $toPath): ResponseInterface
    {
        $path = sprintf(
            '%s&file=%s&language=%s',
            $this->getBasePath('export-file'),
            $file,
            $language
        );

        return $this->getHttpClient()
            ->get($path, ['sink' => $toPath]);
    }

    /**
     * Process a language file.
     *
     * @param array $data Data array.
     * @param Languagefile $languagefile The language file object.
     *
     * @return array
     */
    private function processLanguageFile(array $data, Languagefile $languagefile): array
    {
        $data[] = [
            'name' => 'files[' . $languagefile->getCrowdinPath() . ']',
            'contents' => fopen($languagefile->getLocalPath(), 'r'),
        ];

        if ($languagefile->getTitle()) {
            $data[] = [
                'name' => 'titles[' . $languagefile->getCrowdinPath() . ']',
                'contents' => $languagefile->getTitle(),
            ];
        }

        if ($languagefile->getExportPattern()) {
            $data[] = [
                'name' => 'export_patterns[' . $languagefile->getCrowdinPath() . ']',
                'contents' => $languagefile->getExportPattern(),
            ];
        }

        return $data;
    }
}
