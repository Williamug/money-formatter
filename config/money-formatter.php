<?php

return [
  /*
    |--------------------------------------------------------------------------
    | Default Currency Settings
    |--------------------------------------------------------------------------
    |
    | Configure the default currency formatting options for your application.
    |
    */

  'default_locale' => 'en_US',

  'default_currency' => 'USD',

  /*
    |--------------------------------------------------------------------------
    | Decimal Places
    |--------------------------------------------------------------------------
    |
    | The number of decimal places to display in formatted money.
    |
    */

  'decimals' => 2,

  /*
    |--------------------------------------------------------------------------
    | Thousand Separator
    |--------------------------------------------------------------------------
    |
    | The character used to separate thousands.
    |
    */

  'thousand_separator' => ',',

  /*
    |--------------------------------------------------------------------------
    | Decimal Separator
    |--------------------------------------------------------------------------
    |
    | The character used as decimal point.
    |
    */

  'decimal_separator' => '.',

  /*
    |--------------------------------------------------------------------------
    | Currency Symbol
    |--------------------------------------------------------------------------
    |
    | Whether to show currency symbol and its position.
    |
    */

  'show_symbol' => false,

  'symbol_position' => 'before', // 'before' or 'after'

  /*
    |--------------------------------------------------------------------------
    | Number to Words Locale
    |--------------------------------------------------------------------------
    |
    | The locale used for converting numbers to words.
    |
    */

  'words_locale' => 'en',

  /*
    |--------------------------------------------------------------------------
    | Currency Symbols
    |--------------------------------------------------------------------------
    |
    | Map of currency codes to their symbols.
    |
    */

  'currency_symbols' => [
    'USD' => '$',
    'EUR' => '€',
    'GBP' => '£',
    'JPY' => '¥',
    'UGX' => 'UGX',
    'KES' => 'KSh',
    'TZS' => 'TSh',
    'ZAR' => 'R',
  ],
];
