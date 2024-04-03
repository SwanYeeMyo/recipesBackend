<?php

namespace App\Http\Repositories\Permission;

use Illuminate\Support\Collection;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{
    public function getPermissions(): Collection
    {
        return Permission::all();
    }

    public function create(array $params): Permission
    {
        $params['guard_name'] = $params['guard_name'] ?? 'web';
        return Permission::create($params);
    }

    public function findPermission($id): Permission
    {
        return Permission::where('id', $id)->first();
    }

    public function update(array $params, $id)
    {
        return Permission::where('id', $id)->update($params);
    }

    public function delete($id)
    {
        return Permission::where('id', $id)->delete();
    }
}
