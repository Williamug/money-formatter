<?php

namespace Williamug\MoneyFormatter\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Williamug\MoneyFormatter\BladeServiceProvider;

class TestCase extends Orchestra
{
    public static $latestResponse;

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Williamug\\MoneyFormatter\\Database\\Factories\\' . class_basename($modelName) . 'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
          BladeServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
            $migration = include __DIR__.'/../database/migrations/create_money-formatter_table.php.stub';
            $migration->up();
            */
    }
}
