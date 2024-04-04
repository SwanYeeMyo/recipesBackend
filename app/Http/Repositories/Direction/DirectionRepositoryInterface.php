<?php
namespace App\Http\Repositories\Direction;

interface DirectionRepositoryInterface {
    public function index();
    public function store($request);
    public function show($id);
    public function update($request, $id);
    public function destroy($id);
}
