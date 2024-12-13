<?php
namespace App\Services;

use App\Repositories\AttributeRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;




class ProductService
{
    protected $productRepository;
    protected $attributeRepository;

    public function __construct(ProductRepository $productRepository, AttributeRepository $attributeRepository)
    {
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
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
    public function createproduct($data)
    {
        $product = $this->productRepository->create($data);

        // Save attributes with product_id reference
        if (isset($data['attributes'])) {
            foreach ($data['attributes'] as $key=>$attributeData) {
                $this->attributeRepository->create([
                    'product_id' => $product->id,
                    'name' => $key, // name key from attribute data
                    'value' => $attributeData, // value key from attribute data

                ]

            );
            }
        }
        return $product;
        // $product = $this->productRepository->create($data);
        // return $this->attributeRepository->create($data);
    }

    public function updateproduct($data)
    {
        return $this->productRepository->update($data);
    }

    public function deleteproduct($id)
    {
        return $this->productRepository->delete($id);
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
