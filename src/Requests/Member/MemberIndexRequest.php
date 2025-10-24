<?php

namespace NodusIT\EasyVereinApi\Requests\Member;

use NodusIT\EasyVereinApi\Requests\BaseRequest;
use Saloon\Enums\Method;

class MemberIndexRequest extends BaseRequest
{
    protected Method $method = Method::GET;

    public function __construct(
        protected array $filters = []
    ) {}

    public function resolveEndpoint(): string
    {
        return '/api/v2.0/member';
    }

    protected function defaultQuery(): array
    {
        return $this->filters;
    }
}
