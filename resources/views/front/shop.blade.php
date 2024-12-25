@extends('front.Layout.layout')

@section('style')
     {{-- <link rel="stylesheet" href="{{ url('front/css/shop.css') }}"> --}}

   <style>
    /* *=========================================================
	02 -> HEADER
===========================================================*/

/*----------------------------*\
	Top header
\*----------------------------*/

header #top-header {
  padding-top: 10px;
  padding-bottom: 10px;
  background-color: #1E1F29;
}

.header-links li {
  display: inline-block;
  margin-right: 15px;
  font-size: 12px;
}

.header-links li:last-child {
  margin-right: 0px;
}

.header-links li a {
  color: #FFF;
}

.header-links li a:hover {
  color: #D10024;
}

.header-links li i {
  color: #D10024;
  margin-right: 5px;
}

/*----------------------------*\
	Logo
\*----------------------------*/

#header {
  padding-top: 15px;
  padding-bottom: 15px;
  background-color: #15161D;
  margin-top: 150px;
}

.header-logo {
  float: left;
}

.header-logo .logo img {
  display: block;
}

/*----------------------------*\
	Search
\*----------------------------*/

.header-search {
  padding: 15px 0px;
}

.header-search form {
  position: relative;
}

.header-search form .input-select {
  margin-right: -4px;
  border-radius: 40px 0px 0px 40px;
}

.header-search form .input {
  width: calc(100% - 260px);
  margin-right: -4px;
}

.header-search form .search-btn {
  height: 40px;
  width: 100px;
  background: #D10024;
  color: #FFF;
  font-weight: 700;
  border: none;
  border-radius: 0px 40px 40px 0px;
}

/*----------------------------*\
	Cart
\*----------------------------*/

.header-ctn {
  float: right;
  padding: 15px 0px;
}

.header-ctn>div {
  display: inline-block;
}

.header-ctn>div+div {
  margin-left: 15px;
}

.header-ctn>div>a {
  display: block;
  position: relative;
  width: 90px;
  text-align: center;
  color: #FFF;
}

.header-ctn>div>a>i {
  display: block;
  font-size: 18px;
}

.header-ctn>div>a>span {
  font-size: 12px;
}

.header-ctn>div>a>.qty {
  position: absolute;
  right: 15px;
  top: -10px;
  width: 20px;
  height: 20px;
  line-height: 20px;
  text-align: center;
  border-radius: 50%;
  font-size: 10px;
  color: #FFF;
  background-color: #D10024;
}

.header-ctn .menu-toggle {
  display: none;
}

.cart-dropdown {
  position: absolute;
  width: 300px;
  background: #FFF;
  padding: 15px;
  -webkit-box-shadow: 0px 0px 0px 2px #E4E7ED;
  box-shadow: 0px 0px 0px 2px #E4E7ED;
  z-index: 99;
  right: 0;
  opacity: 0;
  visibility: hidden;
}

.dropdown.open>.cart-dropdown {
  opacity: 1;
  visibility: visible;
}

.cart-dropdown .cart-list {
  max-height: 180px;
  overflow-y: scroll;
  margin-bottom: 15px;
}

.cart-dropdown .cart-list .product-widget {
  padding: 0px;
  -webkit-box-shadow: none;
  box-shadow: none;
}

.cart-dropdown .cart-list .product-widget:last-child {
  margin-bottom: 0px;
}

.cart-dropdown .cart-list .product-widget .product-img {
  left: 0px;
  top: 0px;
}

.cart-dropdown .cart-list .product-widget .product-body .product-price {
  color: #2B2D42;
}

.cart-dropdown .cart-btns {
  margin: 0px -17px -17px;
}

.cart-dropdown .cart-btns>a {
  display: inline-block;
  width: calc(50% - 0px);
  padding: 12px;
  background-color: #D10024;
  color: #FFF;
  text-align: center;
  font-weight: 700;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
}

.cart-dropdown .cart-btns>a:first-child {
  margin-right: -4px;
  background-color: #1e1f29;
}

.cart-dropdown .cart-btns>a:hover {
  opacity: 0.9;
}

.cart-dropdown .cart-summary {
  border-top: 1px solid #E4E7ED;
  padding-top: 15px;
  padding-bottom: 15px;
}

/*=========================================================
	03 -> Navigation
===========================================================*/

#navigation {
  background: #FFF;
  border-bottom: 2px solid #E4E7ED;
  border-top: 3px solid #D10024;
}

/*----------------------------*\
	Main nav
\*----------------------------*/

.main-nav>li+li {
  margin-left: 30px
}

.main-nav>li>a {
  padding: 20px 0px;
}

.main-nav>li>a:hover, .main-nav>li>a:focus, .main-nav>li.active>a {
  color: #D10024;
  background-color: transparent;
}

.main-nav>li>a:after {
  content: "";
  display: block;
  width: 0%;
  height: 2px;
  background-color: #D10024;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
}

.main-nav>li>a:hover:after, .main-nav>li>a:focus:after, .main-nav>li.active>a:after {
  width: 100%;
}

.header-ctn li.nav-toggle {
  display: none;
}

/*----------------------------*\
	responsive nav
\*----------------------------*/

@media only screen and (max-width: 991px) {
  .header-ctn .menu-toggle {
    display: inline-block;
  }
  #responsive-nav {
    position: fixed;
    left: 0;
    top: 0;
    background: #15161D;
    height: 100vh;
    max-width: 250px;
    width: 0%;
    overflow: hidden;
    z-index: 22;
    padding-top: 60px;
    -webkit-transform: translateX(-100%);
    -ms-transform: translateX(-100%);
    transform: translateX(-100%);
    -webkit-transition: 0.2s all;
    transition: 0.2s all;
  }
  #responsive-nav.active {
    -webkit-transform: translateX(0%);
    -ms-transform: translateX(0%);
    transform: translateX(0%);
    width: 100%;
  }
  .main-nav {
    margin: 0px;
    float: none;
  }
  .main-nav>li {
    display: block;
    float: none;
  }
  .main-nav>li+li {
    margin-left: 0px;
  }
  .main-nav>li>a {
    padding: 15px;
    color: #FFF;
  }
}
   </style>
   <style>
    /*=========================================================
	04 -> CATEGORY SHOP
===========================================================*/

.shop {
  position: relative;
  overflow: hidden;
  margin: 15px 0px;
}

.shop:before {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0px;
  width: 60%;
  background: #D10024;
  opacity: 0.9;
  -webkit-transform: skewX(-45deg);
  -ms-transform: skewX(-45deg);
  transform: skewX(-45deg);
}

.shop:after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  left: 1px;
  width: 100%;
  background: #D10024;
  opacity: 0.9;
  -webkit-transform: skewX(-45deg) translateX(-100%);
  -ms-transform: skewX(-45deg) translateX(-100%);
  transform: skewX(-45deg) translateX(-100%);
}

.shop .shop-img {
  position: relative;
  background-color: #E4E7ED;
  z-index: -1;
}

.shop .shop-img>img {
  width: 100%;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
}

.shop:hover .shop-img>img {
  -webkit-transform: scale(1.1);
  -ms-transform: scale(1.1);
  transform: scale(1.1);
}

.shop .shop-body {
  position: absolute;
  top: 0;
  width: 75%;
  padding: 30px;
  z-index: 10;
}

.shop .shop-body h3 {
  color: #FFF;
}

.shop .shop-body .cta-btn {
  color: #FFF;
  text-transform: uppercase;
}
   </style>
@endsection

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <header>
                <!-- TOP HEADER -->
                <div id="top-header">
                    <div class="container d-flex justify-content-between align-items-center">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item me-3">
                                <a href="#" class="text-decoration-none text-dark">
                                    <i class="fa fa-phone me-1"></i> +021-95-51-84
                                </a>
                            </li>
                            <li class="list-inline-item me-3">
                                <a href="#" class="text-decoration-none text-dark">
                                    <i class="fa fa-envelope-o me-1"></i> email@email.com
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-decoration-none text-dark">
                                    <i class="fa fa-map-marker me-1"></i> 1734 Stonecoal Road
                                </a>
                            </li>
                        </ul>
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item me-3">
                                <a href="#" class="text-decoration-none text-dark">
                                    <i class="fa fa-dollar me-1"></i> USD
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-decoration-none text-dark">
                                    <i class="fa fa-user-o me-1"></i> My Account
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /TOP HEADER -->

                <!-- MAIN HEADER -->
                <div id="header" class="py-4 border-bottom">
                    <div class="container">
                        <div class="row align-items-center">
                            <!-- LOGO -->
                            <div class="col-md-3">
                                <a href="#" class="d-block">
                                    <img src="./img/logo.png" alt="Logo" class="img-fluid">
                                </a>
                            </div>
                            <!-- /LOGO -->

                            <!-- SEARCH BAR -->
                            <div class="col-md-6">
                                <form class="d-flex">
                                    <select class="form-select me-2" aria-label="Category select">
                                        <option value="0">All Categories</option>
                                        <option value="1">Category 01</option>
                                        <option value="2">Category 02</option>
                                    </select>
                                    <input class="form-control me-2" type="search" placeholder="Search here" aria-label="Search">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </form>
                            </div>
                            <!-- /SEARCH BAR -->

                            <!-- ACCOUNT -->
                            <div class="col-md-3">
                                <div class="d-flex justify-content-end align-items-center">
                                    <!-- Wishlist -->
                                    <div class="me-4">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <i class="fa fa-heart-o me-1"></i>
                                            <span>Your Wishlist</span>
                                            <span class="badge bg-secondary rounded-pill ms-1">2</span>
                                        </a>
                                    </div>
                                    <!-- /Wishlist -->

                                    <!-- Cart -->
                                    <div class="dropdown">
                                        <a href="#" class="text-decoration-none text-dark dropdown-toggle" id="cartDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-shopping-cart me-1"></i>
                                            <span>Your Cart</span>
                                            <span class="badge bg-secondary rounded-pill ms-1">3</span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cartDropdown">
                                            <li class="px-3 py-2">
                                                <div class="d-flex align-items-center">
                                                    <img src="asset('admin/images/category/2055.jpg')" alt="Product" class="img-thumbnail me-2" style="width: 50px; height: 50px;">
                                                    <div>
                                                        <h6 class="mb-0">Product Name</h6>
                                                        <small class="text-muted">1x $980.00</small>
                                                    </div>
                                                    <button class="btn btn-sm btn-danger ms-auto"><i class="fa fa-close"></i></button>
                                                </div>
                                            </li>
                                            <li class="px-3 py-2">
                                                <div class="d-flex align-items-center">
                                                    <img src="./img/product02.png" alt="Product" class="img-thumbnail me-2" style="width: 50px; height: 50px;">
                                                    <div>
                                                        <h6 class="mb-0">Product Name</h6>
                                                        <small class="text-muted">3x $980.00</small>
                                                    </div>
                                                    <button class="btn btn-sm btn-danger ms-auto"><i class="fa fa-close"></i></button>
                                                </div>
                                            </li>
                                            <li class="dropdown-divider"></li>
                                            <li class="px-3 py-2">
                                                <small>3 Item(s) selected</small>
                                                <h6 class="mb-0">SUBTOTAL: $2940.00</h6>
                                            </li>
                                            <li class="px-3 py-2 d-flex justify-content-between">
                                                <a href="#" class="btn btn-link">View Cart</a>
                                                <a href="#" class="btn btn-primary">Checkout</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /Cart -->

                                    <!-- Menu Toggle -->
                                    <button class="btn btn-link ms-4" type="button">
                                        <i class="fa fa-bars"></i>
                                        <span>Menu</span>
                                    </button>
                                    <!-- /Menu Toggle -->
                                </div>
                            </div>
                            <!-- /ACCOUNT -->
                        </div>
                    </div>
                </div>
                <!-- /MAIN HEADER -->
            </header>


        </div>
    </section>
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{ asset('images/basket_orig/basket-100x100x100-10x10.png')}}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Laptop<br>Collection</h3>
                            <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="./img/shop03.png" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Accessories<br>Collection</h3>
                            <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="./img/shop02.png" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Cameras<br>Collection</h3>
                            <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
@endsection
@section('js')

@endsection
