<?php

namespace Dwoodard\A2A\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TaskController extends Controller
{
    public function handle(Request $request)
    {
        $rpc = $request->json();

        if ($rpc->get('jsonrpc') !== '2.0' || ! $rpc->get('method')) {
            return response()->json([
                'jsonrpc' => '2.0',
                'error' => ['code' => -32600, 'message' => 'Invalid Request'],
                'id' => $rpc->get('id'),
            ], 400);
        }

        $handlers = config('a2a.capabilities', []);
        $method = $rpc->get('method');

        if (! isset($handlers[$method])) {
            return response()->json([
                'jsonrpc' => '2.0',
                'error' => ['code' => -32601, 'message' => 'Method not found'],
                'id' => $rpc->get('id'),
            ], 404);
        }

        $handler = app($handlers[$method]);
        $result = $handler($rpc->get('params', []));

        return response()->json([
            'jsonrpc' => '2.0',
            'result' => $result,
            'id' => $rpc->get('id'),
        ]);
    }

    public function stream($taskId)
    {
        return response()->stream(function () use ($taskId) {
            echo "data: Task $taskId started\n\n";
            sleep(1);
            echo "data: Working...\n\n";
            sleep(1);
            echo "data: Done!\n\n";
        }, 200, [
            'Content-Type' => 'text/event-stream',
            'Cache-Control' => 'no-cache',
            'Connection' => 'keep-alive',
        ]);
    }
}
