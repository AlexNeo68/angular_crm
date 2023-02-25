<?php
namespace App\Modules\Admin\Analytics\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Services\Date\Facade\DateService;

class AnalyticDataService
{
    public function getAnalitic($request)
    {
        $dateStart = new Carbon('first day of this month');
        if($request->dateStart && DateService::isValid($request->dateStart, "d.m.Y")) {
            $dateStart = Carbon::parse($request->dateStart);
        }

        $dateEnd = new Carbon('last day of this month');
        if($request->dateEnd && DateService::isValid($request->dateEnd, "d.m.Y")) {
            $dateEnd = Carbon::parse($request->dateEnd);
        }

        $leadsData = DB::select(
            'CALL countLeads("'.$dateStart->format('Y-m-d') . '","'.$dateEnd->format('Y-m-d') . '")'
        );

        return $leadsData;
    }
}