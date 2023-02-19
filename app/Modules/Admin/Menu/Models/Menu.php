<?php

namespace App\Modules\Admin\Menu\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    const MENU_TYPE_FRONT = 'front';
    const MENU_TYPE_ADMIN = 'admin';

    public function scopeFrontMenu($query, $user)
    {
        return $query->whereType(self::MENU_TYPE_FRONT);
    }

    public function scopeMenuByType($query, $type)
    {
        return $query->whereType($type)->orderBy('parent')->orderBy('sort_order');
    }
}
