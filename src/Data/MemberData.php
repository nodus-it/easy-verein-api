<?php

namespace NodusIT\EasyVereinApi\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class MemberData extends Data
{
    public function __construct(
        public int|string $id,
        public string $first_name,
        public string $last_name,
        public string|Optional $email,
        public string|Optional $status,
        #[WithCast(DateTimeInterfaceCast::class, types: [CarbonImmutable::class])]
        public CarbonImmutable|string|Optional $created_at,
        #[WithCast(DateTimeInterfaceCast::class, types: [CarbonImmutable::class])]
        public CarbonImmutable|string|Optional $updated_at,
        // Capture extra fields that EasyVerein may return without strict typing
        public array|Optional $extra = []
    ) {
    }

    public static function fromResponseArray(array $attributes): self
    {
        // Move unknown fields into $extra while mapping common ones
        $known = ['id','first_name','last_name','email','status','created_at','updated_at'];
        $extra = [];
        foreach ($attributes as $key => $value) {
            if (!in_array($key, $known, true)) {
                $extra[$key] = $value;
            }
        }

        return new self(
            id: $attributes['id'] ?? $attributes['member_id'] ?? 0,
            first_name: $attributes['first_name'] ?? $attributes['firstname'] ?? '',
            last_name: $attributes['last_name'] ?? $attributes['lastname'] ?? '',
            email: $attributes['email'] ?? Optional::create(),
            status: $attributes['status'] ?? Optional::create(),
            created_at: $attributes['created_at'] ?? Optional::create(),
            updated_at: $attributes['updated_at'] ?? Optional::create(),
            extra: $extra ?: Optional::create()
        );
    }
}
