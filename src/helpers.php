<?php

use Williamug\MoneyFormatter\MoneyFormatter;

if (! function_exists('format_money')) {
    /**
     * Format a number as money
     */
    function format_money(float|int|string $amount, ?string $currency = null): string
    {
        return app(MoneyFormatter::class)->format($amount, $currency);
    }
}

if (! function_exists('money_to_words')) {
    /**
     * Convert a number to words
     */
    function money_to_words(float|int $amount, ?string $locale = null): string
    {
        return app(MoneyFormatter::class)->toWords($amount, $locale);
    }
}

if (! function_exists('format_currency')) {
    /**
     * Format a number as currency with locale support
     */
    function format_currency(float|int|string $amount, ?string $currency = null, ?string $locale = null): string
    {
        return app(MoneyFormatter::class)->formatCurrency($amount, $currency, $locale);
    }
}

if (! function_exists('parse_money')) {
    /**
     * Parse a formatted money string back to float
     */
    function parse_money(string $formatted): float
    {
        return app(MoneyFormatter::class)->parse($formatted);
    }
}

if (! function_exists('format_percentage')) {
    /**
     * Format a number as percentage
     */
    function format_percentage(float|int $value, int $decimals = 2, bool $includeSign = true): string
    {
        return app(MoneyFormatter::class)->percentage($value, $decimals, $includeSign);
    }
}

if (! function_exists('format_filesize')) {
    /**
     * Format bytes to human readable file size
     */
    function format_filesize(int $bytes, int $decimals = 2): string
    {
        return app(MoneyFormatter::class)->fileSize($bytes, $decimals);
    }
}

if (! function_exists('abbreviate_number')) {
    /**
     * Abbreviate large numbers (1K, 1M, 1B)
     */
    function abbreviate_number(float|int $number, int $decimals = 1): string
    {
        return app(MoneyFormatter::class)->abbreviate($number, $decimals);
    }
}

if (! function_exists('format_ordinal')) {
    /**
     * Format ordinal numbers (1st, 2nd, 3rd)
     */
    function format_ordinal(int $number): string
    {
        return app(MoneyFormatter::class)->ordinal($number);
    }
}

if (! function_exists('format_phone')) {
    /**
     * Format phone number
     */
    function format_phone(string $phone, string $format = 'international'): string
    {
        return app(MoneyFormatter::class)->phone($phone, $format);
    }
}

if (! function_exists('format_creditcard')) {
    /**
     * Format/mask credit card number
     */
    function format_creditcard(string $cardNumber, string $maskChar = '*', int $visibleDigits = 4): string
    {
        return app(MoneyFormatter::class)->creditCard($cardNumber, $maskChar, $visibleDigits);
    }
}

if (! function_exists('format_duration')) {
    /**
     * Format seconds to human readable duration
     */
    function format_duration(int $seconds, bool $short = false): string
    {
        return app(MoneyFormatter::class)->duration($seconds, $short);
    }
}
