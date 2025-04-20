<?php

namespace Dwoodard\A2A\Handlers;

use Dwoodard\A2A\Contracts\TaskHandler;
use Illuminate\Support\Facades\DB;

class QueryDatabase implements TaskHandler
{
    public function __invoke(array $params): mixed
    {
        // Example: $params = ['query' => 'SELECT * FROM users WHERE id = ?', 'bindings' => [1]]
        $query = $params['query'] ?? '';
        $bindings = $params['bindings'] ?? [];

        return DB::select($query, $bindings);
    }
}
