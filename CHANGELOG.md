# Changelog

All notable changes to `money-formatter` will be documented in this file.

## [3.0.0] - 2025-12-01

### 🚀 MAJOR RELEASE - Complete Formatting Suite

This major release transforms the package from a simple money formatter into a **comprehensive formatting library** with 15+ professional formatters. This is a significant expansion that makes this the **ultimate Laravel formatting package**.

### Added - 13 New Formatters 🎉

#### Number Formatters
- **Percentage Formatter**: `percentage()` method and `@percentage` directive - format numbers as percentages with customizable decimals
- **Number Abbreviation**: `abbreviate()` method and `@abbreviate` directive - formats as 1K, 1.5M, 2.3B, 1T
- **Ordinal Numbers**: `ordinal()` method and `@ordinal` directive - formats as 1st, 2nd, 3rd, 4th (with smart handling of 11th, 12th, 13th)
- **Compact Number Formatter**: `compact()` method - locale-aware compact notation
- **Metric Formatter**: `metric()` method - formats numbers with SI prefixes (k, M, G, T, P, E)
- **Fraction Formatter**: `fraction()` method - converts decimals to fractions (0.5 → "1/2", 0.333 → "1/3")
- **Ordinal Words**: `ordinalWords()` method - spells out ordinal numbers (first, second, third)

#### Data Formatters
- **File Size Formatter**: `fileSize()` method and `@filesize` directive - converts bytes to human-readable format (KB/MB/GB/TB/PB)
- **Duration Formatter**: `duration()` method and `@duration` directive - converts seconds to human readable time (60 → "1 minute", 3665 → "1 hour, 1 minute")

#### Security & Contact Formatters
- **Phone Number Formatter**: `phone()` method and `@phone` directive - supports international "+1 (123) 456-7890", national "(123) 456-7890", and dots "123.456.7890" formats
- **Credit Card Formatter**: `creditCard()` method and `@creditcard` directive - securely masks card numbers ("**** **** **** 3456")

### Added - New Helper Functions
- `format_percentage($value, $decimals, $includeSign)` - Quick percentage formatting
- `format_filesize($bytes, $decimals)` - Quick file size formatting
- `abbreviate_number($number, $decimals)` - Quick number abbreviation
- `format_ordinal($number)` - Quick ordinal formatting (1 → "1st")
- `format_phone($phone, $format)` - Quick phone formatting
- `format_creditcard($cardNumber, $maskChar, $visibleDigits)` - Quick credit card masking
- `format_duration($seconds, $short)` - Quick duration formatting

### Added - New Blade Directives
- `@percentage(50)` → "50.00%"
- `@filesize(1024)` → "1.00 KB"
- `@abbreviate(1000000)` → "1.0M"
- `@ordinal(1)` → "1st"
- `@phone('1234567890')` → "+1 (123) 456-7890"
- `@creditcard('1234567890123456')` → "**** **** **** 3456"
- `@duration(3600)` → "1 hour"

### Added - Comprehensive Testing
- 32 new test cases covering all new formatters
- Dedicated test suites: `NewFormattersTest`, `NewHelpersTest`, `NewBladeDirectivesTest`
- Total: **63 tests passing** with **108 assertions**
- 100% test coverage for all formatters

### Added - Documentation
- Extensive README with examples for all 15+ formatters
- Usage examples for Blade directives, helpers, and Facade
- Real-world use case scenarios
- Complete API documentation

### Enhanced
- Updated `Money` facade with 17 methods
- Enhanced README with comprehensive feature list
- Improved package description for better discoverability
- Added CONTRIBUTING.md and SECURITY.md
- PHP 8.2, 8.3 & 8.4 support
- Orchestra Testbench 8, 9 & 10 support

### Breaking Changes
None - This is a fully backward-compatible major release. All existing functionality remains unchanged.

## [2.1.0] - 2025-12-01

### Added
- Configuration file for customizing formatting options
- `MoneyFormatter` class with fluent API
- `Money` facade for programmatic usage
- Helper functions: `format_money()`, `money_to_words()`, `format_currency()`, `parse_money()`
- New Blade directives: `@moneyWithSymbol`, `@currency`
- Support for multiple currencies and locales
- Configurable decimal places, separators, and currency symbols
- Parse formatted money strings back to float
- Laravel 10 & 11 support (stable and tested)
- Comprehensive test suite with 20+ tests
- GitHub Actions CI/CD workflow
- Extensive documentation and examples
### Changed
- Refactored Blade directives to use the MoneyFormatter class
- Updated service provider to support configuration publishing
- Improved number formatting with configurable options
### Fixed
- Added missing `NumberFormatter` import
- Fixed service provider class name in tests
- Fixed typo in package description (currancy → currency)
- Added Pest testing framework to dependencies

## [2.0.1] - Previous Release

### Changed
- Support for Laravel 10

## [2.0] - Previous Release

### Changed
- Support for Laravel 10

## [1.2] - Previous Release

### Changed
- Support for Laravel 10

## [1.0.1] - Previous Release

### Changed
- Support for Laravel 9

## [1.0.0] - Previous Release

### Added
- Initial release
- Basic `@money` directive
- Basic `@numbertowords` directive

## [0.1.0] - Initial Release

### Added
- First beta release
