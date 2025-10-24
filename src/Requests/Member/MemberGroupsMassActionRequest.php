<?php

namespace NodusIT\EasyVereinApi\Requests\Member;

use NodusIT\EasyVereinApi\Requests\BaseRequest;
use Saloon\Enums\Method;

class MemberGroupsMassActionRequest extends BaseRequest
{
    protected Method $method = Method::PATCH;

    public function __construct(
        protected array $payload
    ) {}

    public function resolveEndpoint(): string
    {
        return '/api/v2.0/member/groups/mass-action';
    }

    protected function defaultBody(): array
    {
        return $this->payload;
    }
}
