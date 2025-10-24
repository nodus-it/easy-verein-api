<?php

namespace NodusIT\EasyVereinApi\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Base JSON request for EasyVerein API.
 * - Ensures JSON headers
 * - Central place for shared behavior later (e.g. error handling)
 */
abstract class BaseRequest extends Request
{
    /** @var Method */
    protected Method $method = Method::GET;

    /**
     * Default headers for EasyVerein JSON API
     */
    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }
}
