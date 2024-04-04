<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseApiController;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Role\RoleRepositoryInterface;
use App\Http\Repositories\User\UserRepository;
use App\Http\Repositories\User\UserRepositoryInterface;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends BaseApiController
{
    private $userRepository;
    private $roleRepository;

    public function __construct(UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $user = $this->userRepository->getUser();
            return $this->success($user, 'User List', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return $this->error($user, '', 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $roles = $this->roleRepository->getRoles();
            return $this->success($roles, 'User List', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return $this->error($roles, '', 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        try {
            $user = $this->userRepository->create($request->validated());
            return $this->success($user, 'User Created', 201);
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return $this->error('can\'t create user', '', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = $this->userRepository->findUser($id);
            return $this->success($user, 'User Details', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return $this->error($user, '', 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $user = $this->userRepository->findUser($id);
            return $this->success($user, 'User Details', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return $this->error($user, '', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUser(UserUpdateRequest $request, string $id)
    {
        try {
            $user = $this->userRepository->update($request->validated(), $id);
            return $this->success($user, 'User Updated', 201);
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return $this->error($user, '', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = $this->userRepository->delete($id);
            return $this->success($user, 'User Deleted', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return $this->error($user, '', 500);
        }
    }

    public function ChangePassword(ChangePasswordRequest $request)
    {
        $user = User::select('password')->where('id', Auth::user()->id)->first();
        $dbpassword = $user->password;
        $userOldPassword = $request->oldPassword;
        if (Hash::check($userOldPassword, $dbpassword)) {
            try {
                $password = $this->userRepository->changePassword($request->validated());
                Auth::guard('web')->logout();
                $request->user()->currentAccessToken()->delete();
                return $this->success($password, 'Password changed', 201);
            } catch (Exception $e) {
                Log::error($e->getMessage());

                return $this->error($password, '', 500);
            }
        } else {
            return $this->error(null, 'password does not match', 500);
        }
    }
}
