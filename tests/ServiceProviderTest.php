<?php

namespace NodusIT\EasyVereinApi\Tests;

use NodusIT\EasyVereinApi\Connectors\EasyVereinConnector;

class ServiceProviderTest extends TestCase
{
    public function test_config_is_merged_and_connector_is_bound(): void
    {
        $this->assertIsArray(config('easy-verein'));
        $this->assertSame('test-token', config('easy-verein.token'));

        $connector = $this->app->make(EasyVereinConnector::class);
        $this->assertInstanceOf(EasyVereinConnector::class, $connector);
    }
}
