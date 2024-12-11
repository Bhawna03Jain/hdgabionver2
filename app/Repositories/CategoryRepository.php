<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
// use Intervention\Image\ImageManager; // Import ImageManager
// use Intervention\Image\Drivers\Gd\Driver;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $model;
    protected $imageManager;

    public function __construct(Category $category)
    // , ImageManager $imageManager)
    {
        $this->model = $category;
        // $this->imageManager = $imageManager; // Inject the ImageManager
    }

    // public function all()
    // {
    //     return $this->model->all();
    // }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $category = $this->model->findOrFail($id);
        $category->update($data);
        return $category;
    }

    // public function delete($id)
    // {
    //     $category = $this->model->findOrFail($id);

    //     // Delete category's image if it exists
    //     if (!empty($category->image) && File::exists(public_path('admin/images/category/' . $category->image))) {
    //         File::delete(public_path('admin/images/category/' . $category->image));
    //     }

    //     $category->delete();
    //     return $category;
    // }

    public function getAllCategoriesWithChildren()
    {
        $categories = Category::with([
            'children' => function ($query) {
                $query->where('status', 1);
                $query->with([
                    'children' => function ($query) {
                        $query->where('status', 1);
                    }
                ]);
            }
        ])->whereNull('parent_id')
            ->where('status', 1)
            ->get();
        return $categories;
    }
    // public function checkCategoryExists(string $category_name)
    // {
    //     return $this->model->where('category_name', $category_name)->first();
    // }
}



