<?php
namespace App\Http\Repositories\Rating;

use App\Models\Rating;

class RatingRepository implements RatingRepositoryInterface {
    public function index() {

        return $data = Rating::all();
    }
    public function store($request) {
       return $data = Rating::create($request->all());
    }
    public function show($id) {
        return $data = Rating::find($id);
    }
    public function update($request, $id) {
                // dd($request);
                $data = Rating::find($id);
                $data->update($request->all());
                // $data->update([
                //     'rating' => $request['rating'],
                //     'recipe_id' => $request['recipe_id'],
                //     'user_id' => $request['user_id'],
                // ]);
                return $data;
    }
    public function destroy($id) {
        Rating::find($id)->delete();
    }
}
