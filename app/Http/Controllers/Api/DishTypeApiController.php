<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseApiController;
use App\Http\Repositories\DishType\DishTypeRepositoryInterface;
use App\Http\Requests\DishType\StoreRequest;
use App\Http\Requests\DishType\UpdateRequest;

class DishTypeApiController extends BaseApiController
{
    private $dishTypeRepository;

    public function __construct(DishTypeRepositoryInterface $dishTypeRepository)
    {
        $this->dishTypeRepository = $dishTypeRepository;
    }

    public function index()
    {
        $dishTypes = $this->dishTypeRepository->index();
        return $this->success($dishTypes, 'OK', 200);
    }

    public function store(StoreRequest $request)
    {
        $dishType = $this->dishTypeRepository->store($request->validated());
        return $this->success($dishType, 'Created', 200);
    }

    public function show(int $id)
    {
        $dishType = $this->dishTypeRepository->findById($id);
        return $this->success($dishType, 'OK', 200);
    }

    public function update(UpdateRequest $request, int $id)
    {
        $dishType = $this->dishTypeRepository->update($request->validated(), $id);
        return $this->success($dishType, 'Updated', 201);
    }

    public function destroy(int $id)
    {
        $this->dishTypeRepository->delete($id);
        return $this->success('','Deleted', 200);
    }
}
