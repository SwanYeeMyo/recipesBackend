<?php

namespace App\Http\Repositories\Rating;

use App\Models\Rating;

class RatingRepository implements RatingRepositoryInterface
{
    public function index()
    {
        return Rating::with('user')->get();
    }

    public function store($request)
    {
        return Rating::create($request);
    }

    public function findById(int $id)
    {
        return Rating::with('user')->where('id', $id)->first();
    }

    public function update($request, $id)
    {

        $data = Rating::find($id);
        $data->update($request);
        return $data;
    }

    public function destroy($id)
    {
        Rating::find($id)->delete();
    }
}
