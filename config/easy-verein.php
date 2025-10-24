<?php

return [
    // Base URL for the EasyVerein API
    'base_url' => env('EASY_VEREIN_BASE_URL', 'https://easyverein.com/'),

    // Personal access token or API key for authentication
    'token' => env('EASY_VEREIN_TOKEN'),

    // Default timeout (in seconds) for HTTP requests
    'timeout' => env('EASY_VEREIN_TIMEOUT', 30),
];
