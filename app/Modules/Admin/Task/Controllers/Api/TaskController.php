<?php

namespace App\Modules\Admin\Task\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Admin\Task\Models\Task;
use App\Services\Responses\ResponseService;
use App\Modules\Admin\Task\Requests\TaskRequest;
use App\Modules\Admin\Task\Services\TaskService;

class TaskController extends Controller
{
    private  $service;

    /**
     * LeadController constructor.
     * @param $service
     */
    public function __construct(TaskService $taskService)
    {
        $this->service = $taskService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', Task::class);

        $result = $this->service->geTasks();

        return ResponseService::sendJsonResponse(true, 200, [],[
            'items' => $result
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archive()
    {
        //check access
        $this->authorize('view', Task::class);

        $tasks = $this->service->archive();

        return ResponseService::sendJsonResponse(true, 200, [],[
            'items' => $tasks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        //check access
        $this->authorize('save', Task::class);

        return ResponseService::sendJsonResponse(true, 200, [],[
            'item' => $this->service->store($request, Auth::user())
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //check access
        $this->authorize('view', Task::class);
        //
        return ResponseService::sendJsonResponse(true, 200, [],[
            'item' => $task
        ]);

    }
}
