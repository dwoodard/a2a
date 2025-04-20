<?php
namespace Dwoodard\A2A\Handlers;

use Dwoodard\A2A\Contracts\TaskHandler;
use Illuminate\Support\Facades\Mail;

class SendEmail implements TaskHandler
{
    public function __invoke(array $params): mixed
    {
        // Example: $params = ['to' => 'user@example.com', 'subject' => 'Hello', 'body' => 'Message']
        Mail::raw($params['body'] ?? '', function ($message) use ($params) {
            $message->to($params['to'] ?? '')
                    ->subject($params['subject'] ?? '');
        });
        return ['status' => 'sent'];
    }
}
