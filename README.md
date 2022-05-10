# A Simple way to format digits into currency format.

<!-- [![Latest Version on Packagist](https://img.shields.io/packagist/v/williamug/money-formatter.svg?style=flat-square)](https://packagist.org/packages/williamug/money-formatter/stats#major/all)
[![test](https://github.com/Williamug/money-formatter/actions/workflows/test.yml/badge.svg?branch=main)](https://github.com/Williamug/money-formatter/actions/workflows/test.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/williamug/money-formatter.svg?style=flat-square)](https://packagist.org/packages/williamug/money-formatter/) -->

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require williamug/money-formatter
```

## Usage

Use @money directive in your blade templates. Replace `10000` with any value.

Example

```php
@money(10000)
//10,000.00

@money(123000)
// 123,000.00
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
