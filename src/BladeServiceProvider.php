<?php

namespace Williamug\MoneyFormatter;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // format money
        Blade::directive('money', fn ($money) => "<?php echo number_format($money, 2); ?>");
        // change number to words
        Blade::directive('numbertowords', fn ($amount) => "<?php echo (new NumberFormatter('en', NumberFormatter::SPELLOUT))->format($amount); ?>");
    }
}
