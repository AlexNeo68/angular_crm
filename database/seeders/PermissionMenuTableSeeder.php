<?php

namespace Database\Seeders;

use App\Modules\Admin\Menu\Models\Menu;
use App\Modules\Admin\Role\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_menu')->truncate();

        $permission_super_admin = Permission::whereAlias('SUPER_ADMIN')->first();

        $all_menus = Menu::all();

        if($permission_super_admin&&$all_menus->count()){
            foreach ($all_menus as $key => $menu) {
                $menu->savePermissions([$permission_super_admin->id]);
            }
        }
    }
}
