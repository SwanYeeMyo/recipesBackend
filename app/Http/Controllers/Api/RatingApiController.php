<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseApiController;
use App\Http\Repositories\Rating\RatingRepository;
use App\Http\Requests\Rating\RatingRequest;
use Illuminate\Support\Facades\Log;
use Exception;

class RatingApiController extends BaseApiController
{
    private $ratingRepository;
    public function __construct (RatingRepository $ratingRepository){
        // $this->middleware('auth');
        $this->ratingRepository = $ratingRepository;
    }
    public function index()
    {
        $ratings = $this->ratingRepository->index();
        return $this->success($ratings, 'OK', 200);
    }

    public function store(RatingRequest $request)
    {
        try {
            $rating = $this->ratingRepository->store($request->validated());
            return $this->success($rating, 'Created', 201);

        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error("", $e->getMessage(), 500);
        }
    }

    public function show(int $id)
    {
        $rating = $this->ratingRepository->findById($id);
        return $this->success($rating, 'OK', 200);
    }

    public function update(RatingRequest $request, string $id)
    {
        $rating = $this->ratingRepository->update($request->validated(), $id);
        return $this->success($rating, 'Updated', 201);
    }

    public function destroy(int $id)
    {
        $rating = $this->ratingRepository->destroy($id);
        return $this->success($rating, 'Deleted', 200);
    }
}
