<?php

use Illuminate\Support\Facades\Blade;

it('compiles @money directive correctly', function () {
    $result = Blade::compileString('@money(10000)');
    expect($result)->toContain("app('money-formatter')->format(10000)");
});

it('compiles @moneyWithSymbol directive correctly', function () {
    $result = Blade::compileString('@moneyWithSymbol(10000)');
    expect($result)->toContain("app('money-formatter')->formatWithSymbol(10000)");
});

it('compiles @currency directive correctly', function () {
    $result = Blade::compileString('@currency(10000)');
    expect($result)->toContain("app('money-formatter')->formatCurrency(10000)");
});

it('compiles @numbertowords directive correctly', function () {
    $result = Blade::compileString('@numbertowords(10000)');
    expect($result)->toContain("app('money-formatter')->toWords(10000)");
});

it('renders @money directive with actual value', function () {
    $compiled = Blade::compileString('@money(10000)');
    ob_start();
    eval('?>' . $compiled);
    $result = ob_get_clean();

    expect($result)->toBe('10,000.00');
});

it('renders @numbertowords directive with actual value', function () {
    $compiled = Blade::compileString('@numbertowords(123000)');
    ob_start();
    eval('?>' . $compiled);
    $result = ob_get_clean();

    expect($result)->toBe('one hundred twenty-three thousand');
});

it('handles @money with variables', function () {
    $compiled = Blade::compileString('@money($amount)');
    expect($compiled)->toContain("app('money-formatter')->format(\$amount)");
});
