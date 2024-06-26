<?php
namespace App\Http\Repositories\Review;


use App\Models\Review;

class ReviewRepository implements ReviewRepositoryInterface {

    public function index() {
        return Review::with('user')->get();
    }

    public function store(array $request) {
        return Review::create($request);
    }

    public function findById(int $id)
    {
        return Review::with('user')->where('id', $id)->first();
    }

    public function update(array $request, int $id) {
        $data = Review::find($id);
        $data->update($request);
        return $data;
    }
    public function destroy(int $id) {
        Review::find($id)->delete();
    }
}
