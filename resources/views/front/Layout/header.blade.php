<!-- ========== NavBar  ========== -->

<section id="main-menu">
    <!-- HEADER-BEGIN -->
    <div id="header20">
        <div class="full offBg">
            <div class="row">
                <div class="col-s-12 col-m-12 col-l-3">
                    {{-- <div class="hamburger " id="hamburger-1">
                        <span class="line">
                        </span>
                        <span class="line">
                        </span>
                        <span class="line">
                        </span>
                    </div> --}}
                    <a class="d-inline-flex align-items-center mb-0 link-dark text-decoration-none" href="/"
                        aria-label="HD-Gabion" id="logo">
                        <img src="{{ asset('images/logo/logo.webp') }}" alt="" id="logoimg">

                        <span class="fs-5 text-danger ">
                            <img src="{{ asset('images/logo/base_textlogo_transparent_background.png') }}"
                                alt="" id="logotext">
                        </span>
                    </a>
                    {{-- <a href="/clients/index.php?rp=/login" id="profilIcon">
                        <img alt="" src="https://www.ucartz.com/img/header/profileIcon.svg" id="img-login">
                    </a> --}}
                    @if (!Auth::check())
                        <div class="headerHelpMenu text-white">
                            <a href="javascript:void(0);" id="profilIcon">
                                <img alt="" src="https://www.ucartz.com/img/header/profileIcon.svg"
                                    id="img-login" tabindex="1">

                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('customerLogin') }}">Login</a></li>
                                {{-- <li><a class="dropdown-item" href="#">Orders</a></li> --}}
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="menu_link" href="{{ route('customerRegister') }}">Register</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('customer.orders') }}">Orders</a></li>

                            </ul>
                        </div>
                    @endif
                    {{-- *****************IF LOGIN ************ --}}
                    @if (Auth::check())
                        <div class="headerHelpMenu text-white">
                            <a href="javascript:void(0);" id="profilIcon">
                                <img alt="" src="https://www.ucartz.com/img/header/profileIcon.svg"
                                    id="img-login" tabindex="1">
                                {{ Auth()->guard('web')->user()->name }}
                            </a>
                            <ul class="" aria-labelledby="navbarDropdown">
                                <li><a class="" href="{{ route('customerAccount') }}">Profile</a></li>
                                {{-- <li><a class="dropdown-item" href="#">Orders</a></li> --}}
                                <li>
                                    <hr class="dropdown-divider">
                                </li>


                                <li><a class="dropdown-item" href="{{ route('customer.orders') }}">Orders</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="menu_link" href="{{ route('customerLogout') }}">Logout</a></li>
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-s-hide col-m-9" style="display:flex;justify-content:end;align-items: center;">
                    <div class="support">

                        {{-- *****************IF NOT LOGIN ************ --}}
                        @if (!Auth::check())
                            <div class="headerHelpMenu text-white">
                                <a href="javascript:void(0);" id="profilIconfull">
                                    {{-- <img alt="" src="https://www.ucartz.com/img/header/profileIcon.svg"
                                        id="img-login" tabindex="1"> --}}
                                    Login/Register
                                </a>
                                <ul class="" >
                                    <li><a class="" href="{{ route('customerLogin') }}">Login</a></li>
                                    {{-- <li><a class="" href="#">Orders</a></li> --}}
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="menu_link" href="{{ route('customerRegister') }}">Register</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="" href="{{ route('customer.orders') }}">Orders</a>
                                    </li>

                                </ul>
                            </div>
                        @endif
                        {{-- *****************IF LOGIN ************ --}}
                        @if (Auth::check())
                            <div class="headerHelpMenu text-white">
                                <a href="javascript:void(0);" id="profilIconfull">
                                    <img alt="" src="https://www.ucartz.com/img/header/profileIcon.svg"
                                        id="img-login" tabindex="1">
                                    {{ Auth()->guard('web')->user()->name }}
                                </a>
                                <ul class="" >
                                    <li><a class="" href="{{ route('customerAccount') }}">Profile</a>
                                    </li>

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>


                                    <li><a class="" href="{{ route('customer.orders') }}">Orders</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="menu_link" href="{{ route('customerLogout') }}">Logout</a></li>
                                </ul>
                            </div>
                        @endif
                        ┃ <a id="menu_customer_not_logged" class="headerHelpMenu text-white btn animation-ripple cta"
                        href="#" title="Home">Draw Your Fence</a>
                        {{-- <a id="menu_customer_not_logged" class="headerHelpMenu text-white btn animation-ripple cta"
                            href="{{ route('drawing-fence') }}" title="Home">Draw Your Fence</a> --}}

                    </div>
                </div>
            </div>
        </div>
        <div class="full mobileSupportMenu">
            <div class="menu20 row">
                <ul>
                    <li class="noL2">
                        <a href="{{ route('home') }}" class="menuTitle a6dU7eb white noL2">Home</a>
                    </li>


                </ul>
            </div>
        </div>
        <div class="full menu20 ">
            <div class="row" style="position: relative;">

                <ul>
                    <li class="li">
                        <div class="baseline-main headerHelpMenu ">
                            <a href="{{ route('home') }}" >Home</a>

                        </div>
                    </li>
                    <li class="li">
                        <div class="baseline-main headerHelpMenu">
                            <a href="{{ route('front.about') }}" >About Us</a>

                        </div>
                    </li>
                    {{-- <li class="l1">
                        <a class="menuTitle a6dU7eb" href="{{ route('home') }}">Home</a>

                    </li>

                    <li class="l1">
                        <a class="menuTitle a6dU7eb" href="{{ route('front.about') }}">About Us</a>

                    </li> --}}

                    {{-- ***************Products******************* --}}
                    <li class="l1">
                        <a class="menuTitle a6dU7eb" href="#">Products</a>
                        <div id="radio_menu20Content" class="menu20Content">
                            <div class="row flex-container noMargin noPadding oHide" id="product_row">
                                <div class="westSide col-s-12 col-m-12">

                                    <div class="flex-wrapper side-hover">
                                        <ul class="full row l2" style="margin: 0.5em 0 0 0em; padding:0px;">
                                            <li>
                                                <div class="col-s-12 col-l-3 title noMargin a5etf">
                                                    <a href="{{ route('fence-detail') }}">Gabion Fences</a>
                                                </div>
                                                <div
                                                    class="col-s-12 col-l-9 flex-wrapper content noMargin right-inner-hover">
                                                    <div class="a5efd row s-hide m-show l-show">
                                                        <div class="col-s-6 contentTitle">Gabion Fences</div>
                                                    </div>
                                                    <hr class="s-hide m-show l-show">
                                                    <ul class="l3">
                                                        <div class="row">
                                                            <div class="col-s-12 col-l-6 noMargin oHide"
                                                                style="width: 100%;">
                                                                <li class="col-s-12 a5elt">
                                                                    <a href="{{ route('fence-detail') }}"
                                                                        class="full block ">
                                                                        <span class="a5elt baseline"><img
                                                                                src={{ asset('images/fence1.jpg') }}
                                                                                alt="" srcset=""
                                                                                class="img-thumbnail"></span>
                                                                        Fence</a>
                                                                </li>
                                                            </div>
                                                            <div class="col-s-12 col-l-6 noMargin oHide"
                                                                style="width: 100%;">
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col-s-12 col-l-3 title noMargin a5etf">
                                                    <a href="{{ route('baskets') }}">Gabion Baskets</a>
                                                </div>
                                                <div
                                                    class="col-s-12 col-l-9 flex-wrapper content noMargin right-inner-hover">
                                                    <div class="a5efd row s-hide m-show l-show">
                                                        <div class="col-s-6 contentTitle">Gabion Baskets</div>
                                                    </div>
                                                    <hr class="s-hide m-show l-show">
                                                    <ul class="l3">
                                                        <div class="row">
                                                            <div class="col-s-12 col-l-6 noMargin oHide"
                                                                style="width: 100%;">
                                                                <li class="col-s-12 a5elt">
                                                                    <a href="{{ route('baskets') }}"
                                                                        class="full block ">
                                                                        <span class="a5elt baseline"><img
                                                                                src={{ asset('images/basket_orig/A001.png') }}
                                                                                alt="" srcset=""
                                                                                class="img-thumbnail"></span>
                                                                        Basket</a>
                                                                </li>
                                                            </div>
                                                            <div class="col-s-12 col-l-6 noMargin oHide"
                                                                style="width: 100%;">
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </li>


                                        </ul>
                                    </div>
                                    <div class="rightLightBlueBorder fakeColumn">
                                    </div>

                                </div>

                            </div>
                        </div>
                    </li>
                    {{-- *************************End Products****************** --}}


                    {{-- ****************************Assembly Insytuctions********************** --}}
                    <li class="l1">
                        <a class="menuTitle a6dU7eb" href="#">Assembly Instructions</a>
                        <div id="radio_menu20Content" class="menu20Content">
                            <div class="row flex-container noMargin noPadding oHide" id="product_row">
                                <div class="westSide col-s-12 col-m-12">

                                    <div class="flex-wrapper side-hover">
                                        <ul class="full row l2" style="margin: 0.5em 0 0 0em; padding:0px;">
                                            <li>
                                                <div class="col-s-12 col-l-3 title noMargin a5etf">
                                                    <a href="/ucartz-shoutcast-internet-radio">Gabion Fences</a>
                                                </div>
                                                <div
                                                    class="col-s-12 col-l-9 flex-wrapper content noMargin right-inner-hover">
                                                    <div class="a5efd row s-hide m-show l-show">
                                                        <div class="col-s-6 contentTitle">Gabion Fences</div>
                                                    </div>
                                                    <hr class="s-hide m-show l-show">
                                                    <ul class="l3">
                                                        <div class="row">
                                                            <div class="col-s-12 col-l-6 noMargin oHide"
                                                                style="width: 100%;">
                                                                <li class="col-s-12 a5elt">

                                                                    <span class="a5elt baseline"><img
                                                                            src={{ asset('images/fence1.jpg') }}
                                                                            alt="" srcset=""
                                                                            class="img-thumbnail"></span>
                                                                    <a href="/ucartz-shoutcast-internet-radio"
                                                                        class="full block "
                                                                        style="padding-left: 80px;">Fence</a>
                                                                </li>
                                                            </div>
                                                            <div class="col-s-12 col-l-6 noMargin oHide"
                                                                style="width: 100%;">
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col-s-12 col-l-3 title noMargin a5etf">
                                                    <a href="{{ route('baskets') }}">Gabion Baskets</a>
                                                </div>
                                                <div
                                                    class="col-s-12 col-l-9 flex-wrapper content noMargin right-inner-hover">
                                                    <div class="a5efd row s-hide m-show l-show">
                                                        <div class="col-s-6 contentTitle">Gabion Baskets</div>
                                                    </div>
                                                    <hr class="s-hide m-show l-show">
                                                    <ul class="l3">
                                                        <div class="row">
                                                            <div class="col-s-12 col-l-6 noMargin oHide"
                                                                style="width: 100%;">
                                                                <li class="col-s-12 a5elt">

                                                                    <span class="a5elt baseline"><img
                                                                            src={{ asset('images/basket_orig/A001.png') }}
                                                                            alt="" srcset=""
                                                                            class="img-thumbnail"></span>
                                                                    <a href="{{ route('baskets') }}"
                                                                        class="full block "
                                                                        style="padding-left: 80px;">Basket</a>
                                                                </li>
                                                            </div>
                                                            <div class="col-s-12 col-l-6 noMargin oHide"
                                                                style="width: 100%;">
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </li>


                                        </ul>
                                    </div>
                                    <div class="rightLightBlueBorder fakeColumn">
                                    </div>

                                </div>

                            </div>
                        </div>
                    </li>
                    {{-- **********************End Assembly Instructions********************* --}}
                    {{-- ***************Info******************* --}}
                    <li class="l1">
                        <a class="menuTitle a6dU7eb" href="#">Info</a>
                        <div id="radio_menu20Content" class="menu20Content">
                            <div class="row flex-container noMargin noPadding oHide" id="product_row">
                                <div class="westSide col-s-12 col-m-12">

                                    <div class="flex-wrapper side-hover">
                                        <ul class="full row l2" style="margin: 0.5em 0 0 0em; padding:0px;">
                                            <li>
                                                <div class="col-s-12 col-l-3 title noMargin a5etf">
                                                    <a href="{{ route('fence-detail') }}">Company Tour</a>
                                                </div>
                                                <div
                                                    class="col-s-12 col-l-9 flex-wrapper content noMargin right-inner-hover">
                                                    <div class="a5efd row s-hide m-show l-show">
                                                        <div class="col-s-6 contentTitle">Company Tour</div>
                                                    </div>
                                                    <hr class="s-hide m-show l-show">
                                                    <ul class="l3">
                                                        <div class="row">
                                                            <div class="col-s-12 col-l-6 noMargin oHide"
                                                                style="width: 100%;">
                                                                <li class="col-s-12 a5elt">
                                                                    <a href="{{ route('fence-detail') }}"
                                                                        class="full block ">
                                                                        <span class="a5elt baseline"><img
                                                                                src={{ asset('images/fence1.jpg') }}
                                                                                alt="" srcset=""
                                                                                class="img-thumbnail"></span>
                                                                        Fence</a>
                                                                </li>
                                                            </div>
                                                            <div class="col-s-12 col-l-6 noMargin oHide"
                                                                style="width: 100%;">
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col-s-12 col-l-3 title noMargin a5etf">
                                                    <a href="{{ route('baskets') }}">Certificates</a>
                                                </div>
                                                <div
                                                    class="col-s-12 col-l-9 flex-wrapper content noMargin right-inner-hover">
                                                    <div class="a5efd row s-hide m-show l-show">
                                                        <div class="col-s-6 contentTitle">Certificates</div>
                                                    </div>
                                                    <hr class="s-hide m-show l-show">
                                                    <ul class="l3">
                                                        <div class="row">
                                                            <div class="col-s-12 col-l-6 noMargin oHide"
                                                                style="width: 100%;">
                                                                <li class="col-s-12 a5elt">
                                                                    <a href="{{ route('baskets') }}"
                                                                        class="full block ">
                                                                        <span class="a5elt baseline"><img
                                                                                src={{ asset('images/basket_orig/A001.png') }}
                                                                                alt="" srcset=""
                                                                                class="img-thumbnail"></span>
                                                                        Basket</a>
                                                                </li>
                                                            </div>
                                                            <div class="col-s-12 col-l-6 noMargin oHide"
                                                                style="width: 100%;">
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col-s-12 col-l-3 title noMargin a5etf">
                                                    <a href="{{ route('baskets') }}">How To Order</a>
                                                </div>
                                                <div
                                                    class="col-s-12 col-l-9 flex-wrapper content noMargin right-inner-hover">
                                                    <div class="a5efd row s-hide m-show l-show">
                                                        <div class="col-s-6 contentTitle">How To Order</div>
                                                    </div>
                                                    <hr class="s-hide m-show l-show">
                                                    <ul class="l3">
                                                        <div class="row">
                                                            <div class="col-s-12 col-l-6 noMargin oHide"
                                                                style="width: 100%; display:flex;">
                                                                <li class="col-s-12 a5elt">
                                                                    <a href="{{ route('baskets') }}"
                                                                        class="full block ">
                                                                        <span class="a5elt baseline"><img
                                                                                src={{ asset('images/fence1.jpg') }}
                                                                                alt="" srcset=""
                                                                                class="img-thumbnail"></span>
                                                                        Fences</a>
                                                                </li>
                                                                <li class="col-s-12 a5elt">
                                                                    <a href="{{ route('baskets') }}"
                                                                        class="full block ">
                                                                        <span class="a5elt baseline"><img
                                                                                src={{ asset('images/basket_orig/A001.png') }}
                                                                                alt="" srcset=""
                                                                                class="img-thumbnail"></span>
                                                                        Basket</a>
                                                                </li>
                                                            </div>
                                                            <div class="col-s-12 col-l-6 noMargin oHide"
                                                                style="width: 100%;">
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="col-s-12 col-l-3 title noMargin a5etf">
                                                    <a href="{{ route('baskets') }}">FAQ</a>
                                                </div>
                                                <div
                                                    class="col-s-12 col-l-9 flex-wrapper content noMargin right-inner-hover">
                                                    <div class="a5efd row s-hide m-show l-show">
                                                        <div class="col-s-6 contentTitle">Frequently Asked Questions
                                                        </div>
                                                    </div>
                                                    <hr class="s-hide m-show l-show">
                                                    <ul class="l3">
                                                        <div class="row">
                                                            <div class="col-s-12 col-l-6 noMargin oHide"
                                                                style="width: 100%; display:flex;">
                                                                <li class="col-s-12 a5elt">
                                                                    <a href="{{ route('baskets') }}"
                                                                        class="full block ">
                                                                        <span class="a5elt baseline"><img
                                                                                src={{ asset('images/fence1.jpg') }}
                                                                                alt="" srcset=""
                                                                                class="img-thumbnail"></span>
                                                                        Fences</a>
                                                                </li>
                                                                <li class="col-s-12 a5elt">
                                                                    <a href="{{ route('baskets') }}"
                                                                        class="full block ">
                                                                        <span class="a5elt baseline"><img
                                                                                src={{ asset('images/basket_orig/A001.png') }}
                                                                                alt="" srcset=""
                                                                                class="img-thumbnail"></span>
                                                                        Basket</a>
                                                                </li>
                                                            </div>
                                                            <div class="col-s-12 col-l-6 noMargin oHide"
                                                                style="width: 100%;">
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="rightLightBlueBorder fakeColumn">
                                    </div>

                                </div>

                            </div>
                        </div>
                    </li>
                    {{-- *************************End Info****************** --}}


                    </li>
                    <li class="li ">
                        <div class="baseline-main headerHelpMenu " style="font-size: 1.6rem;font-weight: 700;line-height: 6.2rem;">
                            <a href="{{ route('front.gallery') }}" >Gallery</a>

                        </div>
                    </li>
                    <li class="li">
                        <div class="baseline-main headerHelpMenu">
                            <a href="{{ route('front.gallery') }}" >Blog</a>

                        </div>
                    </li>
                    <li class="l1">
                        <a class="menuTitle a6dU7eb" href="#">Contact Us</a>
                        <div id="cloud_menu20Content" class="menu20Content">
                            <div class="row flex-container noMargin noPadding oHide">
                                <div class="westSide col-s-12 col-m-9">
                                    {{-- <div class="a5efd row ">
                                        <div class="col-s-6 contentTitle">VPS Hosting</div>
                                        <div class="col-s-6 txtRight">
                                            <a onclick="window.location.href='/buy-vps-cloud-kvm-ucartz'"
                                                class="discover"> Virtual Private Server</a>
                                        </div>
                                    </div> --}}
                                    {{-- <hr> --}}
                                    <ul class="full row l2">
                                        <div class="col-s-12 col-m-12 oHide">
                                            <a href="/ucartz-kvm-vps" class="col-s-12 a5etf">Contact Us</a>
                                            <span class="a5etf baseline">
                                                <a href="/ucartz-contact" class="col-s-12 a5etf "
                                                    style="text-align: center;">
                                                    <img src="{{ asset('images/contact-us/4220713.jpg') }}"
                                                        alt="" srcset="" style="width:35%;">
                                                </a>
                                            </span>

                                        </div>
                                        {{-- <div class="col-s-12 col-m-6 oHide">
                                            <a href="/ucartz-buy-ssd-vps" class="col-s-12 a5etf">SSD VPS</a>
                                            <span class="a5etf baseline">Powered by KVM with full root Links and
                                                instant provisioning</span>
                                            <a href="/ucartz-cloud-vps" class="col-s-12 a5etf">Cloud VPS</a>
                                            <span class="a5etf baseline">Step into Fast, Scalable and Reliable
                                                hosting</span>
                                            <a href="/ucartz-azuracast-managed-vps" class="col-s-12 a5etf">Azuracast
                                                Cloud VPS</a>
                                            <span class="a5etf baseline"> VPS preinstalled with AzuraCast control
                                                panel. Get started with Shoutcast/Icecast radio streaming. </span>
                                            <a href="/kali-linux-vps-hosting-ucartz" class="col-s-12 a5etf">Kali Linux
                                                VPS</a>
                                            <span class="a5etf baseline">Plethora of pre-installed tools to help with
                                                information security tasks</span>
                                        </div> --}}

                                    </ul>
                                </div>
                                <div class="part_quicklink eastSide col-s-12 col-m-3">
                                    <div class="quickAction a5efd">>Our Branches</div>
                                    <hr>
                                    <ul class="full row l2 oHide">
                                        <a class="col-s-12 a5etf" href="/ucartz-about-us">Spain</a>
                                        <span class="a5etf baseline">
                                        </span>

                                        <a class="col-s-12 a5etf" href="/ucartz-how-to-pay">Poland</a>
                                        <span class="a5etf baseline">
                                        </span>
                                        <a class="col-s-12 a5etf" href="/ucartz-how-to-pay">Germany</a>
                                        <span class="a5etf baseline">
                                        </span>
                                        <a class="col-s-12 a5etf" href="/ucartz-how-to-pay">Netherlands </a>
                                        <span class="a5etf baseline">
                                        </span>
                                        <a class="col-s-12 a5etf" href="/ucartz-how-to-pay">Czechia</a>
                                        <span class="a5etf baseline">
                                        </span>
                                        <a class="col-s-12 a5etf" href="/ucartz-how-to-pay">France</a>
                                        <span class="a5etf baseline">
                                        </span>
                                        <a class="col-s-12 a5etf" href="/ucartz-how-to-pay">Slovakia</a>
                                        <span class="a5etf baseline">
                                        </span>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    {{-- <li class="l1">
                        <a href="/ucartz-contact" class="menuTitle a6dU7eb">
                            <img src="{{ asset('images/contact-us/4220713.jpg') }}" alt="" srcset="" style="width:10%;">
                            </a>


                    </li> --}}

                </ul>
            </div>
        </div>
        <div class="full mobileSupportMenu">
            <div class="menu20 row">
                <ul>
                    {{-- *************************End Info****************** --}}
                    <li class="noL2">
                        <a href="{{ route('front.about') }}" class="menuTitle a6dU7eb white noL2">About Us</a>
                    </li>
                    <li class="noL2">
                        <a href="{{ route('front.gallery') }}" class="menuTitle a6dU7eb white noL2">Gallery</a>
                    </li>
                    <li class="noL2">
                        <a href="{{ route('front.gallery') }}" class="menuTitle a6dU7eb white noL2">Blog</a>
                    </li>


                    <li class="">
                        <span class="menuTitle a6dU7eb white">Currency</span>
                        <div id="currency_menu20Content" class="menu20Content" style="min-height: 100px;">
                            <ul style="background-color: #fff;    border-radius: 10px;padding: 10px;">
                                <li>
                                    <a style="border:none" class="menu_link" onclick="setCurrency('INR')">&#8377;
                                        INDIA-INR</a>
                                </li>
                                <li>
                                    <a style="border:none" class="menu_link" onclick="setCurrency('USD')">&#36;
                                        US-USD</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- HEADER-END -->
</section>
