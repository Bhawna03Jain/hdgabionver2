@extends('front.Layout.layout')
@section('main-content')
    <section class="content">
        <div class="container-fluid">

            <!-- Page info -->
            <div class="page-breadcrumb-info">
                <div class="container">

                    <h4>CA<b class="text-warning">RT</b>&nbsp;IN<b class="text-warning">FO</b></h4>
                    <div class="page-pagination">
                        <a href="{{ route('home') }}">Home</a> /
                        <a href="{{ route('shop') }}">Cart</a> /
                    </div>
                </div>
            </div>
            <!-- Page info end -->
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        @if ($cartItems->isEmpty())
                            <div style="height:300px;">
                                <img src="{{ asset('/images/frontend_images/empty_cart.png') }}" class="d-block  m-auto" />
                            </div>
                        @else
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if (session('cartDelete'))
                                <div class="alert alert-success">
                                    {{ session('cartDelete') }}
                                </div>
                            @endif


                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="cart_menu bg-warning text-white">
                                            <th class="image">Item</th>
                                            <th class="description"></th>
                                            <th class="price">Price</th>
                                            <th class="price">GST</th>
                                            <th class="quantity">Quantity</th>
                                            <th class="total">Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $cartItem)
                                            <tr>
                                                <td>
                                                    <img class="mr-3"
                                                        src="{{ asset('/images/backend_images/product/small/' . $cartItem->options->img) }}"
                                                        alt="image" style="width: 100px;height:100px;">
                                                </td>
                                                <td>
                                                    <h5 class="mt-0">
                                                        <a href="{{ url('productDetail', $cartItem->id) }}"
                                                            class="text-nowrap">{{ $cartItem->name }}</a>
                                                    </h5>
                                                    <p>
                                                        <strong class="mr-1">Size:</strong>{{ $cartItem->options->size }}
                                                    </p>
                                                    <p>
                                                        <strong class="mr-1">Color:</strong>
                                                        <span
                                                            style="font-weight:bold;color:{{ $cartItem->options->product_color }}">{{ $cartItem->options->product_color }}
                                                        </span>
                                                    </p>
                                                    <?php $status = DB::table('productsattributes')
                                                        ->select('status', 'stock')
                                                        ->where('sku', '=', $cartItem->options->sku)
                                                        ->first();

                                                    ?>
                                                    @if ($status->status != 1)
                                                        <p>
                                                            <strong class="mr-1">Available:</strong>

                                                            <span style="font-weight:bold;" class="text-danger">No
                                                            </span>
                                                        </p>
                                                    @endif
                                                    @if ($status->stock < $cartItem->qty)
                                                        <p>
                                                            <strong class="mr-1">Available:</strong>

                                                            <span style="font-weight:bold;" class="text-danger">Only
                                                                {{ $status->stock }} Left
                                                            </span>
                                                        </p>
                                                    @endif
                                                </td>
                                                @if ($status->status != 1 or $status->stock < $cartItem->qty)
                                                    <td>
                                                        <p><del class="text-danger">{{ $cartItem->price }}</del></p>
                                                    </td>
                                                    <td>
                                                        <p><del class="text-danger">{{ $cartItem->options->gst }}</del></p>
                                                    </td>
                                                    <td>



                                                        <a class="cart_quantity_up" href="#"> + </a>
                                                        <input class="cart_quantity_input" type="text" name="quantity"
                                                            value="{{ $cartItem->qty }}" autocomplete="off" size="2"
                                                            disabled="">
                                                    </td>
                                                    <td><del
                                                            class="text-danger"><strong>{{ $cartItem->options->totalprice }}</strong></del>
                                                    </td>
                                                @else
                                                    <td>
                                                        <p>{{ $cartItem->price }}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{ $cartItem->options->gst }}</p>
                                                    </td>
                                                    <td>
                                                        <a class="cart_quantity_up"
                                                            href="{{ url('/cart/update-quantity/' . $cartItem->rowId . '/1') }}">
                                                            + </a>
                                                        <input class="cart_quantity_input" type="text" name="quantity"
                                                            value="{{ $cartItem->qty }}" autocomplete="off" size="2">
                                                        @if ($cartItem->qty > 1)
                                                            <a class="cart_quantity_down"
                                                                href="{{ url('/cart/update-quantity/' . $cartItem->rowId . '/-1') }}">
                                                                - </a>
                                                    </td>
                                                @endif
                                                <td><strong>{{ $cartItem->options->totalprice }}</strong></td>
                                        @endif
                                        </td>

                                        <td>
                                            <form action="{{ route('cart.destroy', $cartItem->rowId) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" class="text-right">
                                <h6><strong class=" font-weight-bold">Total Amount</strong></h6>
                            </td>
                            <td></td>
                            <td class="text-left font-weight-bold" colspan="2">
                                <h6><strong>
                                        <?php
                                        $total = 0;
                                        foreach ($cartItems as $cartItem) {
                                            $status = DB::table('productsattributes')
                                                ->select('status', 'stock')
                                                ->where('sku', '=', $cartItem->options->sku)
                                                ->first();

                                            if ($status->status == 1 and $status->stock > $cartItem->qty) {
                                                $total = $total + $cartItem->options->totalprice;
                                            }
                                        }
                                        ?>
                                        {{ $total }}
                                    </strong></h6>
                            </td>
                        </tr>
                        <tr>
                            </tbody>
                            </table>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-4">
                                        <form action="{{ route('shop') }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-success d-block m-auto text-nowrap"><i
                                                    class="fa fa-plus mr-1"></i>Add More Products</button>
                                        </form>
                                    </div>
                                    <div class="col-12 col-md-6 mb-4">
                                        <form action="{{ url('BillingAddress') }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-warning d-block m-auto text-nowrap"><i
                                                    class="fa-cart-arrow-down mr-1"></i>Continue to Checkout</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- <td colspan="3" class="text-right">
                                                <form action="{{ route('shop') }}" method="post" >
                                                      @csrf
                                                     <button type="submit" class="btn btn-success"><i class="fa fa-plus mr-1"></i>Add More Products</button>
                                                </form>
                                            </td>
                                            <td colspan="2" >
                                                <form action="{{ url('BillingAddress') }}" method="GET" >
                                                      @csrf
                                                      <button type="submit" class="btn btn-warning"><i class="fa-cart-arrow-down mr-1"></i>Continue to Checkout</button>
                                                </form>
                                            </td>
                                          </tr>
                                    </tbody>
                                  </table> -->
                    </div>
                    @endif




                </div>
            </div>
        </div>





    </section>
@endsection
