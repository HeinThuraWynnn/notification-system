<?php

namespace App\Http\Controllers;

use App\Jobs\SendNotificationJob;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\NotificationType;

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
        return redirect()->back()->with('status', 'Notification successfully sent!');

    }
    public function sendNotificationTest()
    {   
        $notification = Notification::create([
            'type' => 'update',
            'message' => 'Breaking news: This is a update notification.',
            'status' => 'pending',
        ]
    );
        SendNotificationJob::dispatch($notification);
        return redirect()->back()->with('status', 'Notification successfully sent!');

    }
    public function showSubscriptionForm()
    {
        $users = User::with('notificationTypes')->get();
        $notificationTypes = NotificationType::all();
        return view('subscribe', compact('users', 'notificationTypes'));
    }

   
    public function updateSubscriptions(Request $request, User $user)
    {
        $user->notificationTypes()->sync($request->notification_types);
        return redirect()->back()->with('status', 'Subscriptions updated successfully!');
    }
}
