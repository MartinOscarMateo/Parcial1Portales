<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('roles_user')->insert([
            [
                'user_id' => 1,
                'roles_id' => 1
            ],
            [
                'user_id' => 2,
                'roles_id' => 2
            ],
        ]);
    }
}
