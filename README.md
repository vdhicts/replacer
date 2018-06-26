# Replacer

Dicms package to easily replace values in text for templating purposes, like email messages from the database.

## Requirements

This package requires PHP 7.0+ but there's a [`php56`](https://github.com/vdhicts/dicms-replacer/tree/php56) branch available for users which need PHP 5.6 compatibility. The `php56` branch won't receive any new features.

## Installation

Provide code examples and explanations of how to get the project:

`composer require vdhicts/replacer`

## Usage

```php
$text = 'Hello [USERNAME]!';
$data = [
    'username' => 'World'
];

$replacer = new Replacer($data);
$replacer->process($text);
```

The data can also be provided after initialising:

```php
$replacer->setData($data);
```

### Custom delimiters

When initialising the `Replacer`, custom delimiters can be provided.

```php
$text = 'Hello %USERNAME#!';
$data = [
    'username' => 'World'
];

$replacer = new Replacer($data, '%', '#');
$replacer->process($text);
```

The delimiters can also be provided after initialising:

```php
$replacer->setOpenDelimiter('%');
$replacer->setCloseDelimiter('#');
```

## Tests

Full code coverage unit tests are available in the tests folder. Run via phpunit:

`vendor\bin\phpunit`

By default a coverage report will be generated in the build/coverage folder.

## Contribution

Any contribution is welcome, but it should be fully tested, meet the PSR-2 standard and please create one pull request 
per feature. In exchange you will be credited as contributor on this page.

## Security

If you discover any security related issues in this or other packages of Vdhicts, please email info@vdhicts.nl instead
of using the issue tracker.

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

## About vdhicts

[Van der Heiden ICT services](https://www.vdhicts.nl) is the name of my personal company for which I work as 
freelancer. Van der Heiden ICT services develops and implements IT solutions for businesses and educational 
institutions.
