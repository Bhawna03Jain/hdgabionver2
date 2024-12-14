<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ImageService;
use App\Services\ProductService;
use App\Services\AttributeService;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    protected $categoryService;
    protected $productService;
    protected $imageService;
    protected $attributeService;

    public function __construct(CategoryService $categoryService, ProductService $productService, AttributeService $attributeService, ImageService $imageService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->imageService = $imageService;
        $this->attributeService = $attributeService;
    }
    public function index($catid)
    {

        $category = $this->categoryService->getCategoryById($catid);
        $cat_code = $category->code;

        if ($cat_code) {
            switch ($cat_code) {
                case 'baskets':
                    $products = $this->productService->getproductsWithAttributesByCatId
                    ($catid);
                    // dd($products);
                    //  $categories = $this->categoryService->getAllCategories();
                    return view('admin.products.baskets.index', compact('products', 'category'));
                case 'fences':
                case 'fence_materials':
                case 'basket_materials':

            }
        }

    }
    public function create($catid)
    {
        $category = $this->categoryService->getCategoryById($catid);
        $cat_code = $category->code;

        if ($cat_code) {
            switch ($cat_code) {
                case 'baskets':
                    // $products = $this->productService->getproductsByCatId($catid);
                    //  $categories = $this->categoryService->getAllCategories();
                    return view('admin.products.baskets.create', compact('category'));
                case 'fences':
                case 'fence_materials':
                case 'basket_materials':

            }
        }
        // dd("create");
        // $categories = $this->categoryService->getAllCategories();

    }
    public function store(Request $request)
    {

        $data = $request->all();
        // dd($data);
        $rules = [
            'category_id' => 'exists:categories,id',
            'name' => 'required|string|max:255',
            // |unique:products',
            'attributes.maze' => 'required',
            'main_image' => 'required|image',
            // 'relevant_images.*' => 'required',
            'attributes.length' => 'required|numeric|min:0',
            'attributes.depth' => 'required|numeric|min:0',
            'attributes.height' => 'required|numeric|min:0',
            'attributes.short_description' => 'required',

        ];
        $customMessages = [
            // 'category_id.required' => 'The category is required.',
            'category_id.exists' => 'The selected category does not exist.',
            'name.unique' => 'The product name has already been taken.',
            'name.required' => 'The product name is required.',
            'name.string' => 'The product name must be a string.',
            'name.max' => 'The product name may not exceed 255 characters.',
            'main_image.required' => 'The main image is required.',
            'main_image.image' => 'The main image must be a valid image file.',
            // 'relevant_images.*.image' => 'Each relevant image must be a valid image file.',
            'maze.required' => 'The maze size must be selected',
            'length.required' => 'The length is required.',
            'length.numeric' => 'The length must be a number.',
            'length.min' => 'The length must be at least 0.',
            'depth.required' => 'The depth is required.',
            'depth.numeric' => 'The depth must be a number.',
            'depth.min' => 'The depth must be at least 0.',
            'height.required' => 'The height is required.',
            'height.numeric' => 'The height must be a number.',
            'height.min' => 'The height must be at least 0.',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Check validation fails
        if ($validator->fails()) {
            // dd($validator->messages()[attributes . short_description]);
            $messages = $validator->messages()->toArray();

            $modifiedMessages = collect($messages)->mapWithKeys(function ($value, $key) {
                // Replace the dot with an underscore in the key if it matches "attributes.short_description"
                if ($key === 'attributes.short_description') {
                    return ['attributes_short_description' => "Short Description is required"];
                }
                if ($key === 'attributes.full_description') {
                    return ['attributes_full_description' => "Long Description is required"];
                }
                // Keep other keys as is
                return [$key => $value];
            });

            // Convert back to an array if needed
            $modifiedMessagesArray = $modifiedMessages->toArray();
            return response()->json([
                'status' => 'false',
                'type' => 'error',
                'errors' =>  $modifiedMessagesArray,
                // $validator->messages(),
            ]);
            ;
        }
        // dd($request->all());
        $imageName = $this->imageService->uploadAndGetImage($request, 'main_image', 'admin/images/products/baskets');
        $RelimageName = $this->imageService->uploadMultipleImages($request, 'relevant_images', 'admin/images/products/baskets');
        $data['main_image'] = $imageName;
        $data['relevant_images'] = $RelimageName;

// dd($data);

        // $this->productService->createProduct($data);
        if ($this->productService->createProduct($data)) {
            return response()->json([
                'status' => 'success',
                'type' => 'success',
                'message' => '/admin/products/'.$request->category_id,
            ]);
        }
        // return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    public function edit($productid)
    {
        $product = $this->productService->getproductById($productid);
        $category = $this->categoryService->getCategoryById($product->category_id);
        return view('admin.products.baskets.edit', compact('product', 'category'));
        // return response()->json([
        //     'product' => $product,
        //     'categories' => $categories
        // ]);
        // return view('products.index', compact('product', 'categories'));
    }
    public function update(Request $request)
    {
        // dd($request->all(   ));
        $data = $request->all();
        // dd($data);
        $rules = [
            'category_id' => 'exists:categories,id',
            'name' => 'required|string|max:255',
            // |unique:products',
            'attributes.maze' => 'required',
            'main_image' => 'required',
            // 'relevant_images.*' => 'required',
            'attributes.length' => 'required|numeric|min:0',
            'attributes.depth' => 'required|numeric|min:0',
            'attributes.height' => 'required|numeric|min:0',

        ];
        $customMessages = [
            // 'category_id.required' => 'The category is required.',
            'category_id.exists' => 'The selected category does not exist.',
            'name.unique' => 'The product name has already been taken.',
            'name.required' => 'The product name is required.',
            'name.string' => 'The product name must be a string.',
            'name.max' => 'The product name may not exceed 255 characters.',
            'main_image.required' => 'The main image is required.',
            'main_image.image' => 'The main image must be a valid image file.',
            // 'relevant_images.*.image' => 'Each relevant image must be a valid image file.',
            'maze.required' => 'The maze size must be selected',
            'length.required' => 'The length is required.',
            'length.numeric' => 'The length must be a number.',
            'length.min' => 'The length must be at least 0.',
            'depth.required' => 'The depth is required.',
            'depth.numeric' => 'The depth must be a number.',
            'depth.min' => 'The depth must be at least 0.',
            'height.required' => 'The height is required.',
            'height.numeric' => 'The height must be a number.',
            'height.min' => 'The height must be at least 0.',
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
        $imageName = $this->imageService->uploadAndGetImage($request, 'main_image', 'admin/images/products/baskets');
        if ($imageName) {
            $data['main_image'] = $imageName;
        } elseif ($imageName == "" && $request->main_image != "") {
            $data['main_image'] = $request->main_image;
        }
// dd($request->relevant_images);
        $relimageName = $this->imageService->uploadMultipleImages($request, 'relevant_images', 'admin/images/products/baskets');
        // dd(empty(json_decode($relimageName)));
        if (!empty(json_decode($relimageName))) {
            // dd("a");
            $data['relevant_images'] = $relimageName;
        } elseif (empty(json_decode($relimageName)) && $request->relevant_images != "") {
            // dd("b");
            $data['relevant_images'] = $request->relevant_images;
        }
        // $data['relevant_images'] = $relimageName;

        // dd($data);

        // $this->productService->createProduct($data);
        if ($this->productService->updateProduct($data)) {
            return response()->json([
                'status' => 'success',
                'type' => 'success',
                'message' => '/admin/products/' . $request->category_id,
            ]);
        }
        // return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
}
