<?php

namespace App\Http\Controllers;


use Illuminate\Http\JsonResponse;

use Illuminate\Http\Request;

class BaseApiController extends Controller
{

    public function success($code, $message=null, $data=null) : JsonResponse
    {
        return response()->json([
            'status' => $code,
            'message' => $message,
            'data' => $data
        ]);
    }

    public function error($code, $message=null, $data=null) : JsonResponse
    {
        return response()->json([
            'status' => $code,
            'message' => $message ?? 'Error Occur',
        ]);
    }
}
