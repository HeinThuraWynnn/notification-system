<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a user with the specific email
        User::factory()->withCustomEmail('heinthurawynn.dev@gmail.com')->create();
        User::factory()->withCustomEmail('heinthurawynn.htrw@gmail.com')->create();
        User::factory()->withCustomEmail('heinthurawynn.developer@gmail.com')->create();

        // Create additional users with random emails
        User::factory()->count(1)->create();
    }
}
