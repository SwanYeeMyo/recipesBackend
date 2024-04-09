<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseApiController
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            try {
                $user = Auth::user();
                $user['token'] = $user->createToken('api_user')->plainTextToken;

                return $this->success($user, 'Login Success', 201);
            } catch (Exception $e) {
                Log::error($e->getMessage());

                return $this->error($user, '', 500);
            }
        } else {
            return $this->error(null, 'credentials does not match', 500);
        }
    }
}
