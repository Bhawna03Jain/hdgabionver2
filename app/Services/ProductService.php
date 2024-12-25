<?php
namespace App\Services;

use App\Repositories\AttributeRepository;
use App\Repositories\MarginFactorsConfigRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use DB;




class ProductService
{
    protected $productRepository;
    protected $attributeRepository;
    protected $marginFactorRepository;
    public function __construct(ProductRepository $productRepository, AttributeRepository $attributeRepository, MarginFactorsConfigRepository $marginFactorRepository)
    {
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
        $this->marginFactorRepository = $marginFactorRepository;
    }

    public function getAllProducts()
    {
        return $this->productRepository->getAll();
    }

    public function getproductById($id)
    {
        return $this->productRepository->findById($id);
    }
    public function getproductsByCatId($catid)
    {
        return $this->productRepository->getAll()->where('category_id', $catid);
    }
    public function getproductsWithAttributesByCatId($catid)
    {
        return $this->productRepository->getAll()->where('category_id', $catid);
    }
    public function getProductsWithAttributesByCategoryCodes(array $cat_codes)
    {
        return $this->productRepository->getProductsWithAttributesByCategoryCodes($cat_codes);
    }
    // public function createproduct($data)
    // {

    //     $product = $this->productRepository->create($data);

    //     // Save attributes with product_id reference
    //     if (isset($data['attributes'])) {
    //         foreach ($data['attributes'] as $key => $attributeData) {
    //             if ($key === 'margin_factor') {
    //                 $margin_factor = $this->marginFactorRepository->create(
    //                     [
    //                         'product_id' => $product->id,
    //                         'country_id' => 1,
    //                         'margin_factor' => $attributeData, // name key from attribute data
    //                         'discount_per' => 0, // value key from attribute data
    //                         'product_type' => 'product',
    //                         'cost' => 0,
    //                     ]

    //                 );
    //             } else {
    //                 $attribute = $this->attributeRepository->create(
    //                     [
    //                         'product_id' => $product->id,
    //                         'name' => $key, // name key from attribute data
    //                         'value' => $attributeData, // value key from attribute data

    //                     ]

    //                 );
    //             }
    //         }
    //     }
    //     if ($product && $attribute && $margin_factor) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    //     // return $product;
    //     // $product = $this->productRepository->create($data);
    //     // return $this->attributeRepository->create($data);
    // }

    public function createProduct($data)
{
    DB::beginTransaction(); // Start transaction

    try {
        $product = $this->productRepository->create($data);

        // Save attributes with product_id reference
        if (isset($data['attributes'])) {
            foreach ($data['attributes'] as $key => $attributeData) {
                if ($key === 'margin_factor') {
                    $this->marginFactorRepository->create([
                        'product_id' => $product->id,
                        'country_id' => 1,
                        'margin_factor' => $attributeData, // name key from attribute data
                        'discount_per' => 0, // value key from attribute data
                        'product_type' => 'product',
                        'cost' => 0,
                    ]);
                } else {
                    $this->attributeRepository->create([
                        'product_id' => $product->id,
                        'name' => $key, // name key from attribute data
                        'value' => $attributeData, // value key from attribute data
                    ]);
                }
            }
        }

        // Commit transaction if all operations are successful
        DB::commit();

        return true;
    } catch (\Exception $e) {
        // Rollback transaction if any error occurs
        DB::rollBack();

        // Optionally, log the exception or return false
        Log::error('Error creating product: ' . $e->getMessage());

        return false;
    }
}

    public function restore($id)
    {

        return $this->productRepository->restore($id);
    }
    public function updateProduct($data)
    {
        // Fetch the existing product
        // $productId = $data['product_id'];
        // $product = $this->productRepository->find($productId);

        // if (!$product) {
        //     throw new \Exception('Product not found'); // Handle the case if product not found
        // }

        // Update product data
        $product = $this->productRepository->update($data);
        // dd($data);
        // Update or create attributes with product_id reference
        if (isset($data['attributes'])) {
            // $attributes = $request->input('attributes', []);

            // Remove null or empty values
            $data['attributes'] = array_filter($data['attributes'], function ($value) {
                return !is_null($value) && $value !== '';
            });
            // $this->attributeRepository->update($data['attributes']);
            foreach ($data['attributes'] as $key => $attributeData) {
                // dd($key);
                $attribute = $this->attributeRepository->findByProductAndName($data['product_id'], $key);
                // dd($attribute);
                if ($attribute) {
                    // dd($attributeData);
                    // If attribute exists, update the value
                    $attribute->value = $attributeData;
                    // dd($attribute);
                    $this->attributeRepository->update($attribute);
                } else {
                    // dd($data);
                    // If attribute does not exist, create it
                    $this->attributeRepository->create([
                        'product_id' => $data['product_id'],
                        'name' => $key, // name key from attribute data
                        'value' => $attributeData, // value key from attribute data
                    ]);
                }
            }
        }

        return $product;
    }

    // public function updateproduct($data)
    // {
    //     return $this->productRepository->update($data);
    // }

    public function deleteproduct($id)
    {
        return $this->productRepository->delete($id);
    }
    public function generateSku($data, $cat_code)
    {
        if ($cat_code === 'baskets') {
            if (isset($data['attributes'])) {
                $sku = $cat_code . "-" . $data['attributes']['length'] . "-" . $data['attributes']['width'] . "-" . $data['attributes']['height'] . "-" . $data['attributes']['maze'];
            }
            return $sku;
        }
    }
    public function getproductsByCatIdAndSku($sku, $cat_id)
    {
        $prod = $this->productRepository->getproductsByCatIdAndSku($sku, $cat_id);
        return $prod;
    }
    public function isProductByNameExist($name)
    {
        $exists = $this->productRepository->isProductByNameExist(($name));

        return $exists;
    }
    public function isProductByArticleExist($article)
    {

        $exists = $this->productRepository->isProductByArticleExist(($article));

        return $exists;
    }
    public function isProductByHSCodeExist($hs_code)
    {

        $exists = $this->productRepository->isProductByHSCodeExist(($hs_code));

        return $exists;
    }

    public function isSkuExists($sku, $cat_id)
    {

        $prod = $this->productRepository->getproductsByCatIdAndSku($sku, $cat_id);
        if (!$prod) {
            return "no";
        } else {
            // Check if soft deleted
            if ($prod->deleted_at !== null) {
                return "trashed";
            } else {
                return "yes";
            }
        }

        // dd($isexist);
    }
    public function getLastNo($column)
    {
        $lastNo = $this->productRepository->getLastNo($column);

        return $lastNo;
    }
    //     public function uploadAndGetImage(Request $request)
// {
//     if ($request->hasFile('main_image')) {
//         $image_tmp = $request->file('main_image');

    //         if ($image_tmp->isValid()) {
//             // Define the folder path
//             $folderPath = public_path('admin/images/products');

    //             // Check if the folder exists, if not, create it
//             if (!is_dir($folderPath)) {
//                 mkdir($folderPath, 0755, true); // Create the folder with proper permissions
//             }

    //             // Upload the image
//             $extension = $image_tmp->getClientOriginalExtension();
//             $imageName = rand(111, 99999) . '.' . $extension;
//             $imagePath = $folderPath . '/' . $imageName;

    //             $this->imageManager->read($image_tmp)->save($imagePath);

    //             return $imageName;
//         }
//     }

    //     return "";
// }

    // public function getproductIdByCode($code)
    // {
    //     return $this->productRepository->getproductIdByCode($code)->id;
    // }

}
