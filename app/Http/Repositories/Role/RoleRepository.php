<?php

namespace App\Http\Repositories\Role;

use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    public function getRoles(): Collection
    {
        return Role::with('permissions')->get();
    }

    public function create(array $params): Role
    {
        $params['guard_name'] = $params['guard_name'] ?? 'web';
        $role = Role::create($params);
        $role->syncPermissions($params['permission']);
        return $role;
    }

    public function findRole($id): Role
    {
        return Role::with('permissions')->where('id', $id)->first();
    }

    public function update(array $params, $id)
    {
        $role = Role::find($id);
        $role->update($params);
        $role->syncPermissions($params['permission']);
        return $role;
    }

    public function delete($id)
    {
        return Role::where('id', $id)->delete();
    }
}
