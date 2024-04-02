<?php

namespace App\Http\Repositories\User;

use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function getUser(): Collection;

    public function create(array $params): User;

    public function findUser($id): User;

    public function update(array $params, $id);

    public function delete($id);
}
