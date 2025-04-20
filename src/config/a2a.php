<?php

return [
    'token' => env('A2A_TOKEN', 'default-token'),
    'id' => env('A2A_AGENT_ID', 'dwoodard-laravel-agent'),
    'name' => env('A2A_AGENT_NAME', 'Laravel A2A Agent'),
    'description' => env('A2A_AGENT_DESCRIPTION', 'A Laravel-based agent implementing the A2A protocol'),
    'capabilities' => [
        'sendEmail' => Dwoodard\A2A\Handlers\SendEmail::class,
        'queryDatabase' => Dwoodard\A2A\Handlers\QueryDatabase::class,
        'dispatchJob' => Dwoodard\A2A\Handlers\DispatchJob::class,
        'notify' => Dwoodard\A2A\Handlers\NotifyUser::class,
    ],
];
