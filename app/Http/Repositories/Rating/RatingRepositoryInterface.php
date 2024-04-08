<?php
namespace App\Http\Repositories\Rating;

interface RatingRepositoryInterface {
    public function index();
    public function store(array $request);
    public function findById(int $id);
    public function update(array $request, $id);
    public function destroy(int $id);
}
