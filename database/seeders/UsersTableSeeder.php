<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => env('ADMIN_EMAIL', ''),
                'password'       => bcrypt(env('ADMIN_PASSWORD', '')),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
