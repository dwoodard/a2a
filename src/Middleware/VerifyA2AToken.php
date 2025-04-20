<?php

namespace Dwoodard\A2A\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyA2AToken
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if ($token !== config('a2a.token')) {
            return response()->json([
                'jsonrpc' => '2.0',
                'error' => ['code' => -32600, 'message' => 'Unauthorized'],
                'id' => null,
            ], 401);
        }

        return $next($request);
    }
}
