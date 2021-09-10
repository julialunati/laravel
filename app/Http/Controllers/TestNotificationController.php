<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\TestNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class TestNotificationController extends Controller
{
    public function sendTestNotification()
    {
        $user = Auth::user();

        $notificationData = [
            'body' => 'You recieved an new test notification',
            'notificationText' => 'Please confirm',
            'url' => url('/')
        ];

        // $user->notify(new TestNotification($notificationData));
        Notification::send($user, new TestNotification($notificationData));
    }
}
