<?php
namespace App\Services;

use App\Repositories\AttributeRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;




class AttributeService
{
    protected $attributeRepository;

    public function __construct(AttributeRepository $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    public function getAllAttributes()
    {
        return $this->attributeRepository->getAll();
    }
    public function updateAttribute($attributeData, $attributeId) {
        // Find the attribute by ID
        $attribute = $this->attributeRepository->findById($attributeId);

        if (!$attribute) {
            // throw new ModelNotFoundException('Attribute not found.');
            return false;
        }

        // Update the attribute
        $this->attributeRepository->update($attributeData, $attributeId);

        return $attribute;
    }

    // public function getproductById($id)
    // {
    //     return $this->attributeRepository->findById($id);
    // }
    // public function getAttributesByCatId($catid)
    // {
    //     return $this->attributeRepository->getAll()->where('category_id',$catid);
    // }
    public function findByProductAndName($productId, $name) {
        return $this->attributeRepository->findByProductAndName($productId, $name);
        // where('product_id', $productId)->where('name', $name)->first();
    }
    public function createAttribute($data)
    {
        // dd($data);
        return $this->attributeRepository->create($data);
    }

    // public function updateproduct($data)
    // {
    //     return $this->attributeRepository->update($data);
    // }

    // public function deleteproduct($id)
    // {
    //     return $this->attributeRepository->delete($id);
    // }

//     public function uploadAndGetImage(Request $request)
// {
//     if ($request->hasFile('main_image')) {
//         $image_tmp = $request->file('main_image');

//         if ($image_tmp->isValid()) {
//             // Define the folder path
//             $folderPath = public_path('admin/images/Attributes');

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
    //     return $this->attributeRepository->getproductIdByCode($code)->id;
    // }

}
