<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseApiController;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Permission\PermissionRepositoryInterface;
use App\Http\Repositories\Role\RoleRepositoryInterface;
use App\Http\Requests\Role\RoleRequest;
use Illuminate\Http\Request;

class RoleController extends BaseApiController
{
    private $roleRepository;
    private $permissionRepository;

    public function __construct(RoleRepositoryInterface $roleRepository, PermissionRepositoryInterface $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $roles = $this->roleRepository->getRoles();
            return $this->success($roles, 'Role List', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return $this->error($roles, '', 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $permission = $this->permissionRepository->getPermissions();
            return $this->success($permission, 'Permission Data', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error($permission, '', 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        try {
            $role = $this->roleRepository->create($request->all());
            return $this->success($role, 'Role created', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error($role, '', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $role = $this->roleRepository->findRole($id);
            return $this->success($role, 'Role and Permission Data', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error('Unable to retrieve role or permission data.', '', 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $role = $this->roleRepository->findRole($id);
            return $this->success($role, 'Role Data', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error($role, '', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        try {
            $role = $this->roleRepository->update($request->all(), $id);
            return $this->success($role, 'Role Updated', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error($role, '', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $role = $this->roleRepository->delete($id);
            return $this->success($role, 'Role Deleted', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error($role, '', 500);
        }
    }
}
