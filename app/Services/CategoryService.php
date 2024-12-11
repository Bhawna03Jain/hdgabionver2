<?php
namespace App\Services;

use App\Models\Category;

use App\Repositories\CategoryRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class CategoryService
{
    protected $categoryRepository;
    protected $imageManager;



    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->imageManager = new ImageManager(new Driver());
    }

    // public function getAllCategories()
    // {
    //     return $this->categoryRepository->all();
    // }
    public function getCategoryById($id)
    {
        return $this->categoryRepository->find($id);
    }

    public function createCategory(array $data)
    {
        return $this->categoryRepository->create($data);
    }

    public function updateCategory($id, array $data)
    {
        return $this->categoryRepository->update($id, $data);
    }

    // public function deleteCategory($id)
    // {
    //     return $this->categoryRepository->delete($id);
    // }


public function getParentId($categoryid){
    $category = $this->categoryRepository->find($categoryid);
    if ($category) {
        return $category->parent_id;
    } else {
        return false;
    }
}

// public function getParentName($CategoryId)
// {
//     $category = $this->categoryRepository->find($CategoryId);
//     if ($category) {
//         $parent = $category->parent_id;
//         if ($parent) {
//             return $parent->category_name;
//         } else {
//             return false;
//         }
//     } else {
//         return false;
//     }

// }

    // public function uploadAndGetImage(Request $request)
    // {
    //     // dd($request->file("category_image"));
    //     if ($request->hasFile('category_image')) {
    //         // return $data;
    //         // dd($request->file('category_image'));
    //         $image_tmp = $request->file('category_image');

    //         if ($image_tmp->isValid()) {
    //             // Upload Images after Resize
    //             $extension = $image_tmp->getClientOriginalExtension();
    //             $imageName = rand(111, 99999) . '.' . $extension;
    //             $image_path = public_path('admin/images/category/' . $imageName);

    //             $this->imageManager->read($image_tmp)->save($image_path);
    //             return $imageName;

    //         }
    //     }
    //     else {
    //         return("");
    //     }

    // }

    public function getAllCategoriesWithChildren(){
       return $this->categoryRepository->getAllCategoriesWithChildren();
    }

    // public function checkCategoryExists(string $category_name){
    //     return $this->categoryRepository->checkCategoryExists($category_name);
    // }
    public function generateCategoryUrl($parentId, $categoryName)
    {
        $categorySlug = Str::slug($categoryName);
        $categorySlug = strtolower($categorySlug);
        // If no parent category (main category), just return the slug
        if (!$parentId) {
            return $categorySlug;
        }

        // Get parent category details
        $parentCategory = $this->getCategoryById($parentId);
        if ($parentCategory) {
            // Get the parent's URL
            $parentUrl = $parentCategory->url;

            // Combine the parent's URL with the current category's URL
            return $parentUrl . '/' . $categorySlug;
        }

        return $categorySlug; // Fallback in case the parent is not found
    }
//     public function checkCategoryWithSameParentExists(string $category_name){
//         $cat=$this->checkCategoryExists($category_name);
//         if ($cat) {
//             $parentCategory = $this->getParentId($cat->parent_id);

//         if ($parentCategory  && $parentCategory != 0) {

//         }
//         else{
//             return (false);
//         }
//         } else {
//             return (false);
//         }

//     if ($request->parent_id && $request->parent_id != 0) {
//         // Fetch the parent category
//         $parentCategory = $this->categoryService->getParentId($request->parent_id);

//         if ($parentCategory) {
//             $grandParentId = $this->categoryService->getCategoryById($parentCategory)->parent_id;

//             // Check if a category with the same name and hierarchy already exists
//             $existingCategory = Category::where('name', $request->name)
//                 ->where('parent_id', $request->parent_id)
//                 ->whereHas('parent', function ($query) use ($grandParentId) {
//                     $query->where('parent_id', $grandParentId);
//                 })
//                 ->first();

//             if ($existingCategory) {
//                 return response()->json([
//                     'status' => 'false',
//                     'type' => 'duplicate',
//                     'message' => 'A category with the same name and hierarchy already exists.'
//                 ]);
//             }

//             if ($grandParentId) {
//                 // If the parent has a parent, it's a sub-subcategory
//                 return response()->json([
//                     'status' => 'false',
//                     'type' => 'outoflimit',
//                     'message' => 'You can only add subcategories to main categories (2 levels maximum).'
//                 ]);
//             }
//         }
//     } else {
//         // For top-level categories, ensure uniqueness by name
//         $existingCategory = Category::where('name', $request->name)
//             ->whereNull('parent_id')
//             ->first();

//         if ($existingCategory) {
//             return response()->json([
//                 'status' => 'false',
//                 'type' => 'duplicate',
//                 'message' => 'A top-level category with the same name already exists.'
//             ]);
//         }
//     }

// }
}
