<?php

namespace App\Http\Repositories\Permission;

use Illuminate\Support\Collection;
use Spatie\Permission\Models\Permission;

interface PermissionRepositoryInterface
{
    public function getPermissions(): Collection;

    public function create(array $params): Permission;

    public function findPermission($id): Permission;

    public function update(array $params, $id);

    public function delete($id);
}
