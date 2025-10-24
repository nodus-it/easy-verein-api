<?php

namespace NodusIT\EasyVereinApi\Requests\Member;

use NodusIT\EasyVereinApi\Requests\BaseRequest;
use Saloon\Enums\Method;

class MemberAdditionalInfoRequest extends BaseRequest
{
    protected Method $method = Method::GET;

    public function __construct(
        protected int|string $memberId
    ) {}

    public function resolveEndpoint(): string
    {
        return "/api/v2.0/member/{$this->memberId}/additional-info";
    }
}
