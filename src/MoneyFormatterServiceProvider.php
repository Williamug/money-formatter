<?php

namespace Williamug\MoneyFormatter;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Williamug\MoneyFormatter\Commands\MoneyFormatterCommand;

class MoneyFormatterServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('money-formatter')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_money-formatter_table')
            ->hasCommand(MoneyFormatterCommand::class);
    }
}
