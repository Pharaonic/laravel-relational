<?php

namespace Pharaonic\Laravel\Relational;

use Illuminate\Support\ServiceProvider;

class RelationalServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/database/migrations/relationships.stub' => database_path(sprintf('migrations/%s_create_relationships_table.php', date('Y_m_d_His'))),
        ], ['pharaonic', 'laravel-relational']);
    }

    public function register()
    {
    }
}
