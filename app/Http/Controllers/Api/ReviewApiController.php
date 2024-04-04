<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Review\ReviewRepository;
use App\Http\Requests\Review\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReviewApiController extends Controller
{
    private $reviewRepository;
    public function __construct(ReviewRepository $reviewRepository)
    {
        // $this->middleware('auth');
        $this->reviewRepository = $reviewRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if(!Gate::allows('review_list')){
        //     return abort(401);
        // }
        $data = $this->reviewRepository->index();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReviewRequest $request)
    {
        // if(!Gate::allows('review_create')) {
        //     return abort(401);
        // }
        $data = $this->reviewRepository->store($request);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // if(!Gate::allows('review_show')) {
        //     return abort(401);
        // }
        $data = $this->reviewRepository->show($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReviewRequest $request, string $id)
    {
        // if(!Gate::allows('review_update')) {
        //     return abort(401);
        // }
        $data = $this->reviewRepository->update($request, $id);
        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // if(!Gate::allows('review_delete')) {
        //     return abort(401);
        // }
        $this->reviewRepository->destroy($id);
        return response()->json(null, 204);
    }
}
