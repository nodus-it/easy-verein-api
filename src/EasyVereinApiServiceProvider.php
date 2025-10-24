<?php

namespace NodusIT\EasyVereinApi;

use Illuminate\Support\ServiceProvider;
use NodusIT\EasyVereinApi\Connectors\EasyVereinConnector;

class EasyVereinApiServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Merge default config
        $this->mergeConfigFrom(__DIR__.'/../config/easy-verein.php', 'easy-verein');

        // Bind the connector as a singleton for convenient resolution
        $this->app->singleton(EasyVereinConnector::class, function ($app) {
            $config = $app['config']->get('easy-verein');

            return new EasyVereinConnector(
                token: $config['token'] ?? null,
                baseUrl: $config['base_url'] ?? null,
                timeout: $config['timeout'] ?? null
            );
        });
    }

    public function boot(): void
    {
        // Publish config
        $this->publishes([
            __DIR__.'/../config/easy-verein.php' => config_path('easy-verein.php'),
        ], 'easy-verein-config');
    }
}
