<?php

use Illuminate\Support\Facades\Blade;

it('compiles @percentage directive', function () {
    $result = Blade::compileString('@percentage(50)');
    expect($result)->toContain("app('money-formatter')->percentage(50)");
});

it('compiles @filesize directive', function () {
    $result = Blade::compileString('@filesize(1024)');
    expect($result)->toContain("app('money-formatter')->fileSize(1024)");
});

it('compiles @abbreviate directive', function () {
    $result = Blade::compileString('@abbreviate(1000000)');
    expect($result)->toContain("app('money-formatter')->abbreviate(1000000)");
});

it('compiles @ordinal directive', function () {
    $result = Blade::compileString('@ordinal(1)');
    expect($result)->toContain("app('money-formatter')->ordinal(1)");
});

it('compiles @phone directive', function () {
    $result = Blade::compileString("@phone('1234567890')");
    expect($result)->toContain("app('money-formatter')->phone('1234567890')");
});

it('compiles @creditcard directive', function () {
    $result = Blade::compileString("@creditcard('1234567890123456')");
    expect($result)->toContain("app('money-formatter')->creditCard('1234567890123456')");
});

it('compiles @duration directive', function () {
    $result = Blade::compileString('@duration(3600)');
    expect($result)->toContain("app('money-formatter')->duration(3600)");
});

it('renders @percentage directive', function () {
    $compiled = Blade::compileString('@percentage(50)');
    ob_start();
    eval('?>' . $compiled);
    $result = ob_get_clean();

    expect($result)->toBe('50.00%');
});

it('renders @filesize directive', function () {
    $compiled = Blade::compileString('@filesize(1024)');
    ob_start();
    eval('?>' . $compiled);
    $result = ob_get_clean();

    expect($result)->toBe('1.00 KB');
});

it('renders @abbreviate directive', function () {
    $compiled = Blade::compileString('@abbreviate(1000000)');
    ob_start();
    eval('?>' . $compiled);
    $result = ob_get_clean();

    expect($result)->toBe('1.0M');
});

it('renders @ordinal directive', function () {
    $compiled = Blade::compileString('@ordinal(1)');
    ob_start();
    eval('?>' . $compiled);
    $result = ob_get_clean();

    expect($result)->toBe('1st');
});
