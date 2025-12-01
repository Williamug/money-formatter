<?php

use Williamug\MoneyFormatter\Facades\Money;

it('formats percentage correctly', function () {
    expect(Money::percentage(50))->toBe('50.00%');
    expect(Money::percentage(75.5))->toBe('75.50%');
    expect(Money::percentage(100, 0))->toBe('100%');
    expect(Money::percentage(33.333, 2))->toBe('33.33%');
});

it('formats percentage without sign', function () {
    expect(Money::percentage(50, 2, false))->toBe('50.00');
});

it('formats file sizes correctly', function () {
    expect(Money::fileSize(0))->toBe('0 Bytes');
    expect(Money::fileSize(1024))->toBe('1.00 KB');
    expect(Money::fileSize(1048576))->toBe('1.00 MB');
    expect(Money::fileSize(1073741824))->toBe('1.00 GB');
    expect(Money::fileSize(1536))->toBe('1.50 KB');
});

it('abbreviates numbers correctly', function () {
    expect(Money::abbreviate(500))->toBe('500');
    expect(Money::abbreviate(1000))->toBe('1.0K');
    expect(Money::abbreviate(1500))->toBe('1.5K');
    expect(Money::abbreviate(1000000))->toBe('1.0M');
    expect(Money::abbreviate(1500000))->toBe('1.5M');
    expect(Money::abbreviate(1000000000))->toBe('1.0B');
    expect(Money::abbreviate(1500000000))->toBe('1.5B');
});

it('formats ordinal numbers correctly', function () {
    expect(Money::ordinal(1))->toBe('1st');
    expect(Money::ordinal(2))->toBe('2nd');
    expect(Money::ordinal(3))->toBe('3rd');
    expect(Money::ordinal(4))->toBe('4th');
    expect(Money::ordinal(11))->toBe('11th');
    expect(Money::ordinal(12))->toBe('12th');
    expect(Money::ordinal(13))->toBe('13th');
    expect(Money::ordinal(21))->toBe('21st');
    expect(Money::ordinal(22))->toBe('22nd');
    expect(Money::ordinal(23))->toBe('23rd');
    expect(Money::ordinal(100))->toBe('100th');
});

it('formats phone numbers in international format', function () {
    $result = Money::phone('1234567890', 'international');
    expect($result)->toBe('+1 (123) 456-7890');
});

it('formats phone numbers in national format', function () {
    $result = Money::phone('1234567890', 'national');
    expect($result)->toBe('(123) 456-7890');
});

it('formats phone numbers with dots', function () {
    $result = Money::phone('1234567890', 'dots');
    expect($result)->toBe('123.456.7890');
});

it('formats credit card numbers with masking', function () {
    $result = Money::creditCard('1234567890123456');
    expect($result)->toBe('**** **** **** 3456');
});

it('formats credit card with custom mask character', function () {
    $result = Money::creditCard('1234567890123456', 'X', 4);
    expect($result)->toBe('XXXX XXXX XXXX 3456');
});

it('formats duration correctly', function () {
    expect(Money::duration(30))->toBe('30 seconds');
    expect(Money::duration(60))->toBe('1 minute');
    expect(Money::duration(3600))->toBe('1 hour');
    expect(Money::duration(86400))->toBe('1 day');
    expect(Money::duration(90))->toBe('1 minute, 30 seconds');
    expect(Money::duration(3665))->toBe('1 hour, 1 minute');
});

it('formats duration in short format', function () {
    expect(Money::duration(3665, true))->toBe('1h, 1m');
    expect(Money::duration(90, true))->toBe('1m, 30s');
});

it('formats metric values correctly', function () {
    expect(Money::metric(500, 2, 'W'))->toBe('500.00W');
    expect(Money::metric(1500, 1, 'W'))->toBe('1.5kW');
    expect(Money::metric(1500000, 1, 'W'))->toBe('1.5MW');
});

it('formats compact numbers correctly', function () {
    $result = Money::compact(1500);
    expect($result)->toContain('1');
    expect($result)->toContain('K');

    $result = Money::compact(1500000);
    expect($result)->toContain('1');
    expect($result)->toContain('M');
});
