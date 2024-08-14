<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationType extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_notifications', 'notification_type_id', 'user_id');

    }
}
