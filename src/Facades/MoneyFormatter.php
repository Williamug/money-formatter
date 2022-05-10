<?php

namespace Williamug\MoneyFormatter\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Williamug\MoneyFormatter\MoneyFormatter
 */
class MoneyFormatter extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'money-formatter';
    }
}
