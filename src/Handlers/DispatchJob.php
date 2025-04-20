<?php

namespace Dwoodard\A2A\Handlers;

use Dwoodard\A2A\Contracts\TaskHandler;
use Illuminate\Support\Facades\Bus;

class DispatchJob implements TaskHandler
{
    public function __invoke(array $params): mixed
    {
        // Example: $params = ['job' => SomeJob::class, 'data' => [...]]
        $jobClass = $params['job'] ?? null;
        $data = $params['data'] ?? [];
        if ($jobClass && class_exists($jobClass)) {
            Bus::dispatch(new $jobClass(...$data));

            return ['status' => 'dispatched'];
        }

        return ['status' => 'error', 'message' => 'Invalid job class'];
    }
}
