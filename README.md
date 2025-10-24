# EasyVerein API for Laravel

Laravel package providing a Saloon-based API client for EasyVerein.

Package name: `nodus-it/easy-verein-api`.

## Requirements
- PHP >= 8.2
- Laravel 10 or 11

## Installation

1. Install via Composer:

```bash
composer require nodus-it/easy-verein-api
```

2. Publish the config (optional; environment variables also supported):

```bash
php artisan vendor:publish --tag="easy-verein-config"
```

3. Configure your credentials in `.env`:

```
EASY_VEREIN_BASE_URL=https://api.easyverein.com
EASY_VEREIN_TOKEN=your_api_token_here
```

## Usage

You can resolve the connector from the Laravel container:

```php
use NodusIT\EasyVereinApi\Connectors\EasyVereinConnector;

$connector = app(EasyVereinConnector::class);

// Example request class (stub)
//$request = new \NodusIT\EasyVereinApi\Requests\PingRequest();
//$response = $connector->send($request);
```

Or instantiate manually if you need a custom token/base URL at runtime:

```php
$connector = new EasyVereinConnector(token: 'token', baseUrl: 'https://api.easyverein.com');
```

## Testing

```bash
composer install
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
