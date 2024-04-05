<?php

namespace App\Http\Controllers;


use Illuminate\Http\JsonResponse;

use Illuminate\Http\Request;

class BaseApiController extends Controller
{

    public function success($data = null, $message = null, $code): JsonResponse
    {
        return response()->json([
            'status' => $code,
            'message' => $message ?? 'Error occured',
            'data' => $data
        ]);
    }
    public function error($data = null, $message = null, $code): JsonResponse
    {
        return response()->json([
            'status' => $code,
            'message' => $message ?? 'Error occured',
            'data' => $data
        ]);
    }
}
