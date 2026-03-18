# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), and this project adheres to 
[Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [4.0.0] - 2026-03-18

### Changed

- Update dependencies to support PHP 8.2 and higher.
- Replace psalm with phpstan for static analysis.
- Add ECS for code style checks.

## [3.0.0] - 2021-09-14

### Changed

- The minimal required PHP version is bumped to PHP 7.4.
- Changed the namespace to `Vdhicts\Replacer`.

## [2.0.0] - 2019-12-11

### Added

- Add this changelog to this package.

### Changed

- Change `setOpenDelimiter` and `setCloseDelimiter` to be fluent.
- Move the `data` parameter to the `process` method so multiple templates can be rendered with the same `Replacer` 
instance.

## [1.0.0] - 2018-02-19

### Added

- Initial release
