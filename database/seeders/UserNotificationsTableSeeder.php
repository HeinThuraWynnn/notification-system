<?php

namespace Database\Seeders;

use App\Models\NotificationType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserNotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $types = NotificationType::all();

        foreach ($users as $user) {
            $user->notificationTypes()->attach(
                $types->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
