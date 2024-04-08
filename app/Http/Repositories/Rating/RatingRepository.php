<?php
namespace App\Http\Repositories\Rating;

use App\Models\Rating;

class RatingRepository implements RatingRepositoryInterface {
    public function index() {
        return Rating::all();
    }

    public function store($request) {
       return Rating::create($request);
    }

    public function findById(int $id)
    {
        return Rating::find($id);
    }

    public function update($request, $id) {

        $data = Rating::find($id);
        $data->update($request);
        return $data;
    }

    public function destroy($id) {
        Rating::find($id)->delete();
    }
}
