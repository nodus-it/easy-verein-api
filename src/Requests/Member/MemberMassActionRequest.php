<?php

namespace NodusIT\EasyVereinApi\Requests\Member;

use NodusIT\EasyVereinApi\Requests\BaseRequest;
use Saloon\Enums\Method;

class MemberMassActionRequest extends BaseRequest
{
    protected Method $method = Method::PATCH;

    public function __construct(
        protected array $payload
    ) {}

    public function resolveEndpoint(): string
    {
        return '/api/v2.0/member/mass-action';
    }

    protected function defaultBody(): array
    {
        return $this->payload;
    }
}
