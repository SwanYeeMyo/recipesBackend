<?php

namespace App\Http\Controllers;


use Illuminate\Http\JsonResponse;

use Illuminate\Http\Request;

class BaseApiController extends Controller
{
    public function success($data, $message = null, $status)
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'status' => $status,
        ]);
    }

    public function error($data, $message = null, $status)
    {
        return response()->json([
            'data' => $data,
            'message' => $message ?? 'Error occured',
            'status' => $status,
        ]);
    }
}
