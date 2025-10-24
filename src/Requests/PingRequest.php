<?php

namespace NodusIT\EasyVereinApi\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class PingRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        // Replace with a real endpoint when implementing actual resources
        return '/ping';
    }
}
