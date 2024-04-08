<?php
namespace App\Http\Repositories\Review;

interface ReviewRepositoryInterface {
    public function index();
    public function store(array $request);
    public function findById(int $id);
    public function update(array $request,int $id);
    public function destroy(int $id);
}
