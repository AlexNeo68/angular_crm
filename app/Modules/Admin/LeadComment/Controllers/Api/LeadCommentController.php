<?php

namespace App\Modules\Admin\LeadComment\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Responses\ResponseService;
use App\Modules\Admin\LeadComment\Models\LeadComment;
use App\Modules\Admin\LeadComment\Services\LeadCommentService;

class LeadCommentController extends Controller
{
    
    private  $service;

    /**
     * LeadController constructor.
     * @param $service
     */
    public function __construct(LeadCommentService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', LeadComment::class);

        $lead = $this->service->store($request, Auth::user());

        return ResponseService::sendJsonResponse(true, 200, [],[
            'item' => $lead
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Admin\LeadComment\Models\LeadComment  $leadComment
     * @return \Illuminate\Http\Response
     */
    public function show(LeadComment $leadComment)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Admin\LeadComment\Models\LeadComment  $leadComment
     * @return \Illuminate\Http\Response
     */
    public function edit(LeadComment $leadComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Admin\LeadComment\Models\LeadComment  $leadComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeadComment $leadComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modules\Admin\LeadComment\Models\LeadComment  $leadComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeadComment $leadComment)
    {
        //
    }
}
