<?php

namespace App\Http\Controllers;

use App\Services\AttributeService;
use App\Services\CategoryService;
use App\Services\ImageService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
            // 'sku' => 'required|string|max:255|unique:products',
            // 'name' => 'required|string|max:255',
            // |unique:products',
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products')->where(function ($query) use ($request) {
                    return $query->where('category_id', $request->category_id);
                }),
            ],
            'attributes.maze' => 'required',
            'main_image' => 'required|image',
            // 'relevant_images.*' => 'required',
            'attributes.length' => 'required|numeric|min:0',
            'attributes.depth' => 'required|numeric|min:0',
            'attributes.height' => 'required|numeric|min:0',
            'attributes.short_description' => 'required',

        ];
        $customMessages = [
            'category_id.exists' => 'The selected category does not exist.',
            // 'sku.required' => 'The SKU field is required.',
            // 'sku.string' => 'The SKU must be a valid string.',
            // 'sku.max' => 'The SKU may not exceed 255 characters.',
            // 'sku.unique' => 'The SKU has already been taken. Please use a unique SKU.',
            'name.unique' => 'The product name has already been taken.',
            'name.required' => 'The product name is required.',
            'name.string' => 'The product name must be a string.',
            'name.max' => 'The product name may not exceed 255 characters.',
            'main_image.required' => 'The main image is required.',
            'main_image.image' => 'The main image must be a valid image file.',
            'attributes.maze.required' => 'The maze size must be selected.',
            'attributes.length.required' => 'The length is required.',
            'attributes.length.numeric' => 'The length must be a number.',
            'attributes.length.min' => 'The length must be at least 0.',
            'attributes.depth.required' => 'The depth is required.',
            'attributes.depth.numeric' => 'The depth must be a number.',
            'attributes.depth.min' => 'The depth must be at least 0.',
            'attributes.height.required' => 'The height is required.',
            'attributes.height.numeric' => 'The height must be a number.',
            'attributes.height.min' => 'The height must be at least 0.',
            'attributes.short_description.required' => 'The short description is required.',
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
                'errors' => $modifiedMessagesArray,
                // $validator->messages(),
            ]);
            ;
        }
        // dd($data);
        $cat_code = $this->categoryService->getCategoryById($data['category_id'])->code;
        $sku = $this->productService->generateSku($data, $cat_code);
        $existingRecord = $this->productService->isSkuExists($sku, $data['category_id']);
        // dd($existingRecord);
        if ($existingRecord === "yes") {
            return response()->json([
                'status' => 'fail',
                'type' => 'duplicate',
                // 'message' => '/admin/products/'.$request->category_id,
            ]);
        } else {
            $imageName = $this->imageService->uploadAndGetImage($request, 'main_image', 'admin/images/products/baskets');
            $RelimageName = $this->imageService->uploadMultipleImages($request, 'relevant_images', 'admin/images/products/baskets');
            $data['main_image'] = $imageName;
            $data['relevant_images'] = $RelimageName;
            $data['sku'] = $sku;
            if ($existingRecord === "trashed") {
                $prod = $this->productService->getproductsByCatIdAndSku($sku, $data['category_id']);

                $prod = $this->productService->restore($prod->id);
                $data['product_id'] = $prod->id;
                if ($this->productService->updateProduct($data)) {
                    return response()->json([
                        'status' => 'success',
                        'type' => 'success',
                        'message' => '/admin/products/' . $request->category_id,
                    ]);
                }
            } else {

                if ($this->productService->createProduct($data)) {
                    return response()->json([
                        'status' => 'success',
                        'type' => 'success',
                        'message' => '/admin/products/' . $request->category_id,
                    ]);
                }
            }
        }

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
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products')
                    ->ignore($request->product_id) // Ignore the current product ID during update
                    ->where(function ($query) use ($request) {
                        return $query->where('category_id', $request->category_id);
                    }),
            ],

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

        // dd($data);
        $cat_code = $this->categoryService->getCategoryById($data['category_id'])->code;
        $sku = $this->productService->generateSku($data, $cat_code);
        $existingRecord = $this->productService->isSkuExists($sku, $data['category_id']);
        // dd($existingRecord);
        if ($existingRecord === "no") {
            $imageName = $this->imageService->uploadAndGetImage($request, 'main_image', 'admin/images/products/baskets');

            if ($imageName != "") {
                $data['main_image'] = $imageName;
            } elseif ($imageName == "" && $request->main_image != "") {
                $data['main_image'] = $request->main_image;
            }
            // dd($request->relevant_images);
            $relimageName = $this->imageService->uploadMultipleImages($request, 'relevant_images', 'admin/images/products/baskets');
            if (!empty(json_decode($relimageName))) {
                $data['relevant_images'] = $relimageName;
            } elseif (empty(json_decode($relimageName)) && $request->relevant_images != "") {
                $data['relevant_images'] = $request->relevant_images;
            }
            $data['sku'] = $sku;
            if ($this->productService->updateProduct($data)) {
                return response()->json([
                    'status' => 'success',
                    'type' => 'success',
                    'message' => '/admin/products/' . $request->category_id,
                ]);
            }
        } elseif ($existingRecord === "yes") { {
                $prod = $this->productService->getproductsByCatIdAndSku($sku, $data['category_id'])->where('id', $data['product_id']);
                if ($prod) {
                    $imageName = $this->imageService->uploadAndGetImage($request, 'main_image', 'admin/images/products/baskets');

                    if ($imageName != "") {
                        $data['main_image'] = $imageName;
                    } elseif ($imageName == "" && $request->main_image != "") {
                        $data['main_image'] = $request->main_image;
                    }
                    // dd($request->relevant_images);
                    $relimageName = $this->imageService->uploadMultipleImages($request, 'relevant_images', 'admin/images/products/baskets');
                    if (!empty(json_decode($relimageName))) {
                        $data['relevant_images'] = $relimageName;
                    } elseif (empty(json_decode($relimageName)) && $request->relevant_images != "") {
                        $data['relevant_images'] = $request->relevant_images;
                    }
                    $data['sku'] = $sku;
                    if ($this->productService->updateProduct($data)) {
                        return response()->json([
                            'status' => 'success',
                            'type' => 'success',
                            'message' => '/admin/products/' . $request->category_id,
                        ]);
                    }
                }
            }
        } else {
            return response()->json([
                'status' => 'fail',
                'type' => 'duplicate',
                // 'message' => '/admin/products/'.$request->category_id,
            ]);
        }
        // if ($existingRecord === "yes") {
        //     return response()->json([
        //         'status' => 'fail',
        //         'type' => 'duplicate',
        //         // 'message' => '/admin/products/'.$request->category_id,
        //     ]);
        // } else {}



        // return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    public function stock()
    {
        $products = Product::with('transactions')->get();
        return view('products.stock', compact('products'));
    }
}
