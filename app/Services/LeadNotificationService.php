<?php

namespace App\Services;

use App\Events\LeadNotificationCreated;
use App\Models\LeadNotification;

class LeadNotificationService
{
    public function send(
        int $userId,
        ?int $leadId,
        string $type,
        string $title,
        ?string $message = null,
        array $data = []
    ): LeadNotification {
        $notification = LeadNotification::create([
            'user_id' => $userId,
            'lead_id' => $leadId,
            'type' => $type,
            'title' => $title,
            'message' => $message,
            'data' => $data,
            'is_read' => false,
        ]);

        broadcast(new LeadNotificationCreated($notification, $userId));

        return $notification;
    }
}
