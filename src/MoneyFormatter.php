<?php

namespace Williamug\MoneyFormatter;

use NumberFormatter as IntlNumberFormatter;

class MoneyFormatter
{
    protected string $locale;
    protected string $currency;
    protected int $decimals;
    protected string $thousandSeparator;
    protected string $decimalSeparator;
    protected bool $showSymbol;
    protected string $symbolPosition;
    protected array $currencySymbols;

    public function __construct()
    {
        $this->locale = config('money-formatter.default_locale', 'en_US');
        $this->currency = config('money-formatter.default_currency', 'USD');
        $this->decimals = config('money-formatter.decimals', 2);
        $this->thousandSeparator = config('money-formatter.thousand_separator', ',');
        $this->decimalSeparator = config('money-formatter.decimal_separator', '.');
        $this->showSymbol = config('money-formatter.show_symbol', false);
        $this->symbolPosition = config('money-formatter.symbol_position', 'before');
        $this->currencySymbols = config('money-formatter.currency_symbols', []);
    }

    /**
     * Format a number as money
     */
    public function format(float|int|string $amount, ?string $currency = null): string
    {
        $amount = (float) $amount;
        $currency = $currency ?? $this->currency;

        $formatted = number_format(
            $amount,
            $this->decimals,
            $this->decimalSeparator,
            $this->thousandSeparator
        );

        if ($this->showSymbol) {
            $symbol = $this->currencySymbols[$currency] ?? $currency;
            $formatted = $this->symbolPosition === 'before'
              ? $symbol . ' ' . $formatted
              : $formatted . ' ' . $symbol;
        }

        return $formatted;
    }

    /**
     * Format a number as money with currency symbol
     */
    public function formatWithSymbol(float|int|string $amount, ?string $currency = null): string
    {
        $amount = (float) $amount;
        $currency = $currency ?? $this->currency;
        $symbol = $this->currencySymbols[$currency] ?? $currency;

        $formatted = number_format(
            $amount,
            $this->decimals,
            $this->decimalSeparator,
            $this->thousandSeparator
        );

        return $this->symbolPosition === 'before'
          ? $symbol . ' ' . $formatted
          : $formatted . ' ' . $symbol;
    }

    /**
     * Convert a number to words
     */
    public function toWords(float|int $amount, ?string $locale = null): string
    {
        $locale = $locale ?? config('money-formatter.words_locale', 'en');
        $formatter = new IntlNumberFormatter($locale, IntlNumberFormatter::SPELLOUT);

        return $formatter->format($amount);
    }

    /**
     * Parse a formatted money string back to float
     */
    public function parse(string $formatted): float
    {
        // Remove currency symbols
        foreach ($this->currencySymbols as $symbol) {
            $formatted = str_replace($symbol, '', $formatted);
        }

        // Remove thousand separators and replace decimal separator
        $formatted = str_replace($this->thousandSeparator, '', $formatted);
        $formatted = str_replace($this->decimalSeparator, '.', $formatted);

        return (float) trim($formatted);
    }

    /**
     * Format as currency using locale
     */
    public function formatCurrency(float|int|string $amount, ?string $currency = null, ?string $locale = null): string
    {
        $amount = (float) $amount;
        $currency = $currency ?? $this->currency;
        $locale = $locale ?? $this->locale;

        $formatter = new IntlNumberFormatter($locale, IntlNumberFormatter::CURRENCY);

        return $formatter->formatCurrency($amount, $currency);
    }

    /**
     * Set locale
     */
    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Set currency
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Set decimals
     */
    public function setDecimals(int $decimals): self
    {
        $this->decimals = $decimals;

        return $this;
    }

    /**
     * Format a number as percentage
     */
    public function percentage(float|int $value, int $decimals = 2, bool $includeSign = true): string
    {
        $formatted = number_format($value, $decimals, $this->decimalSeparator, $this->thousandSeparator);

        return $includeSign ? $formatted . '%' : $formatted;
    }

    /**
     * Format file size (bytes to human readable)
     */
    public function fileSize(int $bytes, int $decimals = 2): string
    {
        if ($bytes === 0) {
            return '0 Bytes';
        }

        $units = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB'];
        $factor = floor((strlen((string) $bytes) - 1) / 3);
        $value = $bytes / pow(1024, $factor);

        return number_format($value, $decimals, $this->decimalSeparator, $this->thousandSeparator) . ' ' . $units[$factor];
    }

    /**
     * Abbreviate large numbers (1K, 1M, 1B, 1T)
     */
    public function abbreviate(float|int $number, int $decimals = 1): string
    {
        $number = (float) $number;

        if ($number < 1000) {
            return (string) $number;
        }

        $units = ['', 'K', 'M', 'B', 'T'];
        $factor = floor((strlen((string) abs((int) $number)) - 1) / 3);
        $value = $number / pow(1000, $factor);

        return number_format($value, $decimals, $this->decimalSeparator, '') . $units[$factor];
    }

    /**
     * Format ordinal numbers (1st, 2nd, 3rd, 4th)
     */
    public function ordinal(int $number): string
    {
        $ends = ['th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th'];

        if ((($number % 100) >= 11) && (($number % 100) <= 13)) {
            return $number . 'th';
        }

        return $number . $ends[$number % 10];
    }

    /**
     * Format phone number
     */
    public function phone(string $phone, string $format = 'international'): string
    {
        // Remove all non-numeric characters
        $cleaned = preg_replace('/[^0-9]/', '', $phone);

        if (empty($cleaned)) {
            return $phone;
        }

        $length = strlen($cleaned);

        // Format based on length and format type
        if ($format === 'international' && $length >= 10) {
            // International format: +1 (234) 567-8900
            if ($length === 10) {
                return sprintf("+1 (%s) %s-%s", substr($cleaned, 0, 3), substr($cleaned, 3, 3), substr($cleaned, 6));
            } elseif ($length === 11 && $cleaned[0] === '1') {
                return sprintf("+%s (%s) %s-%s", substr($cleaned, 0, 1), substr($cleaned, 1, 3), substr($cleaned, 4, 3), substr($cleaned, 7));
            }
        } elseif ($format === 'national' && $length >= 10) {
            // National format: (234) 567-8900
            return sprintf("(%s) %s-%s", substr($cleaned, 0, 3), substr($cleaned, 3, 3), substr($cleaned, 6));
        } elseif ($format === 'dots' && $length >= 10) {
            // Dots format: 234.567.8900
            return sprintf("%s.%s.%s", substr($cleaned, 0, 3), substr($cleaned, 3, 3), substr($cleaned, 6));
        }

        return $phone; // Return original if can't format
    }

    /**
     * Format credit card number (mask digits)
     */
    public function creditCard(string $cardNumber, string $maskChar = '*', int $visibleDigits = 4): string
    {
        $cleaned = preg_replace('/[^0-9]/', '', $cardNumber);
        $length = strlen($cleaned);

        if ($length < 8) {
            return $cardNumber; // Too short to mask safely
        }

        $masked = str_repeat($maskChar, $length - $visibleDigits) . substr($cleaned, -$visibleDigits);

        // Add spaces every 4 digits
        return implode(' ', str_split($masked, 4));
    }

    /**
     * Format number with metric prefix (SI units)
     */
    public function metric(float|int $number, int $decimals = 2, string $unit = ''): string
    {
        $number = (float) $number;
        $prefixes = ['', 'k', 'M', 'G', 'T', 'P', 'E'];

        if ($number < 1000) {
            return number_format($number, $decimals, $this->decimalSeparator, $this->thousandSeparator) . $unit;
        }

        $factor = floor(log(abs($number), 1000));
        $value = $number / pow(1000, $factor);

        return number_format($value, $decimals, $this->decimalSeparator, '') . $prefixes[$factor] . $unit;
    }

    /**
     * Format number as compact notation
     */
    public function compact(float|int $number, ?string $locale = null): string
    {
        $locale = $locale ?? $this->locale;
        $formatter = new IntlNumberFormatter($locale, IntlNumberFormatter::DECIMAL);
        $formatter->setAttribute(IntlNumberFormatter::FRACTION_DIGITS, 1);
        $formatter->setTextAttribute(IntlNumberFormatter::POSITIVE_PREFIX, '');

        if (abs($number) >= 1000000000) {
            return $formatter->format($number / 1000000000) . 'B';
        } elseif (abs($number) >= 1000000) {
            return $formatter->format($number / 1000000) . 'M';
        } elseif (abs($number) >= 1000) {
            return $formatter->format($number / 1000) . 'K';
        }

        return (string) $number;
    }

    /**
     * Format duration in seconds to human readable
     */
    public function duration(int $seconds, bool $short = false): string
    {
        $units = [
          'year' => 31536000,
          'month' => 2592000,
          'week' => 604800,
          'day' => 86400,
          'hour' => 3600,
          'minute' => 60,
          'second' => 1,
        ];

        $parts = [];

        foreach ($units as $name => $divisor) {
            $value = floor($seconds / $divisor);
            if ($value > 0) {
                $parts[] = $short
                  ? $value . substr($name, 0, 1)
                  : $value . ' ' . ($value == 1 ? $name : $name . 's');
                $seconds %= $divisor;
            }

            if (count($parts) >= 2) {
                break; // Show only 2 most significant units
            }
        }

        return empty($parts) ? '0 seconds' : implode(', ', $parts);
    }

    /**
     * Format decimal number as fraction
     */
    public function fraction(float $decimal, int $maxDenominator = 100): string
    {
        if ($decimal == 0) {
            return '0';
        }

        $whole = floor(abs($decimal));
        $decimal = abs($decimal) - $whole;

        if ($decimal == 0) {
            return (string) ($whole * ($decimal < 0 ? -1 : 1));
        }

        $tolerance = 1.0e-6;
        $numerator = 1;
        $denominator = 1;

        for ($i = 1; $i <= $maxDenominator; $i++) {
            $fraction = $numerator / $denominator;
            if (abs($decimal - $fraction) < $tolerance) {
                break;
            }

            if ($fraction < $decimal) {
                $numerator++;
            } else {
                $denominator++;
                $numerator = round($decimal * $denominator);
            }
        }

        $result = $whole > 0 ? "$whole $numerator/$denominator" : "$numerator/$denominator";

        return $result;
    }

    /**
     * Format a number with spelled out words (ordinal)
     */
    public function ordinalWords(int $number, ?string $locale = null): string
    {
        $locale = $locale ?? $this->locale;
        $formatter = new IntlNumberFormatter($locale, IntlNumberFormatter::ORDINAL);

        return $formatter->format($number);
    }
}
