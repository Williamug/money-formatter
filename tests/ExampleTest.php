<?php

use Illuminate\Support\Facades\Blade;

it('can format money with @money directive', function () {
    $result = Blade::compileString('@money(10000)');
    expect($result)->toContain("app('money-formatter')->format(10000)");
});

it('can convert number to words with @numbertowords directive', function () {
    $result = Blade::compileString('@numbertowords(10000)');
    expect($result)->toContain("app('money-formatter')->toWords(10000)");
});

it('formats money correctly when rendered', function () {
    $compiled = Blade::compileString('@money(10000)');
    ob_start();
    eval('?>' . $compiled);
    $result = ob_get_clean();

    expect($result)->toBe('10,000.00');
});

it('converts numbers to words correctly when rendered', function () {
    $compiled = Blade::compileString('@numbertowords(123000)');
    ob_start();
    eval('?>' . $compiled);
    $result = ob_get_clean();

    expect($result)->toBe('one hundred twenty-three thousand');
});
