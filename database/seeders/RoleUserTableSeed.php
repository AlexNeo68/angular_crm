<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Modules\Admin\Role\Models\Role;
use App\Modules\Admin\Role\Models\Permission;
use App\Modules\Admin\User\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleUserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->truncate();

        $role_super_admin = Role::whereAlias('SUPER_ADMIN')->first();
        $user_admin = User::find(1);

        if($user_admin && $role_super_admin){
            $user_admin->saveRoles([$role_super_admin->id]);
        }
    }
}
