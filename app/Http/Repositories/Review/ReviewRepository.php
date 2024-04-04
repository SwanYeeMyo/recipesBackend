<?php
namespace App\Http\Repositories\Review;


use App\Models\Review;

class ReviewRepository implements ReviewRepositoryInterface {

    public function index() {
        return $data = Review::all();
    }
    public function store($request) {
        return $data = Review::create($request->all());
    }
    public function show($id) {
        return $data = Review::find($id);
    }
    public function update($request, $id) {
        $data = Review::find($id);
        $data->update($request->all());
        return $data;
    }
    public function destroy($id) {
        Review::find($id)->delete();
    }
}
