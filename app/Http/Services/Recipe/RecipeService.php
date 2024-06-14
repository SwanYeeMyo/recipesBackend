<?php

namespace App\Http\Services\Recipe;

use App\Http\Repositories\Recipe\RecipeRepositoryInterface;
use App\Models\Image;
use Illuminate\Support\Facades\File;

class RecipeService
{

    private $recipeRepository;

    public function __construct(RecipeRepositoryInterface $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    public function index()
    {
        return $this->recipeRepository->index();
    }

    public function store(array $requests)
    {

        $recipe = $this->recipeRepository->store($requests);

        $images = $this->upload_images($requests);

        foreach ($images as $image) {
            $this->recipeRepository->recipeImage($image, $recipe->id);
        }

        return $recipe;
    }

    public function findById($id)
    {
        return $this->recipeRepository->findById($id);
    }

    private function upload_images(array $requests)
    {

        $uploadImages = [];

        $images = $requests['images'];
        foreach ($images as $image) {

            $imgName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('recipe_img', $imgName);

            array_push($uploadImages, $imgName);
        }

        return $uploadImages;
    }

    public function update(array $requests, int $id)
    {

        $recipe = $this->recipeRepository->update($requests, $id);

        if (isset($requests['images'])) {
            // Delete Old Images in File
            $oldImages = Image::where('recipe_id', $id)->get();
            foreach ($oldImages as $image) {
                if (File::exists(public_path('recipe_img/' . $image->name))) {
                    File::delete(public_path('recipe_img/' . $image->name));
                }
                // Delete images in DB
                $image->delete();
            }

            $images = $this->upload_images($requests);

            foreach ($images as $image) {
                $this->recipeRepository->recipeImage($image, $recipe->id);
            }
        }
        return $recipe;
    }

    public function delete(int $id)
    {
        $this->recipeRepository->delete($id);
    }

    public function search(string $name)
    {
        return $this->recipeRepository->search($name);
    }
    public function vegan()
    {
        return $this->recipeRepository->vegan();
    }
    public function meal()
    {
        return $this->recipeRepository->meal();
    }
    public function soup()
    {
        return $this->recipeRepository->soup();
    }
    public function showRecipe()
    {

        return $this->recipeRepository->showRecipe();
    }
}
