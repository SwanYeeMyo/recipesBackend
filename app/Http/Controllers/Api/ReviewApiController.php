<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseApiController;
use App\Http\Repositories\Review\ReviewRepository;
use App\Http\Requests\Review\ReviewRequest;
use Illuminate\Support\Facades\Log;
use Exception;

class ReviewApiController extends BaseApiController
{
    private $reviewRepository;
    public function __construct(ReviewRepository $reviewRepository)
    {
        // $this->middleware('auth');
        $this->reviewRepository = $reviewRepository;
    }

    public function index()
    {
        $reviews = $this->reviewRepository->index();
        return $this->success($reviews, 'OK', 200);
    }

    public function store(ReviewRequest $request)
    {
        try {
            $review = $this->reviewRepository->store($request->validated());
            return $this->success($review, 'Created', 201);

        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->error("", $e->getMessage(), 500);
        }
    }

    public function show(string $id)
    {
        $review = $this->reviewRepository->findById($id);
        return $this->success($review, 'OK', 200);
    }

    public function update(ReviewRequest $request, int $id)
    {
        $review = $this->reviewRepository->update($request->validated(), $id);
        return $this->success($review, 'Updated', 201);
    }

    public function destroy(int $id)
    {
        $review = $this->reviewRepository->destroy($id);
        return $this->success($review, 'Deleted', 200);
    }
}
