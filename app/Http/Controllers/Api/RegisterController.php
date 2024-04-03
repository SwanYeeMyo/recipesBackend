<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\BaseApiController;
use App\Http\Requests\Account\RegisterRequest;

class RegisterController extends BaseApiController
{
    public function register(RegisterRequest $request)
    {
        try {
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);

            if (isset($data['image'])) {
                $imageName = uniqid() . '.' . $data['image']->getClientOriginalExtension();

                $data['image']->move(public_path('storage/user'), $imageName);

                $data['image'] = $imageName;
            }

            $user = User::create($data);
            return $this->success($user, 'Register Success', 201);
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return $this->error($user, '', 500);
        }
    }
}
