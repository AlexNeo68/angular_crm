<?php

namespace Database\Seeders;

use App\Modules\Admin\Role\Models\Permission;
use App\Modules\Admin\Role\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->truncate();

        $role_super_admin = Role::whereAlias('SUPER_ADMIN')->first();

        $all_permissions_id = Permission::all()->pluck('id')->all();

        if($role_super_admin){
            $role_super_admin->savePermissions($all_permissions_id);
        }
    }
}
