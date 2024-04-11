<?php
namespace App\Http\Repositories\Rating;

use App\Models\Rating;

class RatingRepository implements RatingRepositoryInterface {
    public function index() {
        return Rating::with('user')->get();
    }

    public function store($request) {
<<<<<<< HEAD
       return $data = Rating::create($request->all());
    } 
    public function show($id) {
        return $data = Rating::find($id);
=======
       return Rating::create($request);
    }

    public function findById(int $id)
    {
        return Rating::with('user')->where('id', $id)->first();
>>>>>>> 062190778907bd6d80d74d444bf4c2f62494a01f
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
