<?php

it('can format money using helper function', function () {
    $result = format_money(10000);
    expect($result)->toBe('10,000.00');
});

it('can convert to words using helper function', function () {
    $result = money_to_words(123);
    expect($result)->toBe('one hundred twenty-three');
});

it('can format currency using helper function', function () {
    $result = format_currency(10000, 'USD', 'en_US');
    expect($result)->toContain('10,000.00');
});

it('can parse money using helper function', function () {
    $result = parse_money('1,234.56');
    expect($result)->toBe(1234.56);
});

it('can parse money with different formats', function () {
    $result = parse_money('10,000.00');
    expect($result)->toBe(10000.0);

    $result2 = parse_money('1234567.89');
    expect($result2)->toBe(1234567.89);
});
