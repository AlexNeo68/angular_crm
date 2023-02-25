<?php

namespace App\Modules\Admin\Analytics\Policies;

use App\Modules\Admin\User\Models\User;

trait AnalyticsPolicy
{

    public function viewAnalitic(User $user) {
        return $user->canDo(['SUPER_ADMIN','ANALYTICS_ACCESS']);
    }
}
