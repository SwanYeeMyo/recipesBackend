<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BaseApiController extends Controller
{
    public function success($data, $message=null, $code) : JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'status' => $code,
        ]);
    }

    public function error($data, $message=null, $code) : JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $message ?? 'Error Occur',
            'status' => $code,
        ]);
    }
}
