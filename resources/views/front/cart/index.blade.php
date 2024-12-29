@extends('front.Layout.layout')
@section('style')
    @vite(['resources/css/cart.css'])
@endsection
@section('content')
    <section class="min-h-screen">
        <div>
            <h2>Cart</h2>
            <div>HOME/CART</div>
        </div>
        <div id="line"></div>


        <!-- Right Side-->
        <div id="right" class="w-svw">
            <h2 class="font-bold text-2xl mb-5">SHOPPING CART</h2>
            <div class="overflow-x-auto">
                <table class="table-fixed w-full text-center border-collapse">
                    <thead class="border-b-2">
                        <tr class="">
                            <th class="border-b-2 border-slate-300 p-3 w-24 ">Image</th>
                            <th class="border-b-2 border-slate-300 p-3 w-40">Product Description</th>
                            <th class="border-b-2 border-slate-300 p-3 w-24">Quantity</th>
                            <th class="border-b-2 border-slate-300 p-3 w-24">Unit Price</th>
                            <th class="border-b-2 border-slate-300 p-3 w-24">Total</th>
                            <th class="border-b-2 border-slate-300 p-3 w-24">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;

                        @endphp
                        @forelse ($cartItems as $item)
                            @php
                                $product = App\Models\Product::where(['id' => $item['product_id']])->first();
                                $attribute = $product->attributes->firstwhere('name', 'price');
                                if ($attribute) {
                                    $total += $attribute->value * $item['quantity'];
                                }
                            @endphp
                            <tr>
                                <td class="border-b-2 border-slate-300 flex justify-center items-center py-3">
                                    <div class="product-img max-w-20 flex justify-center items-center text-center">
                                        <img class="w-fit object-contain " src="{{ asset($product->main_image) }}"
                                            alt="">
                                    </div>
                                </td>
                                <td class="border-b-2 border-slate-300">
                                    <h3 class="product-name  text-base">{{ $product->name }}</a>
                                    </h3>
                                </td>
                                <td class="border-b-2 border-slate-300">
                                    <div class="flex items-center justify-center border rounded-full">
                                        <button class="px-3 py-2 decrementBtn"  data-id={{ $item['product_id'] }}>-</button>
                                        <input type="number" name="" id="" min="1"
                                            class="qty border border-1 w-10" value="{{ $item['quantity'] }}"
                                            data-id={{ $item['product_id'] }}
                                            data-price="{{ $product->attributes->firstwhere('name', 'price') ? $product->attributes->firstwhere('name', 'price')->value : 0 }}">
                                        <button class="px-3 py-2 incrementBtn"  data-id={{ $item['product_id'] }}>+</button>
                                    </div>
                                    {{-- <input type="number" value="1" id="qty" class="w-12 text-center border-none focus:outline-none" fdprocessedid="b1si91">
                                <h3 class="product-name text-base">
                                    <input type="number" value="1" id="qty" class="w-12 text-center border-none focus:outline-none" fdprocessedid="b1si91">
                                    <input type="number" name="" id="qty" min="1" class="border border-1 w-10" value="{{ $item['quantity']}}">
                                </h3> --}}
                                </td>
                                <td class="border-b-2 border-slate-300">
                                    <h4 class="price text-base">
                                        {{ $product->attributes->firstwhere('name', 'price') ? $product->attributes->firstwhere('name', 'price')->value : 0 }}
                                    </h4>
                                </td>
                                <td data-id={{ $item['product_id'] }} class="totalprice border-b-2 border-slate-300">
                                    {{ $product->attributes->firstwhere('name', 'price') ? $product->attributes->firstwhere('name', 'price')->value * $item['quantity'] : 0 }}
                                </td>
                                <td class="border-b-2 border-slate-300"><i
                                        class="fa-solid fa-trash-can text-red text-xl"></i></td>
                            </tr>
                        @empty
                        @endforelse

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="border-b-2 border-slate-300 py-3">Sub Total</td>
                            <td class="border-b-2 border-slate-300">{{ $total }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="border-b-2 border-slate-300 py-3">Total</td>
                            <td class="border-b-2 border-slate-300">{{ $total }}</td>
                            <td></td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div
                class="mt-14 gap-6 cart-btns w-full flex justify-center items-center flex-col md:flex-row text-center text-white text-size-14 font-bold">
                <a href="{{ route('home') }}" class="bg-secondary-700 p-3 rounded-full text-base md:text-lg w-64"><i
                        class="fa fa-shopping-cart pr-2"></i>Continue Shopping </a>
                <a href="{{ route('checkout') }}" class="bg-red p-3 rounded-full text-base md:text-lg w-64">Checkout <i
                        class="fa-solid fa-truck-fast pl-2"></i>

                </a>
            </div>

        </div>
    </section>
@endsection
@section('script')
    @vite(['resources/js/cart.js'])
@endsection
{{-- @section('script') --}}
{{-- <script>
    function increment(element) {
        // Find the sibling input field
        var qtyInput = element.previousElementSibling;
        qtyInput.value = parseInt(qtyInput.value) + 1;

    }

    function decrement(element) {
        // Find the sibling input field
        var qtyInput = element.nextElementSibling;
        qtyInput.value = parseInt(qtyInput.value) - 1;

        // Prevent negative values
        if (qtyInput.value < 1) {
            qtyInput.value = 1;
        }
    }
</script> --}}
{{-- <td class="border-b-2 border-slate-300">
        <div class="flex items-center border rounded-full">
            <button class="px-3 py-2" onclick="decrement(this)">-</button>
            <input type="number" name="" class="qty border border-1 w-10" min="1"
                value="{{ $item['quantity'] }}" data-id="{{ $item['product_id'] }}"
                data-price="{{ $product->attributes->firstwhere('name', 'price') ? $product->attributes->firstwhere('name', 'price')->value : 0 }}">
            <button class="px-3 py-2" onclick="increment(this)">+</button>
        </div>
    </td>
    <td class="border-b-2 border-slate-300">
        <h4 class="price text-base">
            {{ $product->attributes->firstwhere('name', 'price') ? $product->attributes->firstwhere('name', 'price')->value : 0 }}
        </h4>
    </td>
    <td class="totalprice border-b-2 border-slate-300" data-id="{{ $item['product_id'] }}">
        {{ $product->attributes->firstwhere('name', 'price') ? $product->attributes->firstwhere('name', 'price')->value * $item['quantity'] : 0 }}
    </td>


@endsection --}}
