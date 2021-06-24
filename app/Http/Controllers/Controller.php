<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param mixed $data
     * @return JsonResponse
     */
    public function successWithData($data): JsonResponse
    {
        return response()->json(
            [
                'success' => true,
                'data' => $data,
            ]
        );
    }

    protected function success(): JsonResponse
    {
        return response()->json(
            [
                'success' => true,
            ]
        );
    }

    protected function failed(): JsonResponse
    {
        return response()->json(
            [
                'success' => false,
            ]
        );
    }


    protected function failedWithMsg(string $msg, string $errcode = null): JsonResponse
    {
        return response()->json(
            [
                'success' => false,
                'msg' => $msg,
                'errcode' => $errcode,
            ]
        );
    }
}
