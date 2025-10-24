<?php

namespace NodusIT\EasyVereinApi\Requests\Member;

use NodusIT\EasyVereinApi\Requests\BaseRequest;
use Saloon\Enums\Method;

class MemberBulkUpdateRequest extends BaseRequest
{
    protected Method $method = Method::PATCH;

    public function __construct(
        protected array $payload
    ) {}

    public function resolveEndpoint(): string
    {
        return '/api/v2.0/member/bulk-update';
    }

    protected function defaultBody(): array
    {
        return $this->payload;
    }
}
