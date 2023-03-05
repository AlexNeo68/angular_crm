<?php

namespace App\Modules\Admin\Status\Policies;

use App\Modules\Admin\User\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatusPolicy
{
    use HandlesAuthorization;


    public function __construct()
    {
        //
    }

    public function view(User $user) {
        return $user->canDo(['SUPER_ADMIN','STATUS_ACCESS']);
    }

    public function delete(User $user) {
        return $user->canDo(['SUPER_ADMIN','STATUS_ACCESS']);
    }
}
