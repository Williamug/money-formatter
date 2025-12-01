<?php

use Williamug\MoneyFormatter\Facades\Money;

it('can format money using facade', function () {
  $result = Money::format(10000);
  expect($result)->toBe('10,000.00');
});

it('can format money with custom currency', function () {
  $result = Money::formatWithSymbol(10000, 'USD');
  expect($result)->toBe('$ 10,000.00');
});

it('can format currency with locale', function () {
  $result = Money::formatCurrency(10000, 'USD', 'en_US');
  expect($result)->toContain('10,000.00');
});

it('can convert number to words using facade', function () {
  $result = Money::toWords(123);
  expect($result)->toBe('one hundred twenty-three');
});

it('can parse formatted money back to float', function () {
  $result = Money::parse('10,000.00');
  expect($result)->toBe(10000.0);
});

it('can chain method calls', function () {
  $result = Money::setDecimals(0)->format(10000);
  expect($result)->toBe('10,000');
});
