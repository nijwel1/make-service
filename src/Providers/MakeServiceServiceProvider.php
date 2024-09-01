<?php

namespace Nijwel\MakeService\Providers;

use Illuminate\Support\ServiceProvider;

class MakeServiceServiceProvider extends ServiceProvider {
    /**
     * Register the package's services.
     *
     * @return void
     */
    public function register() {
        $this->commands( [
            \Nijwel\MakeService\Console\Commands\MakeService::class,
        ] );
    }

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot() {
        // You can add additional boot logic here.
    }
}
