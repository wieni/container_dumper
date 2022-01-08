Container Dumper
======================

[![Latest Stable Version](https://poser.pugx.org/wieni/container_dumper/v/stable)](https://packagist.org/packages/wieni/container_dumper)
[![Total Downloads](https://poser.pugx.org/wieni/container_dumper/downloads)](https://packagist.org/packages/wieni/container_dumper)
[![License](https://poser.pugx.org/wieni/container_dumper/license)](https://packagist.org/packages/wieni/container_dumper)

> Dumps the Drupal container to a file for use with static analysers.

## Why?
This package requires PHP 7.2 and Drupal 8 or higher. It can be installed using Composer:

```bash
 composer require drupal/container_dumper
```

## How does it work?
### Configuration
Once enabled, you can configure the module through the settings form at
`/admin/config/development/container-dumper`. 

To change the configuration of the module, users need the permission
`administer container dumper settings`.

The container is dumped to the configured path after every cache rebuild.

## Contributing
- [Wieni Code Style](https://github.com/wieni/wmcodestyle) is used by the project. The included `composer coding-standards` script can be used to validate the conventions.
- Tests are encouraged. This project doesn't have any test coverage yet, but contributions are welcome.
- Keep the documentation up to date. Make sure README.md and other relevant documentation is kept up to date with your changes.
- One pull request per feature. Try to keep your changes focused on solving a single problem. This will make it easier for us to review the change and easier for you to make sure you have updated the necessary tests and documentation.

## Changelog
All notable changes to this project will be documented in the
[CHANGELOG](CHANGELOG.md) file.

## Security
If you discover any security-related issues, please email
[security@wieni.be](mailto:security@wieni.be) instead of using the issue
tracker.
