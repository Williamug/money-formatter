<?php

it('formats percentage using helper', function () {
    expect(format_percentage(50))->toBe('50.00%');
    expect(format_percentage(75.5, 1))->toBe('75.5%');
});

it('formats file size using helper', function () {
    expect(format_filesize(1024))->toBe('1.00 KB');
    expect(format_filesize(1048576))->toBe('1.00 MB');
});

it('abbreviates numbers using helper', function () {
    expect(abbreviate_number(1000))->toBe('1.0K');
    expect(abbreviate_number(1000000))->toBe('1.0M');
});

it('formats ordinal using helper', function () {
    expect(format_ordinal(1))->toBe('1st');
    expect(format_ordinal(2))->toBe('2nd');
    expect(format_ordinal(3))->toBe('3rd');
});

it('formats phone using helper', function () {
    $result = format_phone('1234567890');
    expect($result)->toBe('+1 (123) 456-7890');
});

it('formats credit card using helper', function () {
    $result = format_creditcard('1234567890123456');
    expect($result)->toBe('**** **** **** 3456');
});

it('formats duration using helper', function () {
    expect(format_duration(60))->toBe('1 minute');
    expect(format_duration(3600))->toBe('1 hour');
});
