<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel with Tailwind</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Flag Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" />
    @vite(['resources/css/app.css', 'resources/css/header.css'])
</head>

<body class="font-size-normal">
    <header class="w-full">
        <!--Top Header-->
        <div id="top-header"
            class="bg-secondary-800 h-10 text-size-14 flex justify-center lg:justify-end lg:pr-5 items-center gap-6 text-white">
            <div class="parent relative ml-1 min-[450px]:ml-20 ">
                <div id="languageFlag" class="flex items-center gap-2">
                    <img src="https://flagcdn.com/w20/pl.png" srcset="https://flagcdn.com/w40/pl.png 2x" width="20"
                        alt="Poland">
                    <span>Poland</span> <i class="fa-solid fa-caret-down"></i>
                </div>
                <ul id="languageDropdown"
                    class="hidden absolute bg-secondary-800 shadow-lg rounded  w-48 text-white top-7 left-[-24px]">
                    <li class="flex items-center gap-2 p-2 hover:bg-secondary-700 cursor-pointer">
                        <img src="https://flagcdn.com/w20/us.png" srcset="https://flagcdn.com/w40/us.png 2x"
                            width="20" alt="USA">
                        <span>United States</span>
                    </li>
                    <li class="flex items-center gap-2 p-2 hover:bg-secondary-700 cursor-pointer">
                        <img src="https://flagcdn.com/w20/fr.png" srcset="https://flagcdn.com/w40/fr.png 2x"
                            width="20" alt="France">
                        <span>France</span>
                    </li>
                    <li class="flex items-center gap-2 p-2 hover:bg-secondary-700 cursor-pointer">
                        <img src="https://flagcdn.com/w20/es.png" srcset="https://flagcdn.com/w40/es.png 2x"
                            width="20" alt="Spain">
                        <span>Spain</span>
                    </li>
                    <li class="flex items-center gap-2 p-2 hover:bg-secondary-700 cursor-pointer">
                        <img src="https://flagcdn.com/w20/it.png" srcset="https://flagcdn.com/w40/it.png 2x"
                            width="20" alt="Italy">
                        <span>Italy</span>
                    </li>
                    <li class="flex items-center gap-2 p-2 hover:bg-secondary-700 cursor-pointer">
                        <img src="https://flagcdn.com/w20/pt.png" srcset="https://flagcdn.com/w40/pt.png 2x"
                            width="20" alt="Portugal">
                        <span>Portugal</span>
                    </li>
                </ul>
            </div>

            <div><i class="fa fa-dollar text-red"></i> USD</div>
            <div class="flex items-center gap-3">
                <a href="#"><i class="fa-regular fa-user text-red"></i><i class="fa fa-user-o text-red"></i> My
                    Account</a>
                <a href="#"><i class="fa-regular fa-user text-red"></i><i class="fa fa-user-o text-red"></i>
                    Logout</a>
            </div>
            <div class="hidden flex items-center gap-3">
                <a href="#"><i class="fa-regular fa-user text-red"></i><i class="fa fa-user-o text-red"></i>
                    Login/Register</a>
            </div>
        </div>
        <!--Menu Bar-->
        <nav class="relative max-h-16 py-5 shadow-xl flex justify-between md:justify-around items-center" id="nav_bar"
            style="z-index: 1000;">
            <img id="logo"
                class="w-24 min-[450px]:w-32 sm:w-36 relative min-[450px]:absolute min-[450px]:top-[-30px] min-[450px]:left-[-10px] sm:absolute sm:top-[-30px] sm:left-[-10px] md:top-[-35px]"
                src="{{ asset('images/logo/HD-Gabion.png') }}" alt="">
            <div id="logobox" class=" md:hidden w-full flex items-center justify-center">
                <img class="w-28 min-[450px]:w-36 sm:w-44"
                    src="{{ asset('front/images/logo/logo_highres/color1/text/color1_textlogo_transparent_background.png') }}"
                    alt="">
            </div>
            <!--desktop-->
            <div class="hidden md:flex w-full justify-center items-center lg:pl-10 py-5 md:pl-20 ">
                <ul class="md:flex justify-around items-center font-semibold lg:text-base md:text-sm text-slate-700">
                    <li class="py-3 px-3 group"><a href="welcome"
                            class="active py-1 group-hover:text-red transition-colors duration-300">Home <span
                                class="bg-red h-0.5 w-0 group-hover:w-full block transition-all duration-300"></span></a>
                    </li>
                    <li class="py-3 px-3 group "><a href="#"
                            class="py-1 group-hover:text-red transition-colors duration-300">About Us<span
                                class=" bg-red h-0.5 w-0 group-hover:w-full block transition-all duration-300"></span></a>
                    </li>
                    <li class="py-3 px-3 group relative" id="product">
                        <a href="#" class="py-1 group-hover:text-red transition-all duration-300">Products <i
                                class="fa-solid fa-caret-down"></i></a>
                        <div id="product-dropdown"
                            class="max-h-0 overflow-hidden transition-all duration-300 absolute bg-white shadow-md p-5 mt-2 top-full transform -translate-x-1/4 border-4 border-t-red">
                            <div class="flex justify-around items-center gap-2">
                                <a href="home" class="hover:shadow-xl  transition-all duration-300 rounded-2xl">
                                    <figure class="w-44 flex justify-center items-center flex-col gap-2">
                                        <img class="hover:scale-125 transition-all duration-300"
                                            src="{{ asset('front/images/basket_orig/Basket 2.178.png') }}"
                                            alt="" srcset="">
                                        <figcaption class="text-size-12 pt-1">Gabion Baskets</figcaption>
                                    </figure>
                                </a>
                                <a href="#" class="hover:shadow-xl  transition-all duration-300 rounded-2xl">
                                    <figure class="w-44 flex justify-center items-center flex-col gap-2">

                                        <img class="hover:scale-125 transition-all duration-300"
                                            src="{{ asset('front/images/basket_orig/Basket 2.178.png') }}"
                                            alt="" srcset="">

                                        <figcaption class="text-size-12 pt-1">gabion Fences</figcaption>
                                    </figure>
                                </a>
                                <a href="#" class="hover:shadow-xl  transition-all duration-300 rounded-2xl">
                                    <figure class="w-44 flex justify-center items-center flex-col gap-2">
                                        <img class="hover:scale-125 transition-all duration-300"
                                            src="{{ asset('front/images/basket_orig/Basket 2.178.png') }}"
                                            alt="" srcset="">
                                        <figcaption class="text-size-12 pt-1">Parts</figcaption>
                                    </figure>
                                </a>
                                <a href="#"
                                    class="hover:shadow-xl group transition-all duration-300 rounded-2xl">
                                    <figure class="w-44 flex justify-center items-center flex-col gap-2">

                                        <img class="hover:scale-125 transition-all duration-300"
                                            src="{{ asset('front/images/basket_orig/Basket 2.178.png') }}"
                                            alt="" srcset="">

                                        <figcaption class="text-size-12 pt-1">Others</figcaption>
                                    </figure>
                                </a>
                            </div>

                        </div>


                    </li>
                    <li class="py-3 px-3 group relative "><a href="#"
                            class=" py-1 group-hover:text-red transition-colors duration-300">Miscellaneous <i
                                class="fa-solid fa-caret-down"></i></span></a>
                        {{-- <div class="absolute h-12 inset-x-0 border border-red bottom-[-55px]">


                            </div> --}}
                    </li>
                    <li class="py-3 px-3 group "><a href="#"
                            class=" py-1 group-hover:text-red transition-colors duration-300">Gallery<span
                                class=" bg-red h-0.5 w-0 group-hover:w-full block transition-all duration-300"></span></a>
                    </li>
                    <li class="py-3 px-3 group "><a href="#"
                            class=" py-1 group-hover:text-red transition-colors duration-300">Blog<span
                                class=" bg-red h-0.5 w-0 group-hover:w-full block transition-all duration-300"></span></a>
                    </li>
                    <li class="py-3 px-3 group "><a href="#"
                            class=" py-1 group-hover:text-red transition-colors duration-300">Contact Us<span
                                class=" bg-red h-0.5 w-0 group-hover:w-full block transition-all duration-300"></span></a>
                    </li>
                </ul>
            </div>
            <!--Mobile-->
            <div class=" md:hidden fixed left-0 top-0 inset-x-0 bg-secondary-700  z-50 justify-center items-center lg:pl-10 py-5 md:pl-20"
                id="mobile_nav">
                <div id="menucrossbox" class="absolute right-0 top-5 md:hidden ">
                    <i class="fa-solid fa-xmark mr-6 text-white"></i>
                </div>
                <ul
                    class="mt-10 flex flex-col justify-start items-center font-semibold text-sm text-white shadow-xl max-h-screen h-screen">
                    <li class="group w-full">
                        <a href="welcome"
                            class=" active py-3 flex justify-center items-center w-full  group-hover:bg-red group-hover:text-white transition-colors duration-300">Home</a>
                    </li>
                    <li class="group w-full">
                        <a href="welcome"
                            class=" py-3 flex justify-center items-center w-full  group-hover:bg-red group-hover:text-white transition-colors duration-300">About
                            Us</a>
                    </li>
                    <li class="group w-full " id="product_mobile">
                        <a href="#"
                            class="py-3 flex justify-center items-center w-full  group-hover:bg-red group-hover:text-white transition-colors duration-300 gap-2">Products
                            <i class="fa-solid fa-caret-down"></i></a>
                        <div id="product_mobile-dropdown"
                            class="max-h-0 overflow-x-scroll transition-all duration-300  bg-white shadow-md border-4 border-t-red">
                            <div class="flex justify-around items-center gap-2 p-5">
                                <a href="home" class="hover:shadow-xl  transition-all duration-300 rounded-2xl">
                                    <figure class="w-44 flex justify-center items-center flex-col gap-2">
                                        <img class="hover:scale-125 transition-all duration-300"
                                            src="{{ asset('front/images/basket_orig/Basket 2.178.png') }}"
                                            alt="" srcset="">
                                        <figcaption class="text-size-12 pt-1">Gabion Baskets</figcaption>
                                    </figure>
                                </a>
                                <a href="#" class="hover:shadow-xl  transition-all duration-300 rounded-2xl">
                                    <figure class="w-44 flex justify-center items-center flex-col gap-2">

                                        <img class="hover:scale-125 transition-all duration-300"
                                            src="{{ asset('front/images/basket_orig/Basket 2.178.png') }}"
                                            alt="" srcset="">

                                        <figcaption class="text-size-12 pt-1">gabion Fences</figcaption>
                                    </figure>
                                </a>
                                <a href="#" class="hover:shadow-xl  transition-all duration-300 rounded-2xl">
                                    <figure class="w-44 flex justify-center items-center flex-col gap-2">
                                        <img class="hover:scale-125 transition-all duration-300"
                                            src="{{ asset('front/images/basket_orig/Basket 2.178.png') }}"
                                            alt="" srcset="">
                                        <figcaption class="text-size-12 pt-1">Parts</figcaption>
                                    </figure>
                                </a>
                                <a href="#"
                                    class="hover:shadow-xl group transition-all duration-300 rounded-2xl">
                                    <figure class="w-44 flex justify-center items-center flex-col gap-2">

                                        <img class="hover:scale-125 transition-all duration-300"
                                            src="{{ asset('front/images/basket_orig/Basket 2.178.png') }}"
                                            alt="" srcset="">

                                        <figcaption class="text-size-12 pt-1">Others</figcaption>
                                    </figure>
                                </a>
                            </div>

                        </div>


                    </li>
                    <li class="w-full group relative "><a href="#"
                            class=" py-3 flex justify-center items-center w-full  group-hover:bg-red group-hover:text-white transition-colors duration-300 gap-2">Miscellaneous
                            <i class="fa-solid fa-caret-down"></i></span></a>
                        {{-- <div class="absolute h-12 inset-x-0 border border-red bottom-[-55px]">


                </div> --}}
                    </li>
                    <li class="group w-full"><a href="#"
                            class=" py-3 flex justify-center items-center w-full  group-hover:bg-red group-hover:text-white transition-colors duration-300">Gallery</a>
                    </li>
                    <li class="group w-full"><a href="#"
                            class=" py-3 flex justify-center items-center w-full  group-hover:bg-red group-hover:text-white transition-colors duration-300">Blog</a>
                    </li>
                    <li class="group w-full"><a href="#"
                            class=" py-3 flex justify-center items-center w-full  group-hover:bg-red group-hover:text-white transition-colors duration-300">Contact
                            Us</a>
                    </li>
                </ul>
            </div>

            <!--End Mobile Nav bar-->

            <div class="flex justify-around items-center gap-6 ml-auto md:px-5">
                <div class="text-size-12 relative" id="parent-cart">
                    <div id="cart" class="relative  text-center flex flex-col justify-center items-center">
                        <i class="fa fa-shopping-cart text-2xl text-red"></i>
                        <div class="qty absolute bg-red rounded-full size-5 right-0 top-[-10px] text-white font-bold">3
                        </div>

                    </div>
                    <div class="p-0 m-0 flex justify-between items-center gap-2">
                        <span class="whitespace-nowrap">Your Cart</span>
                        <i class="fa-solid fa-caret-down text-size-14"></i>
                    </div>
                    <ul id="cart-dropdown"
                        class="hidden w-72 max-w-72 absolute  bg-white shadow rounded  top-19 right-[-30px]">
                        <li class="shadow">
                            <div class="cart-list max-h-48 overflow-y-scroll  px-3 py-5">
                                <div class="product-widget relative flex items-center justify-around">
                                    <div class="product-img max-w-12 m-3 flex justify-center items-center">
                                        <img class="w-fit object-contain"
                                            src="{{ asset('admin/images/category/2055.jpg') }}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name font-bold mb-1"><a href="#">product name goes
                                                here</a>
                                        </h3>
                                        <h4 class="product-price"><span class="qty">1x</span><span
                                                class="price font-bold ml-1">$980.00</span>
                                        </h4>
                                    </div>
                                    <button class="delete absolute bg-red  text-white size-4 top-1 left-2"><i
                                            class="fa fa-close"></i></button>
                                </div>
                                <div class="product-widget relative flex items-center justify-around">
                                    <div class="product-img max-w-12 m-3 flex justify-center items-center">
                                        <img class="w-fit object-contain"
                                            src="{{ asset('admin/images/category/2055.jpg') }}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name font-bold mb-1"><a href="#">product name goes
                                                here</a>
                                        </h3>
                                        <h4 class="product-price"><span class="qty">1x</span><span
                                                class="price font-bold ml-1">$980.00</span>
                                        </h4>
                                    </div>
                                    <button class="delete absolute bg-red  text-white size-4 top-1 left-2"><i
                                            class="fa fa-close"></i></button>
                                </div>
                                <div class="product-widget relative flex items-center justify-around">
                                    <div class="product-img max-w-12 m-3 flex justify-center items-center">
                                        <img class="w-fit object-contain"
                                            src="{{ asset('admin/images/category/2055.jpg') }}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name font-bold mb-1"><a href="#">product name goes
                                                here</a>
                                        </h3>
                                        <h4 class="product-price"><span class="qty">1x</span><span
                                                class="price font-bold ml-1">$980.00</span>
                                        </h4>
                                    </div>
                                    <button class="delete absolute bg-red  text-white size-4 top-1 left-2"><i
                                            class="fa fa-close"></i></button>
                                </div>
                                <div class="product-widget relative flex items-center justify-around">
                                    <div class="product-img max-w-12 m-3 flex justify-center items-center">
                                        <img class="w-fit object-contain"
                                            src="{{ asset('admin/images/category/2055.jpg') }}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name font-bold mb-1"><a href="#">product name goes
                                                here</a>
                                        </h3>
                                        <h4 class="product-price"><span class="qty">1x</span><span
                                                class="price font-bold ml-1">$980.00</span>
                                        </h4>
                                    </div>
                                    <button class="delete absolute bg-red  text-white size-4 top-1 left-2"><i
                                            class="fa fa-close"></i></button>
                                </div>


                            </div>
                        </li>
                        <li>
                            <div class="cart-summary px-3 my-4">
                                <small class="text-size-12">3 Item(s) selected</small>
                                <h5 class="text-size-14 font-bold mt-2">SUBTOTAL: $2940.00</h5>
                            </div>
                        </li>
                        <li>
                            <div
                                class="mt-1 cart-btns w-full flex justify-between items-center text-center text-white text-size-14 font-bold">
                                <a href="#" class="bg-secondary-800 p-3 w-full">View Cart</a>
                                <a href="#" class="bg-red p-3 w-full">Checkout <i
                                        class="fa fa-arrow-circle-right pl-2"></i></a>
                            </div>
                        </li>

                    </ul>
                </div>
                <div id="menubox" class="md:hidden">
                    <i class="fa-solid fa-bars mr-6"></i>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mx-auto p-4 " style="height:100vh;">
        <h1 class="text-2xl font-bold text-center text-gray-800">Hello, Tailwind CSS in Laravel!</h1>
    </div>
    <h1 class="text-3xl font-bold underline text-center text-red">
        Hello world!
    </h1>
    @vite(['resources/js/common.js','resources/js/app.js', 'resources/js/header.js'])

</body>

</html>
