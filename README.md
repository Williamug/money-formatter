# Money Formmatter

[![Latest Version on Packagist](https://img.shields.io/packagist/v/williamug/money-formatter.svg?style=flat-square)](https://packagist.org/packages/williamug/money-formatter/stats#major/all)
[![Total Downloads](https://img.shields.io/packagist/dt/williamug/money-formatter.svg?style=flat-square)](https://packagist.org/packages/williamug/money-formatter/)

A Simple way to format digits into currency/ money format.

## Installation

###### Note: before using the package, make sure that you have intl extension installed. Click [here](https://www.php.net/manual/en/intl.installation.php) to follow the steps

You can install the package via composer:

```bash
composer require williamug/money-formatter
```

## Usage

Use `@money` directive in your blade templates. Replace `10000` with any value or variable.

Example

```blade
@money(10000)
// 10,000.00

@money(123000)
// 123,000.00
```

If you want to convert an integer or amount of money into words. Use `@numbertowords` directive in your blade files.

Example:
```blade
@numbertowords(10000)
// ten thousand

@numbertowords(123000)
// one hundred twenty-three thousand
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [williamug](https://github.com/Williamug)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
