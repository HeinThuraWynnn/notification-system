<?php

namespace App\Jobs;

use App\Mail\NotificationMail;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
  
    protected $notification;
    /**
     * Create a new job instance.
     */
    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
            // Get the notification type associated with the notification
            $notificationType = $this->notification->notificationType;

            // Get all users subscribed to this notification type
            $users = $notificationType->users;
    
            if ($users->isEmpty()) {
                // If no users are subscribed, you might want to handle it differently
                $this->notification->update(['status' => 'no_recipients']);
                return;
            }
    
            foreach ($users as $user) {
                Mail::to($user->email)->send(new NotificationMail($this->notification));
            }
    
            // Update the status of the notification after sending
            $this->notification->update(['status' => 'sent']);
    }
}
