<?php 

namespace App\Services\Responses;


class ResponseService
{
    private static function responsePrams($status, $errors = [], $data = []) {
        return [
            'status' => $status,
            'errors' => (object)$errors,
            'data' => (object)$data,
        ];
    }

    public static function sendJsonResponse($status, $code = 200, $errors = [], $data = []) {
        return response()->json(
            self::responsePrams($status, $errors, $data),
            $code
        );
    }

    public static function success($data = []) {
        return self::sendJsonResponse(true, 200, [],$data);
    }

    public static function notFound($data = []) {
        return self::sendJsonResponse(false, 404, [],[]);
    }

    public static function notAuthorize()
    {
        return self::sendJsonResponse(false, 401, [],[]);
    }
}