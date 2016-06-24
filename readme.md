# Crowdin API implementation in PHP

[![Build Status](https://travis-ci.org/elkuku/crowdin-api.svg?branch=master)](https://travis-ci.org/elkuku/crowdin-api) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/elkuku/crowdin-api/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/elkuku/crowdin-api/?branch=master) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/f8cf4234-e131-4d5d-a2dd-13da3a039c89/mini.png)](https://insight.sensiolabs.com/projects/f8cf4234-e131-4d5d-a2dd-13da3a039c89) [![Code Coverage](https://scrutinizer-ci.com/g/elkuku/crowdin-api/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/elkuku/crowdin-api/?branch=master) [Report](https://elkuku.github.io/crowdin-api/coverage/) [![Latest Stable Version](https://poser.pugx.org/elkuku/crowdin-api/v/stable)](https://packagist.org/packages/elkuku/crowdin-api) [![WTFPL](http://www.wtfpl.net/wp-content/uploads/2012/12/wtfpl-badge-4.png)](http://www.wtfpl.net/)

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

// Export a translated file
$crowdin->file->export('{crowdin path}', '{language}', '{local path}');

// Delete a translation file
$crowdin->file->delete('{crowdin path}');

// Export (build) translation files on Crowdin
$crowdin->translation->export();

// Download a zip file containing all language files
$crowdin->translation->download('all.zip', '/local/path/to/package.zip');
```

**Note:** There is fluent auto complete and lots of doc blocks, taken from the official API documentation.

... to make life easy in your IDE :wink:

![Auto complete](/../gh-pages/images/shot-1.png?raw=true "Auto complete")

![Documentation](/../gh-pages/images/shot-2.png?raw=true "Documentation")

## Methods

[API Documentation](https://elkuku.github.io/crowdin-api/docs/)

### Project
* `create()` https://crowdin.com/page/api/create-project
* `edit()` https://crowdin.com/page/api/edit-project
* `delete()` https://crowdin.com/page/api/delete-project
* `getInfo()` https://crowdin.com/page/api/info
* `getList()` https://crowdin.com/page/api/get-projects

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

### Language
* `getSupported()` https://crowdin.com/page/api/supported-languages
* `getStatus()` https://crowdin.com/page/api/language-status

### Memory
* `download()` https://crowdin.com/page/api/download-tm
* `upload()` https://crowdin.com/page/api/upload-tm

### Glossary
* `download()` https://crowdin.com/page/api/download-glossary
* `upload()` https://crowdin.com/page/api/upload-glossary

# hF
`=;)`
