# This package helps you format currancy by adding commas

[![Latest Version on Packagist](https://img.shields.io/packagist/v/williamug/money-formatter.svg?style=flat-square)](https://packagist.org/packages/williamug/money-formatter)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/williamug/money-formatter/run-tests?label=tests)](https://github.com/williamug/money-formatter/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/williamug/money-formatter/Check%20&%20fix%20styling?label=code%20style)](https://github.com/williamug/money-formatter/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/williamug/money-formatter.svg?style=flat-square)](https://packagist.org/packages/williamug/money-formatter)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require williamug/money-formatter
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="money-formatter-config"
```

## Usage

Use @money directive in your bladd templates.

```php
@money(10000)
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [williamug](https://github.com/Williamug)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.