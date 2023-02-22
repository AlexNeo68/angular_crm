<?php

namespace App\Modules\Admin\Menu\Models;

use App\Modules\Admin\Role\Models\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    const MENU_TYPE_FRONT = 'front';
    const MENU_TYPE_ADMIN = 'admin';

    public function perms() {
        return $this->belongsToMany(Permission::class, 'permission_menu');
    }

    public function scopeFrontMenu($query, $user)
    {
        return $query->
                where('type', self::MENU_TYPE_FRONT)->
                whereHas('perms', function($q) use($user) {

                    $arr = collect($user->getMergedPermissions())->map(function($item) {
                        return $item['id'];
                    });

                    $q->whereIn('id', $arr->toArray());
                })
        ;
    }

    public function scopeMenuByType($query, $type)
    {
        return $query->whereType($type)->orderBy('parent')->orderBy('sort_order');
    }
}
