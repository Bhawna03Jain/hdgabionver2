@extends('front.Layout.layout')

@section('style')
     {{-- <link rel="stylesheet" href="{{ url('front/css/shop.css') }}"> --}}

  @endsection

@section('main-content')
   <!-- SECTION -->
   <div class="section py-5" style="background-color: #f8f9fa;margin-top:250px;">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row justify-content-center g-4">
            <!-- Billing Details -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm p-4 mb-4">
                    <h3 class="fw-bold mb-4">Billing Address</h3>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="first-name" placeholder="First Name">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="last-name" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="mt-3">
                            <input class="form-control" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="mt-3">
                            <input class="form-control" type="text" name="address" placeholder="Address">
                        </div>
                        <div class="row g-3 mt-3">
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="city" placeholder="City">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="country" placeholder="Country">
                            </div>
                        </div>
                        <div class="row g-3 mt-3">
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="zip-code" placeholder="ZIP Code">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="tel" name="tel" placeholder="Telephone">
                            </div>
                        </div>
                        <div class="form-check mt-4">
                            <input type="checkbox" class="form-check-input" id="create-account">
                            <label class="form-check-label" for="create-account">Create Account?</label>
                            <div class="mt-2">
                                <small class="text-muted">You can save your details for future purchases.</small>
                                <input class="form-control mt-2" type="password" name="password" placeholder="Enter Your Password">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card border-0 shadow-sm p-4">
                    <h3 class="fw-bold mb-4">Shipping Address</h3>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="shipping-address">
                        <label class="form-check-label" for="shipping-address">Ship to a different address?</label>
                        <div class="mt-3 caption" style="display: none;">
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="first-name" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="last-name" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <input class="form-control" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="mt-3">
                                    <input class="form-control" type="text" name="address" placeholder="Address">
                                </div>
                                <div class="row g-3 mt-3">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="city" placeholder="City">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="country" placeholder="Country">
                                    </div>
                                </div>
                                <div class="row g-3 mt-3">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="zip-code" placeholder="ZIP Code">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="tel" name="tel" placeholder="Telephone">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Billing Details -->

            <!-- Order Details -->
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm p-4 mb-4">
                    <h3 class="fw-bold mb-4 text-center">Your Order</h3>
                    <div class="order-summary">
                        <div class="d-flex justify-content-between border-bottom pb-2">
                            <strong>PRODUCT</strong>
                            <strong>TOTAL</strong>
                        </div>
                        <div class="mt-3">
                            <div class="d-flex justify-content-between">
                                <div>1x Product Name Goes Here</div>
                                <div>$980.00</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>2x Product Name Goes Here</div>
                                <div>$980.00</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between border-top mt-3 pt-2">
                            <div>Shipping</div>
                            <div><strong>FREE</strong></div>
                        </div>
                        <div class="d-flex justify-content-between border-top mt-3 pt-2">
                            <div><strong>TOTAL</strong></div>
                            <div><strong>$2940.00</strong></div>
                        </div>
                    </div>
                </div>
                <div class="card border-0 shadow-sm p-4">
                    <h3 class="fw-bold mb-4">Payment Method</h3>
                    <div class="payment-method">
                        <div class="form-check mb-3">
                            <input type="radio" class="form-check-input" name="payment" id="payment-1">
                            <label class="form-check-label" for="payment-1">Direct Bank Transfer</label>
                        </div>
                        <div class="form-check mb-3">
                            <input type="radio" class="form-check-input" name="payment" id="payment-2">
                            <label class="form-check-label" for="payment-2">Cheque Payment</label>
                        </div>
                        <div class="form-check mb-3">
                            <input type="radio" class="form-check-input" name="payment" id="payment-3">
                            <label class="form-check-label" for="payment-3">Paypal System</label>
                        </div>
                    </div>
                    <div class="form-check mt-3">
                        <input type="checkbox" class="form-check-input" id="terms">
                        <label class="form-check-label" for="terms">I've read and accept the <a href="#">terms & conditions</a></label>
                    </div>
                    <button class="btn btn-primary w-100 mt-3">Place Order</button>
                </div>
            </div>
            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

<!-- /SECTION -->

@endsection
@section('js')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const shippingCheckbox = document.getElementById("shipping-address");
        const captionElement = document.querySelector(".caption");

        // Hide the caption initially
        captionElement.style.display = "none";

        shippingCheckbox.addEventListener("change", function () {
            if (this.checked) {
                captionElement.style.display = "block";
            } else {
                captionElement.style.display = "none";
            }
        });
    });
</script>


@endsection
