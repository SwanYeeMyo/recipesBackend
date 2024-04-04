<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Direction\DirectionRepository;
use Illuminate\Http\Request;

class DirectionApiController extends Controller
{
    private $directionRepository;
    public function __construct(DirectionRepository $directionRepository) {
        $this->directionRepository = $directionRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->directionRepository->index();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->directionRepository->store($request);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->directionRepository->show($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $this->directionRepository->update($request, $id);
        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->directionRepository->destroy($id);
    }
}
