<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            [
            'id' => 1,
            'role' => 'admin',
            ],
            [

                'id' => 2,
                'role' => 'redactor',
            ],
            [
                'id' => 3,
                'role' => 'user',
            ],
        ];


        foreach ($arr as $k) {
            Role::create($k);
        }


    }
}
