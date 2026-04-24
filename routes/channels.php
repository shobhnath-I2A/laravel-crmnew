<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('lead-notifications.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});
