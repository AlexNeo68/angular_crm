<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SourcesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->truncate();

        DB::table('sources')->insert([
            [
                'title'=>'Instagram',
            ],
            [
                'title'=>'Viber',
            ],
            [
                'title'=>'Site',
            ],
            [
                'title'=>'Phone',
            ],
        ]);
    }
}
