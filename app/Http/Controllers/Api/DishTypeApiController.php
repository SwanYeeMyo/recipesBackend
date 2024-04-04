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
        return $this->success(200, 'OK', $dishTypes);
    }

    public function store(StoreRequest $request)
    {
        $dishType = $this->dishTypeRepository->store($request->validated());
        return $this->success(201, 'Created', $dishType);
    }

    public function show(int $id)
    {
        $dishType = $this->dishTypeRepository->findById($id);
        return $this->success(200, 'OK', $dishType);
    }

    public function update(UpdateRequest $request, int $id)
    {
        $dishType = $this->dishTypeRepository->update($request->validated(), $id);
        return $this->success(201, 'Updated', $dishType);
    }

    public function destroy(int $id)
    {
        $this->dishTypeRepository->delete($id);
        return $this->success(200, 'Deleted');
    }
}
