<?php

namespace App\Http\Repositories\Role;

use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;

interface RoleRepositoryInterface
{
    public function getRoles(): Collection;

    public function create(array $params): Role;

    public function findRole($id): Role;

    public function update(array $params, $id);

    public function delete($id);
}
