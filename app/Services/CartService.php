<?php
namespace App\Services;

use App\Repositories\AttributeRepository;
use App\Repositories\cartItemRepository;
use App\Repositories\CartRepository;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;




class CartService
{
    protected $cartItemRepository;


    public function __construct(CartRepository $cartRepository)
    {
        $this->cartItemRepository = $cartRepository;

    }

    public function getAllcartItems()
    {
        return $this->cartItemRepository->getAll();
    }

    public function getcartItemById($id)
    {
        return $this->cartItemRepository->findById($id);
    }
    public function getcartItemsByProductId($prodid)
    {
        return $this->cartItemRepository->getAll()->where('product_id', $prodid);
    }
    public function getcartItemsByUserId($userid)
    {
        return $this->cartItemRepository->getAll()->where('user_id', $userid);
    }
    public function getcartItemsByGuestId($guestid)
    {
        return $this->cartItemRepository->getAll()->where('guest_id', $guestid);
    }
    // public function getcartItemsWithAttributesByCatId($catid)
    // {
    //     return $this->cartItemRepository->getAll()->where('category_id', $catid);
    // }
    public function createcartItem($data)
    {

        $cartItem = $this->cartItemRepository->create($data);

        // Save attributes with cartItem_id reference
        // if (isset($data['attributes'])) {
        //     foreach ($data['attributes'] as $key => $attributeData) {
        //         $this->attributeRepository->create(
        //             [
        //                 'cartItem_id' => $cartItem->id,
        //                 'name' => $key, // name key from attribute data
        //                 'value' => $attributeData, // value key from attribute data

        //             ]

        //         );
        //     }
        // }
        return $cartItem;
        // $cartItem = $this->cartItemRepository->create($data);
        // return $this->attributeRepository->create($data);
    }
    // public function restore($id)
    // {

    //     return $this->cartItemRepository->restore($id);
    // }
    public function updatecartQuantity($data)
    {
        return $this->cartItemRepository->update($data);

    }
    public function updatecartItem($data)
    {
        // Fetch the existing cartItem
        // $cartItemId = $data['cartItem_id'];
        // $cartItem = $this->cartItemRepository->find($cartItemId);

        // if (!$cartItem) {
        //     throw new \Exception('cartItem not found'); // Handle the case if cartItem not found
        // }

        // Update cartItem data
        $cartItem = $this->cartItemRepository->update($data);
        // dd($data);
        // Update or create attributes with cartItem_id reference
        // if (isset($data['attributes'])) {
        //     // $this->attributeRepository->update($data['attributes']);
        //     foreach ($data['attributes'] as $key => $attributeData) {
        //         // dd($data);
        //         $attribute = $this->attributeRepository->findBycartItemAndName($data['cartItem_id'], $key);
        //         // dd($attribute);
        //         if ($attribute) {
        //             // dd($attributeData);
        //             // If attribute exists, update the value
        //             $attribute->value = $attributeData;
        //             // dd($attribute);
        //             $this->attributeRepository->update($attribute);
        //         } else {
        //             // If attribute does not exist, create it
        //             $this->attributeRepository->create([
        //                 'cartItem_id' => $cartItem->id,
        //                 'name' => $key, // name key from attribute data
        //                 'value' => $attributeData, // value key from attribute data
        //             ]);
        //         }
        //     }
        // }

        return $cartItem;
    }

    // public function updatecartItem($data)
    // {
    //     return $this->cartItemRepository->update($data);
    // }

    public function deletecartItem($id)
    {
        return $this->cartItemRepository->delete($id);
    }
    public function getcartByUserIdAndProductId($userid,$productid)
    {
return $this->cartItemRepository->getcartByUserIdAndProductId($userid,$productid);
    }
    // public function generateSku($data, $cat_code)
    // {
    //     if ($cat_code === 'baskets') {
    //         if (isset($data['attributes'])) {
    //             $sku = $cat_code . "-" . $data['attributes']['length'] . "-" . $data['attributes']['depth'] . "-" . $data['attributes']['height'] . "-" . $data['attributes']['maze'];
    //         }
    //         return $sku;
    //     }
    // }
}
