<?php

namespace NodusIT\EasyVereinApi\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use NodusIT\EasyVereinApi\EasyVereinApiServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [EasyVereinApiServiceProvider::class];
    }

    protected function defineEnvironment($app)
    {
        $app['config']->set('easy-verein.token', 'test-token');
        $app['config']->set('easy-verein.base_url', 'https://api.easyverein.com');
    }
}
