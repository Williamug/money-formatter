<?php

namespace Williamug\MoneyFormatter;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use NumberFormatter;

class BladeServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    // Merge config
    $this->mergeConfigFrom(
      __DIR__ . '/../config/money-formatter.php',
      'money-formatter'
    );

    // Register the main class
    $this->app->singleton('money-formatter', function ($app) {
      return new MoneyFormatter();
    });

    $this->app->alias('money-formatter', MoneyFormatter::class);
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    // Publish config
    $this->publishes([
      __DIR__ . '/../config/money-formatter.php' => config_path('money-formatter.php'),
    ], 'money-formatter-config');

    // Load helper functions
    if (file_exists($file = __DIR__ . '/helpers.php')) {
      require $file;
    }

    // Register Blade directives
    $this->registerBladeDirectives();
  }

  /**
   * Register Blade directives
   */
  protected function registerBladeDirectives(): void
  {
    // @money directive - format money with config defaults
    Blade::directive('money', function ($money) {
      return "<?php echo app('money-formatter')->format($money); ?>";
    });

    // @moneyWithSymbol directive - format money with currency symbol
    Blade::directive('moneyWithSymbol', function ($expression) {
      return "<?php echo app('money-formatter')->formatWithSymbol($expression); ?>";
    });

    // @currency directive - format as currency with locale
    Blade::directive('currency', function ($expression) {
      return "<?php echo app('money-formatter')->formatCurrency($expression); ?>";
    });

    // @numbertowords directive - convert number to words
    Blade::directive('numbertowords', function ($amount) {
      return "<?php echo app('money-formatter')->toWords($amount); ?>";
    });

    // @percentage directive - format as percentage
    Blade::directive('percentage', function ($expression) {
      return "<?php echo app('money-formatter')->percentage($expression); ?>";
    });

    // @filesize directive - format bytes to human readable
    Blade::directive('filesize', function ($bytes) {
      return "<?php echo app('money-formatter')->fileSize($bytes); ?>";
    });

    // @abbreviate directive - abbreviate large numbers
    Blade::directive('abbreviate', function ($number) {
      return "<?php echo app('money-formatter')->abbreviate($number); ?>";
    });

    // @ordinal directive - format ordinal numbers
    Blade::directive('ordinal', function ($number) {
      return "<?php echo app('money-formatter')->ordinal($number); ?>";
    });

    // @phone directive - format phone number
    Blade::directive('phone', function ($expression) {
      return "<?php echo app('money-formatter')->phone($expression); ?>";
    });

    // @creditcard directive - format/mask credit card
    Blade::directive('creditcard', function ($expression) {
      return "<?php echo app('money-formatter')->creditCard($expression); ?>";
    });

    // @duration directive - format seconds to duration
    Blade::directive('duration', function ($seconds) {
      return "<?php echo app('money-formatter')->duration($seconds); ?>";
    });
  }
}
