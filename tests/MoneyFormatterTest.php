<?php

use Williamug\MoneyFormatter\MoneyFormatter;

it('can instantiate money formatter', function () {
  $formatter = new MoneyFormatter();
  expect($formatter)->toBeInstanceOf(MoneyFormatter::class);
});

it('formats numbers with default config', function () {
  $formatter = new MoneyFormatter();
  $result = $formatter->format(1234.56);
  expect($result)->toBe('1,234.56');
});

it('formats large numbers correctly', function () {
  $formatter = new MoneyFormatter();
  $result = $formatter->format(1234567.89);
  expect($result)->toBe('1,234,567.89');
});

it('formats negative numbers', function () {
  $formatter = new MoneyFormatter();
  $result = $formatter->format(-1234.56);
  expect($result)->toBe('-1,234.56');
});

it('can set custom decimals', function () {
  $formatter = new MoneyFormatter();
  $result = $formatter->setDecimals(0)->format(1234.56);
  expect($result)->toBe('1,235');
});

it('can set custom decimals with 3 places', function () {
  $formatter = new MoneyFormatter();
  $result = $formatter->setDecimals(3)->format(1234.567);
  expect($result)->toBe('1,234.567');
});

it('formats with currency symbol', function () {
  $formatter = new MoneyFormatter();
  $result = $formatter->formatWithSymbol(1234.56, 'USD');
  expect($result)->toContain('$');
  expect($result)->toContain('1,234.56');
});

it('converts different numbers to words', function () {
  $formatter = new MoneyFormatter();

  expect($formatter->toWords(0))->toBe('zero');
  expect($formatter->toWords(1))->toBe('one');
  expect($formatter->toWords(100))->toBe('one hundred');
  expect($formatter->toWords(1000))->toBe('one thousand');
});

it('can chain multiple setters', function () {
  $formatter = new MoneyFormatter();
  $result = $formatter
    ->setDecimals(0)
    ->setCurrency('EUR')
    ->format(1234.56);

  expect($result)->toBe('1,235');
});
