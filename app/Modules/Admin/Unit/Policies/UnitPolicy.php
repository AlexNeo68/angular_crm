<?php

namespace App\Modules\Admin\Unit\Policies;

use App\Modules\Admin\User\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UnitPolicy
{
    use HandlesAuthorization;


    public function __construct()
    {
        //
    }

    public function view(User $user) {
        return $user->canDo(['SUPER_ADMIN','UNITS_ACCESS']);
    }

    public function delete(User $user) {
        return $user->canDo(['SUPER_ADMIN','UNITS_ACCESS']);
    }
}
