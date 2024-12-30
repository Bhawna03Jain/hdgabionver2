<?php

namespace App\Http\Controllers;

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
        if (Auth::check()) {
            $cartItems = $this->cartService->getcartItemsByUserId(Auth::user()->id);

            // $user_email = Auth::user()->email;
            // $cartItems = Cart::search(function ($key, $value) use ($user_email) {
            //     return $key->options->user_email == $user_email;
            // });
            // return   $cartItems;
            return view('front.cart.index', compact('cartItems'));
        } else {

            // $session_id = Session::get('session_id');
            $cartItems = session()->get('cart', []);
            // return   $cartItems;
            return view('front.cart.index', compact('cartItems'));
        }
        //return view('cart.index',compact('cartItems'));
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
            // 'name.required' => 'The product name is required.',
            // 'name.string' => 'The product name must be a string.',
            'quantity.required' => 'The quantity is required.',
            'quantity.integer' => 'The quantity must be an integer.',
            'quantity.min' => 'The quantity must be at least 1.',
            // 'price.required' => 'The price is required.',
            // 'price.numeric' => 'The price must be a valid number.',
            // 'price.min' => 'The price must be at least 0.',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if (Auth::check()) {

            // dd(Auth::user()->id);
            // **Authenticated User Logic**
            $cartItem = $this->cartService->getcartByUserIdAndProductId(Auth::user()->id, $request->product_id);
            // $cartItem = CartItem::where('user_id', Auth::user()->id)
            //                     ->where('product_id', $request->product_id)
            //                     ->first();

            if ($cartItem) {
                // Update quantity if product already exists
                $this->cartService->updatecartQuantity([
                    'id' => $cartItem->id,
                    'quantity' => $request->quantity,
                ]);
                // $cartItem->update([
                //     'id'=> $cartItem->id,
                //     'quantity' => $cartItem->quantity + $request->quantity,
                // ]);
            } else {
                // Add new item to the cart
                $data['user_id'] = Auth::user()->id;
                $cartItem = $this->cartService->createcartItem($data);
                // dd($data);

                // 5 [
                //     "product_id" => "13"
                //     "name" => "Gabion Basket 1"
                //     "quantity" => "1"
                //     "price" => 0
                //     "image" => "admin/images/products/baskets/65023.png"
                //   ]
            }
            // $cartItems[] = [
            //     'product_id' => $data['product_id'],
            //     'name' => $this->productService->getproductById($data['product_id'])->name,
            //     'quantity' => $data['quantity'],
            //     'price' => 0,
            //     'image' => $this->productService->getproductById($data['product_id'])->main_image,
            // ];
            $items = $this->cartService->getcartItemsByUserId(Auth::user()->id);
            foreach ($items as $item) {
                $cartItems[] = [
                    'product_id' => $item['product_id'],
                    'name' => $this->productService->getproductById($item['product_id'])->name,
                    'quantity' => $item['quantity'],
                    'price' => 0,
                    'image' => $this->productService->getproductById($item['product_id'])->main_image,
                ];
            }
            // dd($cartItems);

            return response()->json(['message' => 'Item added to cart successfully!', 'products' => $cartItems, 'type' => 'success']);

        } else {
            // **Guest User Logic**

            $cart = Session::get('cart');
            $productExists = false;
            // Check if the product already exists in the session cart
            if ($cart) {
                foreach ($cart as &$item) {
                    if ($item['product_id'] == $request->product_id) {
                        $item['quantity'] = $request->quantity;
                        $productExists = true;
                        break;
                    }
                }
            }
            // If the product does not exist, add it to the cart
            if (!$productExists) {
                // $carts=$this->cartService->getcartItemsByProductId($request->product_id)->first();
                // dd($carts);
                $cartItems[] = [
                    'product_id' => $request->product_id,
                    'name' => $this->productService->getproductById($request->product_id)->name,
                    'quantity' => $request->quantity,
                    'price' => 0,
                    'image' => $this->productService->getproductById($request->product_id)->main_image,
                ];
            }
            // Update the session cart
            Session::put('cart', $cartItems);
            // $cartItem=Session::get('cart');
// Session::forget('cart');
// dd($cartItems);
            return response()->json(['message' => 'Item added to cart successfully!', 'products' => $cartItems, 'type' => 'success']);

        }
        // dd($cartItems);
//         return response()->json(['message' => 'Item added to cart successfully!', 'products' => $cartItems, 'type' => 'success']);
    }

    // To handle merging the cart when a guest user logs in, you can implement logic in the login or a dedicated mergeCart function. Here’s an example:

    public function mergeCart()
    {
        if (Session::has('cart')) {
            $guestCart = Session::get('cart');

            foreach ($guestCart as $item) {
                $cartItem = CartItem::where('user_id', auth()->id())
                    ->where('product_id', $item['product_id'])
                    ->first();

                if ($cartItem) {
                    $cartItem->update([
                        'quantity' => $cartItem->quantity + $item['quantity'],
                    ]);
                } else {
                    CartItem::create([
                        'user_id' => auth()->id(),
                        'product_id' => $item['product_id'],
                        'name' => $item['name'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                    ]);
                }
            }

            // Clear the guest cart from the session
            Session::forget('cart');
        }
    }

}
