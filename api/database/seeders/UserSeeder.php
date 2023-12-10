<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{




    public function run(): void
    {

        $arr = [
            [
                'name' => 'admin',
                'phone_number' => '1111111',
                'email' => 'admin@mail.ru',
                'user_role_id' => 1,
                'email_verified_at' => now(),
                'password' => 'password', // password
                'remember_token' => Str::random(10),

            ],
            [
                'name' => 'redactor',
                'phone_number' => '2222222',
                'email' => 'redactor@mail.ru',
                'user_role_id' => 2,
                'email_verified_at' => now(),
                'password' => 'password', // password
                'remember_token' => Str::random(10),

            ],
            [
                'name' => 'user',
                'phone_number' => '3333333',
                'email' => 'user@mail.ru',
                'user_role_id' => 3,
                'email_verified_at' => now(),
                'password' => 'password', // password
                'remember_token' => Str::random(10),

            ],
            [
                'name' => 'userone',
                'phone_number' => '4444444',
                'email' => 'userone@mail.ru',
                'user_role_id' => 3,
                'email_verified_at' => now(),
                'password' => 'password', // password
                'remember_token' => Str::random(10),

            ],
            [
                'name' => 'usertwo',
                'phone_number' => '555555',
                'email' => 'usertwo@mail.ru',
                'user_role_id' => 3,
                'email_verified_at' => now(),
                'password' => 'password', // password
                'remember_token' => Str::random(10),

            ],
            [
                'name' => 'userthree',
                'phone_number' => '666666',
                'email' => 'userthreewo@mail.ru',
                'user_role_id' => 3,
                'email_verified_at' => now(),
                'password' => 'password', // password
                'remember_token' => Str::random(10),

            ],
            [
                'name' => 'userfour',
                'phone_number' => '777777',
                'email' => 'userfour@mail.ru',
                'user_role_id' => 3,
                'email_verified_at' => now(),
                'password' => 'password', // password
                'remember_token' => Str::random(10),

            ],
            [
                'name' => 'userfive',
                'phone_number' => '555555',
                'email' => 'userfive@mail.ru',
                'user_role_id' => 3,
                'email_verified_at' => now(),
                'password' => 'password', // password
                'remember_token' => Str::random(10),

            ],


        ];

            foreach ($arr as $fields) {
                User::create($fields);

            }


    }
}
