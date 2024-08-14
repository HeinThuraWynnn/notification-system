<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['type', 'message', 'status'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function notificationType()
    {
        return $this->belongsTo(NotificationType::class, 'type', 'type');
    }
}
