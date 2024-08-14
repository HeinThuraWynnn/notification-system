<?php

namespace App\Http\Controllers;

use App\Jobs\SendNotificationJob;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function sendNotification(Request $request)
    {
        $notification = Notification::create([
            'type' => $request->type,
            'message' => $request->message,
            'status' => 'pending',
        ]);

        SendNotificationJob::dispatch($notification);
    }
    public function sendNotificationTest()
    {   
        // dd(Notification::where('type','=','update')->first()->users());
        $notification = Notification::create([
            'type' => 'alert',
            'message' => 'Breaking news: This is a alert notification.',
            'status' => 'pending',
        ]
    );
        SendNotificationJob::dispatch($notification);
    }
    
}
