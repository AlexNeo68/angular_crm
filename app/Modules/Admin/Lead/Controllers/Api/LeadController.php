<?php

namespace App\Modules\Admin\Lead\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Admin\Lead\Models\Lead;
use App\Services\Responses\ResponseService;
use App\Modules\Admin\Lead\Services\LeadService;

class LeadController extends Controller
{


    private $service;

    public function __construct(LeadService $leadService)
    {
        $this->service = $leadService;        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', Lead::class);

        $result = $this->service->getLeads();

        return ResponseService::sendJsonResponse(true, 200, [],[
           'items' => $result
        ]);
    }

    /**
     * Create of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $this->authorize('create', Lead::class);

        $lead = $this->service->store($request, Auth::user());

        return ResponseService::sendJsonResponse(true, 200, [],[
            'item' => $lead
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Admin\Lead\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        $this->authorize('view', Lead::class);
        return ResponseService::sendJsonResponse(true, 200, [],[
            'item' => $lead
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Admin\Lead\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Admin\Lead\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        
        $this->authorize('edit', Lead::class);

        $lead = $this->service->update($request, Auth::user(), $lead);

        return ResponseService::sendJsonResponse(true, 200, [],[
            'item' => $lead
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modules\Admin\Lead\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        //
    }


    public function archive() {
        $this->authorize('view', Lead::class);

        $leads = $this->service->archive();

        return ResponseService::sendJsonResponse(true, 200, [],[
            'items' => $leads
        ]);
    }

    public function checkExist(Request $request) {

        $this->authorize('create', Lead::class);

        $lead = $this->service->checkExist($request);

        if($lead) {
            return ResponseService::sendJsonResponse(true, 200, [],[
                'item' => $lead,
                'exist' => true
            ]);
        }

        return ResponseService::success();

    }

    public function updateQuality(Request $request, Lead $lead) {

        $this->authorize('edit', Lead::class);

        $lead = $this->service->updateQuality($request, $lead);

        return ResponseService::sendJsonResponse(true, 200, [],[
            'item' => $lead
        ]);

    }

    public function getAddSaleCount() {
        $count = $this->service->getAddSaleCount();
        return ResponseService::sendJsonResponse(true, 200, [],[
            'number' => $count
        ]);

    }

    
}
