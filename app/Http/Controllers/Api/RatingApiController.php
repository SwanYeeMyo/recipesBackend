<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Rating\RatingRepository;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RatingApiController extends Controller
{
    private $ratingRepository;
    public function __construct (RatingRepository $ratingRepository){
        // $this->middleware('auth');
        $this->ratingRepository = $ratingRepository;
    }
    public function index()
    {
        // if(!Gate::allows("rating_list")){
        //     abort(403);
        // }
        $rating = $this->ratingRepository->index();
        return response()->json($rating);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // if(!Gate::allows("rating_create")){
        //     abort(403);
        // }
        $data = $this->ratingRepository->store($request);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // if(!Gate::allows("rating_show")){
        //     abort(403);
        // }
        $data = $this->ratingRepository->show($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // if(!Gate::allows("rating_update")){
        //     abort(403);
        // }
        $data = $this->ratingRepository->update($request, $id);
        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // if(!Gate::allows("rating_delete")){
        //     abort(403);
        // }
        $this->ratingRepository->destroy($id);
        return response()->json(null, 204);
    }
}
