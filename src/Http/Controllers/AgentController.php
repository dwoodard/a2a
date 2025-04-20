<?php

namespace Dwoodard\A2A\Http\Controllers;

use Illuminate\Routing\Controller;

class AgentController extends Controller
{
    public function metadata()
    {
        return response()->json([
            'id' => config('a2a.id'),
            'name' => config('a2a.name'),
            'description' => config('a2a.description'),
            'capabilities' => array_keys(config('a2a.capabilities', [])),
            'endpoint' => url('/a2a/handle'),
        ]);
    }
}
