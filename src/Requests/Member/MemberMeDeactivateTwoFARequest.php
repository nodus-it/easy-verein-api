<?php

namespace NodusIT\EasyVereinApi\Requests\Member;

use NodusIT\EasyVereinApi\Requests\BaseRequest;
use Saloon\Enums\Method;

class MemberMeDeactivateTwoFARequest extends BaseRequest
{
    protected Method $method = Method::POST;

    public function __construct(
        protected array $payload = []
    ) {}

    public function resolveEndpoint(): string
    {
        return '/api/v2.0/member/me/deactivate-twoFA';
    }

    protected function defaultBody(): array
    {
        return $this->payload;
    }
}
