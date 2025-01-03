<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Services\CartService;
use App\Services\ProductService;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Session;

class CartController extends Controller
{
    protected $cartService;
    protected $productService;

    public function __construct(CartService $cartService, ProductService $productService)
    {

        $this->cartService = $cartService;
        $this->productService = $productService;
    }

    public function index()
    {
        $cartItems = $this->cartService->getCartItemsForUser();

        return view('front.cart.index', compact('cartItems'));

    }
    public function addToCart(Request $request)
    {
        // dd("i");
        $data = $request->all();
        // dd($data);
        $rules = [
            'product_id' => [
                'required',
                Rule::exists('products', 'id'),
            ],
            // 'name' => 'required|string',
            'quantity' => 'required|integer|min:1',
            // 'price' => 'required|numeric|min:0',
        ];

        $customMessages = [
            'product_id.required' => 'The product ID is required.',
            'product_id.exists' => 'The selected product does not exist.',
             'quantity.required' => 'The quantity is required.',
            'quantity.integer' => 'The quantity must be an integer.',
            'quantity.min' => 'The quantity must be at least 1.',

        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if (Auth::check()) {
            $cartItem = $this->cartService->getcartByUserIdAndProductId(Auth::user()->id, $request->product_id);

            if ($cartItem) {
                 $this->cartService->updatecartQuantity([
                    'id' => $cartItem->id,
                    'quantity' => $request->quantity,
                ]);

            } else {
                 $data['user_id'] = Auth::user()->id;
                $cartItem = $this->cartService->createcartItem($data);


            }
            // dd($cartItem);
            $items = $this->cartService->getcartItemsByUserId(Auth::user()->id);
            foreach ($items as $item) {
                $cartItems[]=$this->cartService->getAddedCartItem($item);

            }

            return response()->json(['message' => 'Item added to cart successfully!', 'products' => $cartItems, 'type' => 'success']);
    }
        else {
            // **Guest User Logic**
            // Session::forget('cart');
            $cart = Session::get('cart');
            // dd($cart);
            $productExists = false;
            // Check if the product already exists in the session cart
            if ($cart) {
                foreach ($cart as &$item) {
                    if ($item['product_id'] == $request->product_id) {

                        $item['quantity'] = $request->quantity;
                        $item['total_price_with_vat']=$item['price_with_vat']*$request->quantity;
                        $item['total_price_after_discount']=$item['price_after_discount']*$request->quantity;
                        // dd($item);
                        $productExists = true;
                        break;
                    }
                }
            }
            // dd($cart);
            // If the product does not exist, add it to the cart
            if (!$productExists) {
                   $cart[]=$this->cartService->getAddedCartItem($data);

            }
            // Update the session cart
            Session::put('cart', $cart);
            // Session::forget('cart');
            $cartItem=Session::get('cart');
// dd($cartItem);
            return response()->json(['message' => 'Item added to cart successfully!', 'products' => $cartItem, 'type' => 'success']);

        }
         }




}
