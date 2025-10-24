<?php

namespace NodusIT\EasyVereinApi\Connectors;

use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;

class EasyVereinConnector extends Connector
{
    protected string $baseUrl;

    protected ?string $token;

    protected int $timeout;

    public function __construct(?string $token = null, ?string $baseUrl = null, ?int $timeout = null)
    {
        $this->token = $token;
        $this->baseUrl = $baseUrl ?: 'https://api.easyverein.com';
        $this->timeout = $timeout ?? 30;
    }

    public function resolveBaseUrl(): string
    {
        return rtrim($this->baseUrl, '/');
    }

    protected function defaultAuth(): ?Authenticator
    {
        if (! empty($this->token)) {
            return new TokenAuthenticator($this->token, prefix: 'Bearer');
        }

        return null;
    }

    protected function defaultConfig(): array
    {
        return [
            'timeout' => $this->timeout,
        ];
    }
}
