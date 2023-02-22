<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();
        DB::table('roles')->insert([
            [
                'title' => 'Super Admin',
                'alias' => 'SUPER_ADMIN',
            ],
            [
                'title' => 'Manager',
                'alias' => 'MANAGER',
            ],
        ]);
    }
}
