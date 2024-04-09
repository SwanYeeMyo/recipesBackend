<?php

namespace App\Http\Repositories\DishType;

use App\Models\DishType;

class DishTypeRepository implements DishTypeRepositoryInterface {

    public function index() {
        $dishTypes = DishType::all();
        return $dishTypes;
    }

    public function store(array $requests) {
        $dishType = DishType::create($requests);
        return $dishType;
    }

    public function findById(int $id) {
        $dishType = DishType::find($id);
        return $dishType;
    }

    public function update(array $requests, int $id) {
        $dishType = $this->findById($id);
        $dishType->update($requests);

        return $dishType;
    }

    public function delete(int $id) {
        $this->findById($id)->delete();
    }
}
