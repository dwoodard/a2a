<?php

namespace Dwoodard\A2A\Handlers;

use Dwoodard\A2A\Contracts\TaskHandler;
use Illuminate\Support\Facades\Notification;

class NotifyUser implements TaskHandler
{
    public function __invoke(array $params): mixed
    {
        // Example: $params = ['notifiable' => $user, 'notification' => $notification]
        $notifiable = $params['notifiable'] ?? null;
        $notification = $params['notification'] ?? null;
        if ($notifiable && $notification) {
            Notification::send($notifiable, $notification);

            return ['status' => 'notified'];
        }

        return ['status' => 'error', 'message' => 'Invalid notifiable or notification'];
    }
}
