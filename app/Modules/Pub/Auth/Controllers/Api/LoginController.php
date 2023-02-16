<?php

namespace App\Modules\Pub\Auth\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Admin\User\Requests\LoginRequest;
use App\Services\Responses\ResponseService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials)){
            return ResponseService::sendJsonResponse(false, 403, [
                'message' => __('auth.failed')
            ] );
        }

        $user = Auth::user();

        $tokenResult = $user->createToken('Personal Access Token');
        return ResponseService::sendJsonResponse(true, 200, [], [
            'api_token' => $tokenResult->accessToken,
            'user' => $user,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
        ]);
    }
}
