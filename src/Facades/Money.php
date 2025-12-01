<?php

namespace Williamug\MoneyFormatter\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string format(float|int|string $amount, ?string $currency = null)
 * @method static string formatWithSymbol(float|int|string $amount, ?string $currency = null)
 * @method static string toWords(float|int $amount, ?string $locale = null)
 * @method static float parse(string $formatted)
 * @method static string formatCurrency(float|int|string $amount, ?string $currency = null, ?string $locale = null)
 * @method static string percentage(float|int $value, int $decimals = 2, bool $includeSign = true)
 * @method static string fileSize(int $bytes, int $decimals = 2)
 * @method static string abbreviate(float|int $number, int $decimals = 1)
 * @method static string ordinal(int $number)
 * @method static string phone(string $phone, string $format = 'international')
 * @method static string creditCard(string $cardNumber, string $maskChar = '*', int $visibleDigits = 4)
 * @method static string metric(float|int $number, int $decimals = 2, string $unit = '')
 * @method static string compact(float|int $number, ?string $locale = null)
 * @method static string duration(int $seconds, bool $short = false)
 * @method static string fraction(float $decimal, int $maxDenominator = 100)
 * @method static string ordinalWords(int $number, ?string $locale = null)
 * @method static \Williamug\MoneyFormatter\MoneyFormatter setLocale(string $locale)
 * @method static \Williamug\MoneyFormatter\MoneyFormatter setCurrency(string $currency)
 * @method static \Williamug\MoneyFormatter\MoneyFormatter setDecimals(int $decimals)
 *
 * @see \Williamug\MoneyFormatter\MoneyFormatter
 */
class Money extends Facade
{
  protected static function getFacadeAccessor(): string
  {
    return 'money-formatter';
  }
}
