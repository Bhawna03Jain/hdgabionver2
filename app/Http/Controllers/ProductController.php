<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\AttributeService;
use App\Services\CategoryService;
use App\Services\ImageService;
use App\Services\MasterSheetBOQConfigService;
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

    protected $MasterSheetBOQConfigService;


    public function __construct(MasterSheetBOQConfigService $MasterSheetBOQConfigService, CategoryService $categoryService, ProductService $productService, AttributeService $attributeService, ImageService $imageService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->imageService = $imageService;
        $this->attributeService = $attributeService;
        $this->MasterSheetBOQConfigService = $MasterSheetBOQConfigService;
    }
    public function index($catid)
    {

        $category = $this->categoryService->getCategoryById($catid);
        $cat_code = $category->code;
        // dd($cat_code);
        if ($cat_code) {
            switch ($cat_code) {
                case 'baskets':
                    $products = $this->productService->getproductsWithAttributesByCatId
                    ($catid);
                    //   foreach($products as $product){

                    //     $price = json_decode($product->json_format, true);
                    //     if($price && isset($price['country_margin'])){
                    //         // dd($price['country_margin']);
                    //         $margin_factor=$price['country_margin'][1]['margin_factors'];
                    //         $discount_per=$price['country_margin'][1]['discount_per'];

                    //         $price_with_vat=$price['country_margin'][1]['price_with_vat_netto'];
                    //         $price_after_discount=$price_with_vat*(1-$price['country_margin'][1]['discount_per'])/100;

                    //     }
                    //   }

                    //  $categories = $this->categoryService->getAllCategories();
                    return view('admin.products.baskets.index', compact('products', 'category'));
                case 'parts':

                    $products = $this->productService->getproductsWithAttributesByCatId
                    ($catid);
                    // dd($products);
                    //  $categories = $this->categoryService->getAllCategories();
                    return view('admin.products.parts.index', compact('products', 'category'));

                case 'others':


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
                    $products = $this->productService->getproductsByCatId($catid);
                    //  $categories = $this->categoryService->getAllCategories();
                    return view('admin.products.baskets.create', compact('category'));
                case 'parts':
                    $products = $this->productService->getproductsByCatId($catid);
                    // dd($products);
                    //  $categories = $this->categoryService->getAllCategories();
                    return view('admin.products.parts.create', compact('category'));

                case 'others':


            }
        }
        // dd("create");
        // $categories = $this->categoryService->getAllCategories();

    }
    public function store(Request $request)
    {

        $data = $request->all();
        // dd($data);
        $category = $this->categoryService->getCategoryById($data['category_id']);
        $cat_code = $category->code;

        if ($cat_code) {
            switch ($cat_code) {
                case 'baskets':
                    // dd($data);
                    $rules = [
                        'category_id' => 'exists:categories,id',
                        'name' => [
                            'required',
                            'string',
                            'max:255',
                            Rule::unique('products')->where(function ($query) use ($request) {
                                return $query->where('category_id', $request->category_id);
                            }),
                        ],
                        'attributes.maze' => 'required',
                        'article_no' => 'required|unique:products',
                        'main_image' => 'required|image',
                        // 'relevant_images.*' => 'required',
                        'attributes.length' => 'required|numeric|min:0',
                        'attributes.width' => 'required|numeric|min:0',
                        'attributes.height' => 'required|numeric|min:0',
                        'attributes.short_description' => 'required',

                    ];
                    $customMessages = [
                        'category_id.exists' => 'The selected category does not exist.',
                        'name.unique' => 'The product name has already been taken.',
                        'name.required' => 'The product name is required.',
                        'name.string' => 'The product name must be a string.',
                        'name.max' => 'The product name may not exceed 255 characters.',
                        'article_no.required' => 'The Article No name is required.',
                        'article_no.unique' => 'The Article No name has already been taken.',
                        'main_image.required' => 'The main image is required.',
                        'main_image.image' => 'The main image must be a valid image file.',
                        'attributes.maze.required' => 'The maze size must be selected.',
                        'attributes.length.required' => 'The length is required.',
                        'attributes.length.numeric' => 'The length must be a number.',
                        'attributes.length.min' => 'The length must be at least 0.',
                        'attributes.width.required' => 'The width is required.',
                        'attributes.width.numeric' => 'The width must be a number.',
                        'attributes.width.min' => 'The width must be at least 0.',
                        'attributes.height.required' => 'The height is required.',
                        'attributes.height.numeric' => 'The height must be a number.',
                        'attributes.height.min' => 'The height must be at least 0.',
                        'attributes.short_description.required' => 'The short description is required.',
                    ];
                    break;
                case 'parts':
                    $rules = [
                        'category_id' => 'exists:categories,id',
                        'name' => [
                            'required',
                            'string',
                            'max:255',
                            Rule::unique('products')->where(function ($query) use ($request) {
                                return $query->where('category_id', $request->category_id);
                            }),
                        ],

                        'article_no' => 'required|unique:products',
                        'attributes.unit_price' => 'required',
                        'main_image' => 'required|image',
                        // 'relevant_images.*' => 'required',
                        // 'attributes.length' => 'required|numeric|min:0',
                        // 'attributes.width' => 'required|numeric|min:0',
                        // 'attributes.height' => 'required|numeric|min:0',
                        'attributes.short_description' => 'required',
                        // 'attributes.maze' => 'required',

                    ];
                    $customMessages = [
                        'category_id.exists' => 'The selected category does not exist.',
                        'name.unique' => 'The product name has already been taken.',
                        'name.required' => 'The product name is required.',
                        'name.string' => 'The product name must be a string.',
                        'name.max' => 'The product name may not exceed 255 characters.',
                        'article_no.required' => 'The Article No name is required.',
                        'article_no.unique' => 'The Article No name has already been taken.',
                        'main_image.required' => 'The main image is required.',
                        'main_image.image' => 'The main image must be a valid image file.',
                        // 'attributes.maze.required' => 'The maze size must be selected.',
                        'attributes.unit_price.required' => 'The length is required.',
                        // 'attributes.length.numeric' => 'The length must be a number.',
                        // 'attributes.length.min' => 'The length must be at least 0.',
                        // 'attributes.width.required' => 'The width is required.',
                        // 'attributes.width.numeric' => 'The width must be a number.',
                        // 'attributes.width.min' => 'The width must be at least 0.',
                        // 'attributes.height.required' => 'The height is required.',
                        // 'attributes.height.numeric' => 'The height must be a number.',
                        // 'attributes.height.min' => 'The height must be at least 0.',
                        'attributes.short_description.required' => 'The short description is required.',
                    ];
                case 'others':
            }
        }

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
        if ($cat_code) {
            switch ($cat_code) {
                case 'baskets':
                    $sku = $this->productService->generateSku($data, $cat_code);

                    break;
                case 'parts':
                    $sku = 'parts-' . $data['article_no'];
            }
        }
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
            // ****************calculate Price from BOQ*****************

            if ($cat_code) {
                switch ($cat_code) {
                    case 'baskets':
                        $BasketBOQData = $this->MasterSheetBOQConfigService->createSingleBasketBOQPrice($data, $cat_code);
                        $data['json_format'] = json_encode($BasketBOQData, true);
                        // dd($data);
                        break;
                    case 'parts':

                }
            }

            // ****************End calculate Price from BOQ*****************

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
                // Remove any null values from the 'attributes' array
                if (isset($data['attributes']) && is_array($data['attributes'])) {
                    $data['attributes'] = array_filter($data['attributes'], function ($value) {
                        return $value !== null;
                    });
                }
                // dd($data);
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
        // $category = $this->categoryService->getCategoryById($catid);
        $cat_code = $category->code;
        // dd($cat_code);
        if ($cat_code) {
            switch ($cat_code) {
                case 'baskets':
                    // $products = $this->productService->getproductsWithAttributesByCatId
                    // ($catid);
                    // dd($products);
                    //  $categories = $this->categoryService->getAllCategories();
                    return view('admin.products.baskets.edit', compact('product', 'category'));
                case 'parts':

                    // $products = $this->productService->getproductsWithAttributesByCatId
                    // ($catid);
                    // dd($products);
                    //  $categories = $this->categoryService->getAllCategories();
                    return view('admin.products.parts.edit', compact('product', 'category'));

                case 'others':


            }
        }
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
        // $data = $request->all();s
        $category = $this->categoryService->getCategoryById($data['category_id']);
        $cat_code = $category->code;

        if ($cat_code) {
            switch ($cat_code) {
                case 'baskets':

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
                        'article_no' => [
                            'required',
                            'string',
                            'max:255',
                            Rule::unique('products')
                                ->ignore($request->product_id) // Ignore the current product ID during update

                        ],

                        'attributes.maze' => 'required',
                        'main_image' => 'required',
                        // 'relevant_images.*' => 'required',
                        'attributes.length' => 'required|numeric|min:0',
                        'attributes.width' => 'required|numeric|min:0',
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
                        'article_no.required' => 'The Article No name is required.',
                        'article_no.unique' => 'The Article No name has already been taken.',
                        'main_image.required' => 'The main image is required.',
                        'main_image.image' => 'The main image must be a valid image file.',
                        // 'relevant_images.*.image' => 'Each relevant image must be a valid image file.',
                        'maze.required' => 'The maze size must be selected',
                        'length.required' => 'The length is required.',
                        'length.numeric' => 'The length must be a number.',
                        'length.min' => 'The length must be at least 0.',
                        'width.required' => 'The width is required.',
                        'width.numeric' => 'The width must be a number.',
                        'width.min' => 'The width must be at least 0.',
                        'height.required' => 'The height is required.',
                        'height.numeric' => 'The height must be a number.',
                        'height.min' => 'The height must be at least 0.',
                        'attributes.short_description.required' => 'The short description is required.',

                    ];
                    break;
                case 'parts':

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
                        'article_no' => [
                            'required',
                            'string',
                            'max:255',
                            Rule::unique('products')
                                ->ignore($request->product_id) // Ignore the current product ID during update

                        ],

                        'attributes.unit_price' => 'required',
                        'main_image' => 'required',
                        // 'relevant_images.*' => 'required',
                        // 'attributes.length' => 'numeric|min:0',
                        // 'attributes.width' => 'required|numeric|min:0',
                        // 'attributes.height' => 'required|numeric|min:0',
                        'attributes.short_description' => 'required',


                    ];
                    $customMessages = [
                        // 'category_id.required' => 'The category is required.',
                        'category_id.exists' => 'The selected category does not exist.',
                        'name.unique' => 'The product name has already been taken.',
                        'name.required' => 'The product name is required.',
                        'name.string' => 'The product name must be a string.',
                        'name.max' => 'The product name may not exceed 255 characters.',
                        'article_no.required' => 'The Article No name is required.',
                        'article_no.unique' => 'The Article No name has already been taken.',
                        'main_image.required' => 'The main image is required.',
                        'main_image.image' => 'The main image must be a valid image file.',
                        // 'relevant_images.*.image' => 'Each relevant image must be a valid image file.',
                        'unit_price.required' => 'The maze size must be selected',
                        // 'length.required' => 'The length is required.',
                        // 'length.numeric' => 'The length must be a number.',
                        // 'length.min' => 'The length must be at least 0.',
                        // 'width.required' => 'The width is required.',
                        // 'width.numeric' => 'The width must be a number.',
                        // 'width.min' => 'The width must be at least 0.',
                        // 'height.required' => 'The height is required.',
                        // 'height.numeric' => 'The height must be a number.',
                        // 'height.min' => 'The height must be at least 0.',
                        'attributes.short_description.required' => 'The short description is required.',

                    ];
                    break;
                case 'others':


            }
        }


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
        // $sku = $this->productService->generateSku($data, $cat_code);

        if ($cat_code) {
            switch ($cat_code) {
                case 'baskets':
                    $sku = $this->productService->generateSku($data, $cat_code);
                    break;
                case 'parts':
                    $sku = 'parts-' . $data['article_no'];
            }
        }
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
                // dd($prod);
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
                    // ****************calculate Price from BOQ*****************

                    if ($cat_code) {
                        switch ($cat_code) {
                            case 'baskets':
                                $BasketBOQData = $this->MasterSheetBOQConfigService->createSingleBasketBOQPrice($data, $cat_code);
                                $data['json_format'] = json_encode($BasketBOQData, true);
                                // dd($data);
                                break;
                            case 'parts':

                        }
                    }

                    // ****************End calculate Price from BOQ*****************
                    // dd($data);
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

    public function filterData($type, Request $request)
    {
        // dd($request->all());
        $catid = $this->categoryService->getCategoryByCode($type)->id;

        switch ($type) {
            case 'baskets':

                $query = Product::query();
                $query->where('category_id', $catid);
                // if ($request->filled('length') && !in_array('length_all', $request->length)) {
                //     $query->whereHas('attributes', function ($q) use ($request) {
                //         $q->where('name', 'length')->whereIn('value', $request->length);
                //     });
                // }
                // Apply Length Filter
                if ($request->filled('length') && !in_array('length_all', $request->length)) {
                    $query->whereHas('attributes', function ($q) use ($request) {
                        $q->where('name', 'length')
                            ->whereIn('value', $request->length);
                    });
                }

                // Apply width Filter
                if ($request->filled('width') && !in_array('width_all', $request->width)) {
                    $query->whereHas('attributes', function ($q) use ($request) {
                        $q->where('name', 'width')
                            ->whereIn('value', $request->width);
                    });
                }
                if ($request->filled('height') && !in_array('height_all', $request->height)) {
                    $query->whereHas('attributes', function ($q) use ($request) {
                        $q->where('name', 'height')
                            ->whereIn('value', $request->height);
                    });
                }
                if ($request->filled('maze') && !in_array('maze_all', $request->maze)) {
                    $query->whereHas('attributes', function ($q) use ($request) {
                        $q->where('name', 'maze')
                            ->whereIn('value', $request->maze);
                    });
                }
                // Get the filtered results
                $products = $query->with('attributes')->get();
                // dd($products);
                $country_id=1;
                $pricelist = [];
                foreach ($products as $product) {

                    $price = json_decode($product->json_format, true);

                    if ($price && isset($price['country_margin'])) {
                        // dd($price['country_margin']);
                        // $margin_factor[$product->id]=$price['country_margin'][1]['margin_factors'];

                        $pricelist['discount_per'][$country_id][$product->id] = $price['country_margin'][$country_id]['discount_per'];

                        $pricelist['price_with_vat'][$country_id][$product->id] = $price['country_margin'][$country_id]['price_with_vat_netto'];
                        $pricelist['price_after_discount'][$country_id][$product->id] = $pricelist['price_with_vat'][$country_id][$product->id] * (1 - ($price['country_margin'][$country_id]['discount_per'] / 100));

                    }
                }
                // dd($pricelist);
                // dd($products[0]['attributes']);
                return response()->json([
                    'type' => 'success',
                    'products' => $products,
                    'price' => $pricelist,
                    'country_id'=>$country_id,
                    'message' => '/baskets'
                ]);
            // $query = Product::query();
            // dd($query);
        }

    }

    public function isProductByNameExist(Request $request)
    {
        $exists = $this->productService->isProductByNameExist($request->name);
        return response()->json(['exists' => $exists]);
    }
    public function isProductByArticleExist(Request $request)
    {
        $exists = $this->productService->isProductByArticleExist($request->article_no);
        return response()->json(['exists' => $exists]);
    }
    public function isProductByHSCodeExist(Request $request)
    {
        $exists = $this->productService->isProductByHSCodeExist($request->hs_code);
        return response()->json(['exists' => $exists]);
    }
    public function getLastNo($column)
    {

        $no = $this->productService->getLastNo($column);

        return response()->json(['no' => $no]);
    }

    // *****************************Front End*************************************
    public function products($type)
    {
        // dd($type);
        $category = $this->categoryService->getCategoryByCode($type);
        $cat_code = $type;
        $products = $this->productService->getproductsWithAttributesByCatId($category->id);
        $country_id=1;
        foreach ($products as $product) {

            $price = json_decode($product->json_format, true);
            if ($price && isset($price['country_margin'])) {
                // dd($price['country_margin']);
                // $margin_factor[$product->id]=$price['country_margin'][1]['margin_factors'];

                $discount_per[$country_id][$product->id] = $price['country_margin'][$country_id]['discount_per'];

                $price_with_vat[$country_id][$product->id] = $price['country_margin'][$country_id]['price_with_vat_netto'];
                $price_after_discount[$country_id][$product->id] = $price_with_vat[$country_id][$product->id] * (1 - ($price['country_margin'][$country_id]['discount_per'] / 100));

            }
        }
        // foreach ($products as $product) {
        //     if ($product->article_no == "1000030") {


        //         dd($product->json_format);
        //     }
        // }
        if ($cat_code) {
            return view('front.products.products', compact('products', 'category', 'cat_code', 'country_id', 'price_with_vat', 'price_after_discount'));

            // switch ($cat_code) {
            //     case 'baskets':
            //         $products = $this->productService->getproductsWithAttributesByCatId
            //         ($catid);
            //            return view('front.products.products', compact('products', 'category'));
            //     case 'parts':

            //     $products = $this->productService->getproductsWithAttributesByCatId
            //     ($catid);
            //     // dd($products);
            //     //  $categories = $this->categoryService->getAllCategories();
            //     return view('admin.products.parts.index', compact('products', 'category'));

            // case 'others':


            // }
            // return view('front.products.product');
        }
    }
    public function productDetail($type, $id)
    {
        // dd($type);
        $category = $this->categoryService->getCategoryByCode($type);
        $cat_code = $type;
        $product = $this->productService->getproductById($id);

        $price_with_vat = null;
        $price_after_discount = null;
        $discount_per = null;

        if ($product) {
            $price = json_decode($product->json_format, true);
            $country_id = 1; // Default country ID

            if ($price && isset($price['country_margin'][$country_id])) {
                $country_margin = $price['country_margin'][$country_id];

                // Calculate prices with discounts
                $discount_per = $country_margin['discount_per'] ?? 0;
                $price_with_vat = $country_margin['price_with_vat_netto'] ?? 0;
                $price_after_discount = $price_with_vat * (1 - ($discount_per / 100));
                // $price_after_discount = $price_with_vat * (1 - ($discount_per / 100));
            }
        }

        // Check if category exists
        if ($cat_code) {
            return view('front.products.product-detail', compact(
                'product',
                'category',
                'cat_code',
                'country_id',
                'price_with_vat',
                'price_after_discount',
                'discount_per',

            ));
        }

        // $category = $this->categoryService->getCategoryByCode($type);
        // $cat_code = $type;
        // $product = $this->productService->getproductById($id);
        // $price = json_decode($product->json_format, true);
        // $country_id=1;
        // if ($price && isset($price['country_margin'])) {
        //     // dd($price['country_margin']);
        //     // $margin_factor[$product->id]=$price['country_margin'][1]['margin_factors'];

        //     $discount_per[$country_id][$product->id] = $price['country_margin'][$country_id]['discount_per'];

        //     $price_with_vat[$country_id][$product->id] = $price['country_margin'][$country_id]['price_with_vat_netto'];
        //     $price_after_discount[$country_id][$product->id] = $price_with_vat[$country_id][$product->id] * (1 - ($price['country_margin'][$country_id]['discount_per'] / 100));

        // }
        // // dd($product);
        // // $products = $this->productService->getproductsWithAttributesByCatId($category->id);
        // if ($cat_code) {
        //     return view('front.products.product-detail', compact('product', 'category', 'cat_code', 'country_id', 'price_with_vat', 'price_after_discount'));

        // }
    }
    // *********************************End Front End***********************************
}
