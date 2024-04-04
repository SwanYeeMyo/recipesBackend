<?php
namespace App\Http\Repositories\Rating;

interface RatingRepositoryInterface {
    public function index();
    public function store($request);
    public function show($id);
    public function update($request, $id);
    public function destroy($id);
}
