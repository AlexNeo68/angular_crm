<?php

namespace App\Modules\Admin\Unit\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Unit\Models\Unit;
use App\Modules\Admin\Unit\Services\UnitsService;
use App\Services\Responses\ResponseService;

class UnitsController extends Controller
{
    private $service;


    public function __construct(UnitsService $unitsService)
    {
        $this->service = $unitsService;
    }


    public function index()
    {
        $this->authorize('view', new Unit());

        return ResponseService::sendJsonResponse(true, 200,[],[
            'items' =>  $this->service->getUnits()
        ]);
    }

   
}
