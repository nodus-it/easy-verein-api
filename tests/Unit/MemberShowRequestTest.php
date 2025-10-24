<?php

use NodusIT\EasyVereinApi\Requests\Member\MemberShowRequest;
use Saloon\Enums\Method;

describe('MemberShowRequest', function () {
    it('sets member ID in constructor', function () {
        $memberId = 123;
        $request = new MemberShowRequest($memberId);

        // Use reflection to access the protected property
        $reflection = new ReflectionClass($request);
        $memberIdProperty = $reflection->getProperty('memberId');
        $memberIdProperty->setAccessible(true);

        expect($memberIdProperty->getValue($request))->toBe($memberId);
    });

    it('accepts string member ID in constructor', function () {
        $memberId = '456';
        $request = new MemberShowRequest($memberId);

        // Use reflection to access the protected property
        $reflection = new ReflectionClass($request);
        $memberIdProperty = $reflection->getProperty('memberId');
        $memberIdProperty->setAccessible(true);

        expect($memberIdProperty->getValue($request))->toBe($memberId);
    });

    it('uses GET HTTP method', function () {
        $request = new MemberShowRequest(123);

        // Use reflection to access the protected method property
        $reflection = new ReflectionClass($request);
        $methodProperty = $reflection->getProperty('method');
        $methodProperty->setAccessible(true);

        expect($methodProperty->getValue($request))->toBe(Method::GET);
    });

    it('resolves endpoint with integer member ID', function () {
        $memberId = 123;
        $request = new MemberShowRequest($memberId);

        expect($request->resolveEndpoint())
            ->toBe("/api/v2.0/member/{$memberId}")
            ->toBeValidEndpoint();
    });

    it('resolves endpoint with string member ID', function () {
        $memberId = '456';
        $request = new MemberShowRequest($memberId);

        expect($request->resolveEndpoint())
            ->toBe("/api/v2.0/member/{$memberId}")
            ->toBeValidEndpoint();
    });

    it('resolves endpoint with special characters in member ID', function () {
        $memberId = 'user-123';
        $request = new MemberShowRequest($memberId);

        expect($request->resolveEndpoint())
            ->toBe("/api/v2.0/member/{$memberId}")
            ->toBeValidEndpoint();
    });

    it('extends BaseRequest and Saloon Request', function () {
        $request = new MemberShowRequest(123);

        expect($request)
            ->toBeInstanceOf(NodusIT\EasyVereinApi\Requests\BaseRequest::class)
            ->toBeInstanceOf(Saloon\Http\Request::class);
    });

    it('has proper default JSON headers', function () {
        $request = new MemberShowRequest(123);

        // Use reflection to access the protected defaultHeaders method
        $reflection = new ReflectionClass($request);
        $defaultHeadersMethod = $reflection->getMethod('defaultHeaders');
        $defaultHeadersMethod->setAccessible(true);

        $headers = $defaultHeadersMethod->invoke($request);

        expect($headers)
            ->toHaveKey('Accept', 'application/json')
            ->toHaveKey('Content-Type', 'application/json')
            ->toHaveJsonHeaders();
    });

    it('resolves endpoint with zero member ID', function () {
        $request = new MemberShowRequest(0);

        expect($request->resolveEndpoint())
            ->toBe('/api/v2.0/member/0')
            ->toBeValidEndpoint();
    });

    it('resolves endpoint with negative member ID', function () {
        $request = new MemberShowRequest(-1);

        expect($request->resolveEndpoint())
            ->toBe('/api/v2.0/member/-1')
            ->toBeValidEndpoint();
    });
});

// Test different member ID types
test('member ID can be various types', function ($memberId, $expected) {
    $request = new MemberShowRequest($memberId);

    expect($request->resolveEndpoint())->toBe("/api/v2.0/member/{$expected}");
})->with([
    [123, 123],
    ['456', '456'],
    [0, 0],
    [-1, -1],
    ['user-123', 'user-123'],
]);

// Performance test
test('request creation is fast', function () {
    $start = microtime(true);

    for ($i = 0; $i < 1000; $i++) {
        new MemberShowRequest($i);
    }

    $duration = microtime(true) - $start;

    expect($duration)->toBeLessThan(0.1); // Should complete in less than 100ms
});
