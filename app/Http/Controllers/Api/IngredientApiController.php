<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Ingredient\IngredientRepository;
use Illuminate\Http\Request;

class IngredientApiController extends Controller
{
    private $ingredientRepository;

    public function __construct(IngredientRepository $ingredientRepostory){
        $this->ingredientRepository = $ingredientRepostory;
    }
    public function index()
    {
        $data = $this->ingredientRepository->index();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->ingredientRepository->store($request);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->ingredientRepository->show($id);
        return response()->json($data);
    }

    public function update(Request $request, string $id)
    {
        $data = $this->ingredientRepository->update($request, $id);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->ingredientRepository->destroy($id);
        return response()->json($data);
    }
}
