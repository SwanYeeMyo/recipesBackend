<?php

namespace App\Http\Repositories\DishType;

interface DishTypeRepositoryInterface {

    public function index();

    public function store(array $requests);

    public function findById(int $id);

    public function update(array $requests, int $id);

    public function delete(int $id);
}
