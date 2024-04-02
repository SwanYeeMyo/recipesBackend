<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Permission\PermissionRepositoryInterface;

class PermissionController extends BaseApiController
{
    private $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $permissions = $this->permissionRepository->getPermissions();
            return $this->success($permissions, 'Permisssion List', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return $this->error($permissions, '', 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $permission = $this->permissionRepository->create($request->all());
            return $this->success($permission, 'Permisssion Created', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error($permission, '', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $permission = $this->permissionRepository->findPermission($id);
            return $this->success($permission, 'Permisssion data', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error($permission, '', 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $permission = $this->permissionRepository->findPermission($id);
            return $this->success($permission, 'Permisssion data', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error($permission, '', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $permission = $this->permissionRepository->update($request->all(), $id);
            return $this->success($permission, 'Permisssion Updated', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error($permission, '', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $permission = $this->permissionRepository->delete($id);
            return $this->success($permission, 'Permisssion Deleted', 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error($permission, '', 500);
        }
    }
}
