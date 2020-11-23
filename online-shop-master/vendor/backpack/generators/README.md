# Backpack Generators

[![Latest Version on Packagist](https://img.shields.io/packagist/v/backpack/generators.svg?style=flat-square)](https://packagist.org/packages/backpack/generators)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/laravel-backpack/generators/master.svg?style=flat-square)](https://travis-ci.org/laravel-backpack/generators)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/laravel-backpack/generators.svg?style=flat-square)](https://scrutinizer-ci.com/g/laravel-backpack/generators/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/laravel-backpack/generators.svg?style=flat-square)](https://scrutinizer-ci.com/g/laravel-backpack/generators)
[![Style CI](https://styleci.io/repos/53490941/shield)](https://styleci.io/repos/53490941)
[![Total Downloads](https://img.shields.io/packagist/dt/backpack/generators.svg?style=flat-square)](https://packagist.org/packages/backpack/generators)

Quickly generate Backpack templated Models, Requests, Views and Config files.

**[Subscribe to the newsletter](http://eepurl.com/bUEGjf) to be notified of major updates or breaking changes.** 

## Install

Via Composer

``` bash
$ composer require backpack/generators
```

Add this to your config/app.php, under "providers":

```php
Backpack\Generators\GeneratorsServiceProvider::class,
```

## Usage

Open the console and enter one of the commands to generate:

- Models (available options: --softdelete)

``` bash
$ php artisan backpack:model
```

- Requests

``` bash
$ php artisan backpack:request
```

- Views (available options: --plain)

``` bash
$ php artisan backpack:view
```

- Config files

``` bash
$ php artisan backpack:config
```

- All files for a new Backpack\CRUD interface:

``` bash
$ php artisan backpack:crud {Entity_name}
```

- A new Backpack\CRUD file:
``` bash
$ php artisan backpack:crud-controller {Entity_name}
$ php artisan backpack:crud-model {Entity_name}
$ php artisan backpack:crud-request {Entity_name}
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Cristian Tone](http://updivision.com)
- [All Contributors](link-contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
