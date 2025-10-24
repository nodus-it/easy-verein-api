<?php

namespace NodusIT\EasyVereinApi\Requests\Member;

use NodusIT\EasyVereinApi\Requests\BaseRequest;
use Saloon\Enums\Method;

class MemberUpdateRequest extends BaseRequest
{
    protected Method $method = Method::PATCH;

    public function __construct(
        protected int|string $memberId,
        protected array $payload
    ) {}

    public function resolveEndpoint(): string
    {
        return "/api/v2.0/member/{$this->memberId}";
    }

    protected function defaultBody(): array
    {
        return $this->payload;
    }
}
