<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\user\user;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'admin',
                'email'=> 'admin@gmail.com',
                'password'=> 'admin123',
                'gender'=> 'male',
                'role'=> 'admin',
                'image'=> '',
            ],

            [
                'username' => 'user',
                'email'=> 'user@gmail.com',
                'password'=> 'user123',
                'gender'=> 'female',
                'role'=> 'user',
                'image'=> '',
            ]
            ];

        foreach ($users as $user) {

                User::create($user);

        }
    }
}
