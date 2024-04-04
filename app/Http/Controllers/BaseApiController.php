<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseApiController extends Controller
{
    public function success($data, $message = null, $status)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ]);
    }

    public function error($data, $message = null, $status)
    {
        return response()->json([
            'status' => $status,
            'message' => $message ?? 'Error occured',
            'data' => $data
        ]);
    }
}
