<?php

namespace Tests;

use NodusIT\EasyVereinApi\EasyVereinApiServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        // Additional setup for each test
        $this->withoutExceptionHandling();
    }

    protected function getPackageProviders($app): array
    {
        return [
            EasyVereinApiServiceProvider::class,
        ];
    }

    protected function defineEnvironment($app): void
    {
        // Set test configuration
        $app['config']->set('easy-verein.token', 'test-token-123');
        $app['config']->set('easy-verein.base_url', 'https://api.easyverein.com');
        $app['config']->set('easy-verein.timeout', 30);

        // Set application environment
        $app['config']->set('app.env', 'testing');
        $app['config']->set('app.debug', true);
    }

    protected function getEnvironmentSetUp($app): void
    {
        // Additional environment setup if needed
    }

    /**
     * Helper method to create a test member ID
     */
    protected function getTestMemberId(): int
    {
        return 123456;
    }

    /**
     * Helper method to get test configuration
     */
    protected function getTestConfig(): array
    {
        return [
            'token' => 'test-token-123',
            'base_url' => 'https://api.easyverein.com',
            'timeout' => 30,
        ];
    }
}
