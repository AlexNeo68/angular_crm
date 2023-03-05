<?php

namespace App\Modules\Admin\Status\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Status\Models\Status;
use App\Modules\Admin\Status\Services\StatusService;
use App\Services\Responses\ResponseService;

class StatusController extends Controller
{
    private $service;


    public function __construct(StatusService $statusService)
    {
        $this->service = $statusService;
    }

    public function index()
    {
        $this->authorize('view', new Status());

        return ResponseService::sendJsonResponse(true, 200,[],[
            'items' =>  $this->service->getStatuses()
        ]);
    }
}
