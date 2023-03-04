<?php

namespace App\Modules\Admin\Menu\Controllers\Api;

use App\Modules\Admin\Menu\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\User\Models\User;
use App\Services\Responses\ResponseService;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
   
    public function index()
    {
        return ResponseService::sendJsonResponse(true, 200,[], [
            'items' => (Menu::frontMenu(Auth::user())->get())->toArray()
        ]);
    }

    
}
