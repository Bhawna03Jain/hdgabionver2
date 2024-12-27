@extends('layout')
@section('style')
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
                        <tr>
                            <td class="border-b-2 border-slate-300 flex justify-center items-center py-3">
                                <div class="product-img max-w-20 flex justify-center items-center text-center">
                                    <img class="w-fit object-contain " src="{{ asset('admin/images/category/2055.jpg') }}"
                                        alt="">
                                </div>
                            </td>
                            <td class="border-b-2 border-slate-300">
                                <h3 class="product-name  text-base">product name goes
                                    here</a>
                                </h3>
                            </td>
                            <td class="border-b-2 border-slate-300">
                                <h3 class="product-name text-base">
                                    <input type="number" name="" id="qty" min="1" value="1"
                                        class="border border-1 w-10">
                                </h3>
                            </td>
                            <td class="border-b-2 border-slate-300">
                                <h4 class="price   text-base">$980.00</h4>
                            </td>
                            <td class="border-b-2 border-slate-300">Total</td>
                            <td class="border-b-2 border-slate-300"><i class="fa-solid fa-trash-can text-red text-xl"></i></td>
                        </tr>
                        <tr>
                            <td class="border-b-2 border-slate-300 flex justify-center items-center py-3">
                                <div class="product-img max-w-20 flex justify-center items-center text-center">
                                    <img class="w-fit object-contain " src="{{ asset('admin/images/category/2055.jpg') }}"
                                        alt="">
                                </div>
                            </td>
                            <td class="border-b-2 border-slate-300">
                                <h3 class="product-name  text-base">product name goes
                                    here</a>
                                </h3>
                            </td>
                            <td class="border-b-2 border-slate-300">
                                <h3 class="product-name text-base">
                                    <input type="number" name="" id="qty" min="1" value="1"
                                        class="border border-1 w-10">
                                </h3>
                            </td>
                            <td class="border-b-2 border-slate-300">
                                <h4 class="price   text-base">$980.00</h4>
                            </td>
                            <td class="border-b-2 border-slate-300">Total</td>
                            <td class="border-b-2 border-slate-300"><i class="fa-solid fa-trash-can text-red text-xl"></i></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="border-b-2 border-slate-300 py-3">Sub Total</td>
                            <td class="border-b-2 border-slate-300">1090</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="border-b-2 border-slate-300 py-3">Total</td>
                            <td class="border-b-2 border-slate-300">1090</td>
                            <td></td>
                        </tr>

                    </tbody>
                 </table>
                </div>
                <div
                    class="mt-14 gap-6 cart-btns w-full flex justify-center items-center flex-col md:flex-row text-center text-white text-size-14 font-bold">
                    <a href="#" class="bg-secondary-700 p-3 rounded-full text-base md:text-lg w-64"><i
                            class="fa fa-shopping-cart pr-2"></i>Continue Shopping </a>
                    <a href="#" class="bg-red p-3 rounded-full text-base md:text-lg w-64">Checkout <i
                            class="fa-solid fa-truck-fast pl-2"></i>

                        </a>
                </div>

            </div>

<p>
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores facere labore quidem ullam placeat eaque soluta ipsum omnis consequuntur harum similique ipsam, doloribus voluptatem doloremque a alias qui explicabo magni.
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores facere labore quidem ullam placeat eaque soluta ipsum omnis consequuntur harum similique ipsam, doloribus voluptatem doloremque a alias qui explicabo magni.
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores facere labore quidem ullam placeat eaque soluta ipsum omnis consequuntur harum similique ipsam, doloribus voluptatem doloremque a alias qui explicabo magni.
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores facere labore quidem ullam placeat eaque soluta ipsum omnis consequuntur harum similique ipsam, doloribus voluptatem doloremque a alias qui explicabo magni.

</p>

    </section>
@endsection

@section('script')
@endsection
