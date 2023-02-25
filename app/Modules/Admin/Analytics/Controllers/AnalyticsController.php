<?php

namespace App\Modules\Admin\Analytics\Controllers;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Modules\Admin\User\Models\User;
use App\Modules\Admin\Analytics\Export\LeadsExport;

class AnalyticsController extends Controller
{
    public function export(User $user, $dateStart, $dateEnd) {
        $export = new LeadsExport($user, $dateStart, $dateEnd);
        return Excel::download($export,'leads.xlsx');
    }
}
