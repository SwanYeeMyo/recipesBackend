<?php
namespace App\Http\Repositories\Ingredient;

use App\Http\Repositories\Ingredient\IngredientRepositoryInterface;
use App\Models\Ingredient;

class IngredientRepository implements IngredientRepositoryInterface {
    public function index() {
        return $data = Ingredient::all();
    }
    public function store($request) {
        return $data = Ingredient::create($request->all());
    }
    public function show($id) {
        return $data = Ingredient::find($id);
    }
    public function update($request, $id) {
        $data = Ingredient::find($id);
        $data->update($request->all());
        return $data;
    }
    public function destroy($id) {
        Ingredient::find($id)->delete();
    }
}
