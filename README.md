# Replacer

This package allows you to easily replace values in text for templating purposes, like email messages from the database.

## Requirements

This package requires PHP 7.4+.

## Installation

Install the package with composer:

`composer require vdhicts/replacer`

## Usage

```php
$text = 'Hello [USERNAME]!';
$data = [
    'username' => 'World'
];

$replacer = new Replacer();
$replacer->process($text, $data);
```

### Custom delimiters

When initialising the `Replacer`, custom delimiters can be provided.

```php
$text = 'Hello %USERNAME#!';
$data = [
    'username' => 'World'
];

$replacer = new Replacer('%', '#');
$replacer->process($text, $data);
```

The delimiters can also be provided after initialising:

```php
$replacer
    ->setOpenDelimiter('%')
    ->setCloseDelimiter('#');
```

## Tests

Full code coverage unit tests are available in the tests folder. Run via phpunit:

`vendor\bin\phpunit`

By default a coverage report will be generated in the build/coverage folder.

## Contribution

Any contribution is welcome, but it should be fully tested, meet the PSR-2 standard and please create one pull request 
per feature. In exchange you will be credited as contributor on this page.

## Security

If you discover any security related issues in this or other packages of Vdhicts, please email security@vdhicts.nl 
instead of using the issue tracker.

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

## About vdhicts

[Vdhicts](https://www.vdhicts.nl) is the name of my personal company. Vdhicts develops and implements IT solutions for
businesses and educational institutions.
