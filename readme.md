# Crowdin API implementation in PHP

[![Build Status](https://travis-ci.org/elkuku/crowdin-api.svg?branch=master)](https://travis-ci.org/elkuku/crowdin-api) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/elkuku/crowdin-api/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/elkuku/crowdin-api/?branch=master) [![Latest Stable Version](https://poser.pugx.org/elkuku/crowdin-api/v/stable)](https://packagist.org/packages/elkuku/crowdin-api) [![Latest Unstable Version](https://poser.pugx.org/elkuku/crowdin-api/v/unstable)](https://packagist.org/packages/elkuku/crowdin-api) [![composer.lock available](https://poser.pugx.org/elkuku/crowdin-api/composerlock)](https://packagist.org/packages/elkuku/crowdin-api) [![Total Downloads](https://poser.pugx.org/elkuku/crowdin-api/downloads)](https://packagist.org/packages/elkuku/crowdin-api) 

Inspired by https://github.com/akeneo/php-crowdin-api

## Installation

`composer require elkuku/crowdin-api`

## Usage

```php
use ElKuKu\Crowdin\Crowdin;
use ElKuKu\Crowdin\Languagefile;

$crowdin = new Crowdin('{project-id}', '{api-key}');

// Add new translation file
$crowdin->file->add(new Languagefile('{local path}', '{crowdin path}'));

// Update a translation file
$crowdin->file->update(new Languagefile('{local path}', '{crowdin path}'));

// Export a translated file
$crowdin->file->export('{crowdin path}', '{language}', '{local path}');

// Delete a translation file
$crowdin->file->delete('{crowdin path}');

// Export (build) translation files on Crowdin
$crowdin->translation->export();

// Download a zip file containing all language files
$crowdin->translation->download('all.zip', '/local/path/to/package.zip');

```

## Methods Implemented

### Directory
* `add()` https://crowdin.com/page/api/add-directory
* `update()` https://crowdin.com/page/api/change-directory
* `delete()` https://crowdin.com/page/api/delete-directory

### File
* `add()` https://crowdin.com/page/api/add-file
* `update()` https://crowdin.com/page/api/update-file
* `delete()` https://crowdin.com/page/api/delete-file
* `export()` https://crowdin.com/page/api/export-file

### Translation
* `upload()` https://crowdin.com/page/api/upload-translation
* `export()` https://crowdin.com/page/api/export
* `download()` https://crowdin.com/page/api/download
* `getStatus()` https://crowdin.com/page/api/status

## @todo - Methods not implemented (yet)

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

