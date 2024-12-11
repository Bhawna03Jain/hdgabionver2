<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\CategoryService;
// use Intervention\Image\ImageManager;
use App\Services\ImageService;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use Validator;

class CategoryController extends Controller
{
    protected $categoryService;
    protected $imageService;

    public function __construct(CategoryService $categoryService, ImageService $imageService)
    {
        $this->categoryService = $categoryService;
        $this->imageService = $imageService;
    }
    public function index()
    {

        $categories = $this->categoryService->getAllCategoriesWithChildren();

        return view('admin.categories.index', compact('categories'));
    }

    // Display the category creation form with the list of categories
    public function create()
    {
        $title = "Categories";

        $categories = $this->categoryService->getAllCategoriesWithChildren();

        return view('admin.categories.create', compact('categories', 'title'));
    }

    // Handle AJAX request to store the category
    public function saveCategory(Request $request)
    {
        $data = $request->all();
        if ($data['parent_id'] == 0) {
            $data['parent_id'] = NULL;
        }
        // dd($data);
        // Validate the incoming request
        $rules = [
            // 'category_name' => 'required|string|max:255|unique:categories,category_name',
            'category_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories')->where(function ($query) use ($data) {
                    return $query->where('parent_id', $data['parent_id']);
                }),
            ],
            'parent_id' => 'required',

            // 'url' => [
            //     'required',
            //     Rule::unique('categories')->whereNull('deleted_at')
            // ],
            'description' => 'required',
            'category_image' => 'image',
        ];

        $customMessages = [
            'category_name.required' => 'Category Name is required',
            'category_name.unique' => 'Category Name already Exist',
            'parent_id.required' => 'Parent is Required',
            'parent_id.exists' => 'Selected parent category does not exist',
            // 'url.required' => 'URL is required',
            'description.required' => 'Description is required',
            'category_image.image' => 'Invalid Image',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Check validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'false',
                'type' => 'error',
                'errors' => $validator->messages(),
            ]);
            ;
        }

        // Check for two-level restriction
        if ($request->parent_id and $request->parent_id != 0) {
            $parentCategory = $this->categoryService->getParentId($request->parent_id);
            if ($parentCategory && $this->categoryService->getCategoryById($parentCategory)->parent_id) {
                // If the parent has a parent, it means it's a sub-subcategory
                return response()->json([
                    'status' => 'false',
                    'type' => 'outoflimit',
                    'message' => 'You can only add subcategories to main categories (2 levels maximum).'
                ]);
            }
        }

        $data = $request->all();
        // $imageName = $this->categoryService->uploadAndGetImage($request);
        $imageName = $this->imageService->uploadAndGetImage($request, 'category_image', 'admin/images/category');
        $data['category_image'] = $imageName;
        $categoryUrl = $this->categoryService->generateCategoryUrl($request->parent_id, $request->category_name);
        $data['url'] = $categoryUrl;
        if ($data['parent_id'] == 0) {
            $data['parent_id'] = null;
        }
        $data['category_name'] = ucwords(strtolower($data['category_name']));
        if ($this->categoryService->createCategory($data)) {
            return response()->json([
                'status' => 'success',
                'type' => 'success',
                'message' => '/admin/categories',
            ]);
        }


    }

    public function edit(Request $request, $id = null)
    {
        $title = "Edit Category Page";
        $category = $this->categoryService->getCategoryById($id);
        $categories = $this->categoryService->getAllCategoriesWithChildren();
        // dd($category);
        return view("admin.categories.edit", compact("title", "category", "categories"));
    }
    public function checkCategoryExists(Request $request)
    {
        if ($this->categoryService->checkCategoryExists($request->category_name)) {
            return response()->json(["true"]);
        } else {
            return response()->json(["false"]);
        }
    }
    public function updateCategory(Request $request)
    {
        $data = $request->all();
        // Fetch the existing category by ID
        $category = $this->categoryService->getCategoryById($data['id']);
        $id = $data['id'];
        if (!$category) {
            return response()->json([
                'status' => 'false',
                'type' => 'error',
                'message' => 'Category not found.',
            ]);
        }

        // Validate the incoming request
        $rules = [
            'category_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories')->where(function ($query) use ($data, $id) {
                    return $query->where('parent_id', $data['parent_id'])
                        ->where('id', '!=', $id);
                }),
            ],
            'parent_id' => 'required',
            'description' => 'required',
            'category_image' => 'image',
        ];

        $customMessages = [
            'category_name.required' => 'Category Name is required',
            'category_name.unique' => 'Category Name already exists',
            'parent_id.required' => 'Parent is required',
            'parent_id.exists' => 'Selected parent category does not exist',
            'description.required' => 'Description is required',
            'category_image.image' => 'Invalid Image',
        ];

        $validator = Validator::make($data, $rules, $customMessages);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'false',
                'type' => 'error',
                'errors' => $validator->messages(),
            ]);
        }

        // Check for two-level restriction
        if ($data['parent_id'] && $data['parent_id'] != 0) {
            $parentCategory = $this->categoryService->getParentId($data['parent_id']);
            if ($parentCategory && $this->categoryService->getCategoryById($parentCategory)->parent_id) {
                // If the parent has a parent, it means it's a sub-subcategory
                return response()->json([
                    'status' => 'false',
                    'type' => 'outoflimit',
                    'message' => 'You can only add subcategories to main categories (2 levels maximum).',
                ]);
            }
        }
        $data['url'] = $this->categoryService->generateCategoryUrl($data['parent_id'], $data['category_name']);
        if (Category::where('url', $data['url'])->where('id', '!=', $data['id'])->exists()) {
            return response()->json([
                'status' => 'false',
                'type' => 'exception',
                'message' => 'URL already exists. Please use a different category name.',
            ]);
        }
        // Handle parent_id nullification for top-level categories
        if ($data['parent_id'] == 0) {
            $data['parent_id'] = null;
        }

        // Process category image if provided
        if ($request->hasFile('category_image')) {
            // $imageName = $this->imageService->uploadAndGetImage($request);
            $imageName = $this->imageService->uploadAndGetImage($request, 'category_image', 'admin/images/category');

            $data['category_image'] = $imageName;

            // Optionally delete the old image if needed
            if ($category->category_image) {
                $this->imageService->deleteImage($category->category_image);
            }
        } else {
            $data['category_image'] = $category->category_image; // Retain the old image
        }


        // Standardize the category name
        $data['category_name'] = ucwords(strtolower($data['category_name']));

        // Update the category
        if ($this->categoryService->updateCategory($id, $data)) {
            return response()->json([
                'status' => 'success',
                'type' => 'success',
                'message' => '/admin/categories',
            ]);
        }

        return response()->json([
            'status' => 'false',
            'type' => 'error',
            'message' => 'Failed to update the category.',
        ]);
    }

    // public function updateCategory(Request $request)
    // {

    //     $rules = [
    //         'category_name' => 'required|string|max:255',
    //         'parent_id' => 'required',

    //         // 'url' => [
    //         //     'required',
    //         //     Rule::unique('categories')->whereNull('deleted_at')
    //         // ],
    //         'description' => 'required',
    //         'category_image' => 'image',
    //     ];

    //     $customMessages = [
    //         'category_name.required' => 'Category Name is required',
    //         'category_name.unique' => 'Category Name already Exist',
    //         'parent_id.required' => 'Parent is Required',
    //         // 'url.required' => 'URL is required',
    //         'description.required' => 'Description is required',
    //         'category_image.image' => 'Invalid Image',
    //     ];

    //     $validator = Validator::make($request->all(), $rules, $customMessages);

    //     // Check validation fails
    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 'false',
    //             'type' => 'error',
    //             'errors' => $validator->messages(),
    //         ]);
    //         ;
    //     }

    //     // Check for two-level restriction
    //     if ($request->parent_id and $request->parent_id != 0) {
    //         // $parentCategory = Category::find($request->parent_id);
    //         $parentCategory = $this->categoryService->getParentId($request->parent_id);
    //         if ($parentCategory && $this->categoryService->getCategoryById($parentCategory)->parent_id) {
    //             // If the parent has a parent, it means it's a sub-subcategory
    //             return response()->json([
    //                 'status' => 'false',
    //                 'type' => 'outoflimit',
    //                 'message' => 'You can only add subcategories to main categories (2 levels maximum).'
    //             ]);
    //         }
    //     }

    //     $data = $request->all();


    //     $imageName = $this->categoryService->uploadAndGetImage($request);
    //     if ($imageName) {
    //         $data['category_image'] = $imageName;
    //     } elseif (!empty($data['current_image'])) {
    //         $imageName = $data['current_image'];// Default to existing image
    //         $data['category_image'] = $imageName;
    //     } else {
    //         $data['category_image'] = "";
    //     }


    //     $data['url'] = $request->category_name;
    //     // Set parent_id to null if it's 0 (means it's a main category)
    //     if ($data['parent_id'] == 0) {
    //         $data['parent_id'] = null;
    //     }
    //     if ($this->categoryService->updateCategory($data['id'], $data)) {
    //         return response()->json([
    //             'status' => 'success',
    //             'type' => 'success',
    //             'message' => '/admin/categories',
    //         ]);
    //     }
    //     // Category::create($data);

    // }
}
