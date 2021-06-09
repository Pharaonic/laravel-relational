<?php

namespace Pharaonic\Laravel\Relational;

use Illuminate\Support\ServiceProvider;

class RelationalServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    public function register()
    {
        $this->publishes([
            __DIR__ . '/database/migrations/2021_02_01_000009_create_relationships_table.php' => database_path('migrations/2021_02_01_000009_create_relationships_table.php'),
        ], ['pharaonic', 'laravel-relational']);
    }
}
