# Crowdin API implementation in PHP

Inspired by https://github.com/akeneo/php-crowdin-api

## Installation

`composer require elkuku/crowdin-api`

## Usage

```php
use ElKuKu\Crowdin\Crowdin;
use ElKuKu\Crowdin\Languagefile;

$projectId = 'project-id';
$apiKey = 'project-api-key';

$crowdin = new Crowdin($projectId, $apiKey);

// Add new translation file
$crowdin->file->add(new Languagefile('{local path}', '{crowdin path}'));

// Update a translation file
$crowdin->file->update(new Languagefile('{local path}', '{crowdin path}'));

// Export a translated file
$crowdin->file->export('{crowdin path}', '{language}', '{local path}');

// Delete a translation file
$crowdin->file->delete('{crowdin path}');
```

## Methods Implemented

### File
* `add()` https://crowdin.com/page/api/add-file
* `update()` https://crowdin.com/page/api/update-file
* `delete()` https://crowdin.com/page/api/delete-file
* `export()` https://crowdin.com/page/api/export-file

### Translation
* `upload()` https://crowdin.com/page/api/upload-translation
* `status()` https://crowdin.com/page/api/status

## @todo - Methods not implemented (yet)

### Directory
	add
	change
	delete
### Translation
	export
	download
### Project
	create
	edit
	delete
	info
	account
### TM
	download
	upload
### Glossary
	download
	upload
### Language
	supported
	status

