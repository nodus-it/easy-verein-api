<?php

use NodusIT\EasyVereinApi\Connectors\EasyVereinConnector;

describe('EasyVerein Service Provider', function () {
    it('merges configuration correctly', function () {
        expect(config('easy-verein'))
            ->toBeArray()
            ->toHaveKey('token')
            ->toHaveKey('base_url')
            ->toHaveKey('timeout');

        expect(config('easy-verein.token'))->toBe('test-token-123');
        expect(config('easy-verein.base_url'))->toBe('https://api.easyverein.com');
        expect(config('easy-verein.timeout'))->toBe(30);
    });

    it('binds EasyVereinConnector as singleton', function () {
        $connector1 = $this->app->make(EasyVereinConnector::class);
        $connector2 = $this->app->make(EasyVereinConnector::class);

        expect($connector1)
            ->toBeInstanceOf(EasyVereinConnector::class)
            ->toBe($connector2); // Should be the same instance (singleton)
    });

    it('creates connector with correct configuration', function () {
        $connector = $this->app->make(EasyVereinConnector::class);

        expect($connector)->toBeInstanceOf(EasyVereinConnector::class);

        // Test that the connector uses the configured base URL
        expect($connector->resolveBaseUrl())->toBe('https://api.easyverein.com');
    });
});
