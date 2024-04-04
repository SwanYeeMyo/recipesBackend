<?php
namespace App\Http\Repositories\Direction;

use App\Models\Direction;

class DirectionRepository implements DirectionRepositoryInterface {
    public function index() {
        return $data = Direction::all();
    }
    public function store($request) {
        return $data = Direction::create($request->all());
    }
    public function show($id) {
        return $data = Direction::find($id);
    }
    public function update($request, $id) {
        $data = Direction::find($id);
        $data->update($request->all());
        return $data;
    }
    public function destroy($id) {
        Direction::find($id)->delete();
    }
}
