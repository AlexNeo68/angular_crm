<?php
namespace App\Modules\Admin\Status\Services;

use App\Modules\Admin\Status\Models\Status;

class StatusService
{

    public function getStatuses()
    {
        return Status::all();
    }

}
