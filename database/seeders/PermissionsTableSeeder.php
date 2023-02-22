<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();
        DB::table('permissions')->insert([
            [
                'title' => 'Show Users',
                'alias' => 'SHOW_USERS',
            ],
            [
                'title' => 'Create User',
                'alias' => 'CREATE_USER',
            ],
            [
                'title' => 'Super Admin',
                'alias' => 'SUPER_ADMIN',
            ],
            [
                'title' => 'Roles Access',
                'alias' => 'ROLE_ACCESS',
            ],
            [
                'title' => 'User Access',
                'alias' => 'USER_ACCESS',
            ],
        ]);
    }
}
