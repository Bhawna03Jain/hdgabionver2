<?php
namespace App\Services;

use App\Models\CartItem;
use App\Repositories\AttributeRepository;
use App\Repositories\cartItemRepository;
use App\Repositories\CartRepository;
use Auth;
use Illuminate\Http\Request;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Session;

class CartService
{
    protected $cartItemRepository;
    protected $productService;
    // protected $cartService;

    public function __construct(CartRepository $cartRepository,ProductService $productService)
    {
        $this->cartItemRepository = $cartRepository;
        $this->productService = $productService;
        // $this->cartService = $cartService;


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
    public function getcartByUserIdAndProductId($userid, $productid)
    {
        return $this->cartItemRepository->getcartByUserIdAndProductId($userid, $productid);
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
    public function getCartItemsForUser()
    {
        if (Auth::check()) {
            return CartItem::where('user_id', Auth::user()->id)->get();
        } else {
            return session()->get('cart', []);
        }
    }
    public function getAddedCartItem($item){
        // dd($item);
        $product=$this->productService->getproductById($item['product_id']);
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
            }
        }
        $cartItems = [
            'product_id' => $item['product_id'],
            'name' => $product->name,
            'quantity' => $item['quantity'],
            'price' => 0,
            'image' => $product->main_image,
            'price_after_discount' => round($price_after_discount, 2), // Round to 2 decimal places
            'discount_per' => round($discount_per, 2), // Round to 2 decimal places
            'price_with_vat' => round($price_with_vat, 2), // Round to 2 decimal places
            'total_price_with_vat' => round($price_with_vat * $item['quantity'], 2), // Calculate and round
            'total_price_after_discount' => round($price_after_discount * $item['quantity'], 2), // Calculate and round
        ];
        // dd($cartItems);
        return $cartItems;
    }
    public function mergeCartAfterLogin()
    {
        // dd(Session::has('cart'));
        if (Session::has('cart')) {
            $guestCart = Session::get('cart');

            foreach ($guestCart as $item) {
                // $data['user_id'] = Auth::user()->id;
                $cartItem  = $this->getcartByUserIdAndProductId(Auth::user()->id,$item['product_id']);
                // $this->cartService->getcartByUserIdAndProductId
                // dd($data);
                // $cartItem = $this->cartService->createcartItem($data);
                // $cartItem = App\Models\CartItem::where('user_id', auth()->id())
                //     ->where('product_id', $item['product_id'])
                //     ->first();

                if ($cartItem ) {
                    $cartItem->update([
                        'quantity' => $item['quantity'],
                    ]);
                } else {
                    $data['user_id'] = Auth::user()->id;
                    $data['quantity']=$item['quantity'];
                    $data['product_id']=$item['product_id'];
                    // dd($data);
                    $cartItem = $this->createcartItem($data);
                    // App\Models\CartItem::create([
                    //     'user_id' => auth()->id(),
                    //     'product_id' => $item['product_id'],
                    //     'name' => $item['name'],
                    //     'quantity' => $item['quantity'],
                    //     'price' => $item['price'],
                    // ]);
                }
            }
// dd("merged");
            // Clear the guest cart from the session
            Session::forget('cart');
        }
    }
}
