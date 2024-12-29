@extends('layout')
@section('style')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/24.6.0/build/css/intlTelInput.min.css" />
@endsection
@section('content')
    <main class="min-h-screen">
        <div>
            <h2>Checkout</h2>
            <div>HOME/CHECKOUT</div>
        </div>
        <div id="line"></div>
        <div class="flex justify-between items-start gap-2 flex-col sm:flex-row">
            <!-- Left Side-->
            <div id="left" class="w-svw sm:w-1/2 p-5 flex-grow-1">
                <!--Select Address-->
                <div class="relative mt-5 flex gap-3">
                    <input type="radio" name="delivery_address" id="select_address">

                    <label for="delivery_address" class="font-bold text-2xl">Select Address</label>

                </div>
                <section id="select_adress_list" class="hidden border border-gray-600 max-h-48 overflow-y-scroll p-3 mt-5">
                    <ul>
                        <li class="border-b-2 border-gray-200 py-4 space-x-2"> <input type="radio"
                                name="delivery_address_item" id="select_address_item1" checked>

                            <label for="delivery_address_item" class="">Select Address1</label>
                        </li>
                        <li class="border-b-2 border-gray-200 py-4 space-x-2"> <input type="radio"
                                name="delivery_address_item" id="select_address_item2" checked>

                            <label for="delivery_address_item" class="">Select Address1</label>
                        </li>
                        <li class="border-b-2 border-gray-200 py-4 space-x-2"> <input type="radio"
                                name="delivery_address_item" id="select_address_item3" checked>

                            <label for="delivery_address_item" class="">Select Address1</label>
                        </li>
                        <li class="border-b-2 border-gray-200 py-4 space-x-2"> <input type="radio"
                                name="delivery_address_item" id="select_address_item4" checked>

                            <label for="delivery_address_item" class="">Select Address1</label>
                        </li>
                        <li class="border-b-2 border-gray-200 py-4 space-x-2"> <input type="radio"
                                name="delivery_address_item" id="select_address_item5" checked>

                            <label for="delivery_address_item" class="">Select Address1</label>
                        </li>
                        <li class="border-b-2 border-gray-200 py-4 space-x-2"> <input type="radio"
                                name="delivery_address_item" id="select_address_item6" checked>

                            <label for="delivery_address_item" class="">Select Address1</label>
                        </li>
                        <li class="border-b-2 border-gray-200 py-4 space-x-2"> <input type="radio"
                                name="delivery_address_item" id="select_address_item7" checked>

                            <label for="delivery_address_item" class="">Select Address1</label>
                        </li>
                        <li class="border-b-2 border-gray-200 py-4 space-x-2"> <input type="radio"
                                name="delivery_address_item" id="select_address_item8" checked>

                            <label for="delivery_address_item" class="">Select Address1</label>
                        </li>
                    </ul>
                </section>

                <!--Create Address-->
                <div class="relative mt-5 flex gap-3">
                    <input type="radio" name="delivery_address" id="create_address" checked>
                    <label for="delivery_address" class="font-bold text-2xl">Create Address</label>
                </div>
                <section id="create_adress_list" class="border border-gray-600 p-3 mt-5">
                    <form action="javascript:;" method="POST" id="createDeliveryAddressForm">
                        @csrf
                        <!--Name-->
                        <div class="relative mt-5">
                            <label for="name"
                                class="absolute  left-3 top-1/2 text-sm text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">Name</label>
                            <input type="text" name="name" id="name" autocomplete="name" required
                                class="form-control block w-full bg-white px-3 py-2  text-gray-900 placeholder-transparent outline-none border-b-2 border-gray-300 focus:border-red text-sm ">
                        </div>
                        <p class="reset-name"></p>
                        <!--Email-->
                        <div class="relative mt-5">
                            <label for="email"
                                class="absolute  left-3 top-1/2 text-sm text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">Email</label>
                            <input type="email" name="email" id="email" autocomplete="email" required
                                class="form-control block w-full bg-white px-3 py-2  text-gray-900 placeholder-transparent outline-none border-b-2 border-gray-300 focus:border-red text-sm ">
                        </div>
                        <p class="reset-email"></p>
                        <!--Address-->
                        <div class="relative mt-5">
                            <label for="address"
                                class="absolute  left-3 top-1/2 text-sm text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">Address</label>
                            <textarea type="text" name="address" id="address" autocomplete="address" required
                                class="form-control block w-full bg-white px-3 py-2  text-gray-900 placeholder-transparent outline-none border-b-2 border-gray-300 focus:border-red text-sm "></textarea>
                        </div>
                        <p class="reset-address"></p>
                        <!--Mobile-->
                        <div class="relative mt-5">
                            <label for="mobile"
                                class="absolute left-3 top-1/2 text-sm text-gray-500 transform -translate-y-1/2 pointer-events-none transition-all duration-200">
                                Mobile No
                            </label>
                            <input type="tel" class="form-control" id="mobileno" name="mobileno"
                                autocomplete="off" required onblur="validatePhoneNumber()">
                            <input type="hidden" name="mobile" id="mobile">
                            <p id="phone-validation-message" class="text-danger"></p>
                        </div>
                        <p id="phone-validation-message" class="text-danger"></p>
                        {{-- <div class="relative mt-5">
                            <label for="mobile"
                                class="absolute  left-3 top-1/2 text-sm text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">Mobile
                                No</label>

                            <input type="tel" class="form-control" id="mobileno" name="mobileno"
                                placeholder="Mobile No." onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Mobile No.'; validatePhoneNumber()" autocomplete="off"
                                required>
                            <input type="hidden" name="mobile" id="mobile" class="">
                            <p id="phone-validation-message" class="text-danger"></p>
                        </div> --}}
                        <p class="reset-mobile"></p>
                        <!--country-->
                        <div class="relative mt-5">
                            <label for="country"
                                class="absolute  left-3 top-1/2 text-sm text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">country</label>
                            <input type="text" name="country" id="country" autocomplete="country" required
                                class="form-control block w-full bg-white px-3 py-2  text-gray-900 placeholder-transparent outline-none border-b-2 border-gray-300 focus:border-red text-sm ">
                        </div>
                        <p class="reset-country"></p>

                        <!--city-->
                        <div class="relative mt-5">
                            <label for="city"
                                class="absolute  left-3 top-1/2 text-sm text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">city</label>
                            <input type="text" name="city" id="city" autocomplete="city" required
                                class="form-control block w-full bg-white px-3 py-2  text-gray-900 placeholder-transparent outline-none border-b-2 border-gray-300 focus:border-red text-sm ">
                        </div>
                        <p class="reset-city"></p>
                        <!--country-->
                        <div class="relative mt-5">
                            <label for="postal"
                                class="absolute  left-3 top-1/2 text-sm text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">postal</label>
                            <input type="text" name="postal" id="postal" autocomplete="postal" required
                                class="form-control block w-full bg-white px-3 py-2  text-gray-900 placeholder-transparent outline-none border-b-2 border-gray-300 focus:border-red text-sm ">
                        </div>
                        <p class="reset-postal"></p>

                    </form>

                </section>
            </div>
            <!-- Right Side-->
            <div id="right" class="w-svw sm:w-1/2 p-5 flex-grow-1">
                <h2 class="font-bold text-2xl mb-5">Your Order</h2>
                    <div class="cart-list max-h-60 overflow-y-scroll  px-3 py-5 mb-5">
                        <div class="product-widget relative flex items-center justify-around mb-5">
                            <div class="product-img max-w-12 flex justify-center items-center w-1/3 ">
                                <img class="w-fit object-contain " src="{{ asset('admin/images/category/2055.jpg') }}"
                                    alt="">
                            </div>

                            <div class="product-body flex justify-center items-center w-2/3 gap-5">
                                <h3 class="product-name font-bold text-base w-2/3"><a href="#"><span
                                            class="qty pr-2">1x</span>product name goes
                                        here</a>
                                </h3>
                                <h4 class="product-price w-1/3"><span class="price font-bold  text-base">$980.00</span>
                                </h4>
                            </div>

                        </div>
                        <div class="product-widget relative flex items-center justify-around  mb-5">
                            <div class="product-img max-w-12 flex justify-center items-center w-1/3 ">
                                <img class="w-fit object-contain " src="{{ asset('admin/images/category/2055.jpg') }}"
                                    alt="">
                            </div>

                            <div class="product-body flex justify-center items-center w-2/3 gap-5">
                                <h3 class="product-name font-bold text-base w-2/3"><a href="#"><span
                                            class="qty pr-2">1x</span>product name goes
                                        here</a>
                                </h3>
                                <h4 class="product-price w-1/3"><span class="price font-bold  text-base">$980.00</span>
                                </h4>
                            </div>

                        </div>
                        <div class="product-widget relative flex items-center justify-around  mb-5">
                            <div class="product-img max-w-12 flex justify-center items-center w-1/3 ">
                                <img class="w-fit object-contain " src="{{ asset('admin/images/category/2055.jpg') }}"
                                    alt="">
                            </div>

                            <div class="product-body flex justify-center items-center w-2/3 gap-5">
                                <h3 class="product-name font-bold text-base w-2/3"><a href="#"><span
                                            class="qty pr-2">1x</span>product name goes
                                        here</a>
                                </h3>
                                <h4 class="product-price w-1/3"><span class="price font-bold  text-base">$980.00</span>
                                </h4>
                            </div>

                        </div>
                        <div class="product-widget relative flex items-center justify-around  mb-5">
                            <div class="product-img max-w-12 flex justify-center items-center w-1/3 ">
                                <img class="w-fit object-contain " src="{{ asset('admin/images/category/2055.jpg') }}"
                                    alt="">
                            </div>

                            <div class="product-body flex justify-center items-center w-2/3 gap-5">
                                <h3 class="product-name font-bold text-base w-2/3"><a href="#"><span
                                            class="qty pr-2">1x</span>product name goes
                                        here</a>
                                </h3>
                                <h4 class="product-price w-1/3"><span class="price font-bold  text-base">$980.00</span>
                                </h4>
                            </div>

                        </div>

                    </div>
                    <div class="cart-summary px-3 my-5  flex justify-around items-center text-center">
                        <small class="text-size-12">3 Item(s) selected</small>
                        <h5 class="text-size-14 font-bold mt-2">SUBTOTAL:</h5>
                        <h5 class="text-size-14 font-bold mt-2">5689</h5>
                    </div>
                    <div class="relative mt-5 flex items-center  gap-3">
                        <input type="checkbox" name="terms" id="terms">

                        <label for="terms" class="font-bold text-base mb-5">I've read and accept the terms & conditions</label>

                    </div>
                    <div
                        class="mt-5 cart-btns w-full flex justify-between items-center text-center text-white text-size-14 font-bold">
                       \
                        <a href="#" class="bg-red p-3 w-full rounded-full text-xl">Checkout <i
                                class="fa fa-arrow-circle-right pl-2"></i></a>
                    </div>


                </div>
            </div>
        </div>
            {{--


        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-10 w-auto"
                    src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
                <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">Sign in to your account</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="#" method="POST">
                    <div class="relative">
                        <label for="email"
                            class="absolute left-3 top-1/2 transform -translate-y-1/2 text-sm text-gray-500 pointer-events-none transition-all duration-200">Email
                            address</label>
                        <input type="email" name="email" id="email" autocomplete="email" required
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 placeholder-transparent outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">

                    </div>

                    <div class="relative">
                        <input type="password" name="password" id="password" autocomplete="current-password" required
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 placeholder-transparent outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                        <label for="password"
                            class="absolute left-3 top-1/2 transform -translate-y-1/2 text-sm text-gray-500 pointer-events-none transition-all duration-200">Password</label>
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                            in</button>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm text-gray-500">
                    Not a member?
                    <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Start a 14-day free
                        trial</a>
                </p>
            </div>
        </div> --}}

    </main>
@endsection
{{-- <div class="relative mt-5">
                                <label for="password"
                                    class="absolute  left-3 top-1/2 text-sm text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">password</label>
                                <input type="password" name="password" id="password" autocomplete="password" required
                                    class="form-control block w-full bg-white px-3 py-2  text-gray-900 placeholder-transparent outline-none border-b-2 border-gray-300 focus:border-red text-sm ">
                                <div id="toggle-password" class="absolute right-3 top-1/2 transform -translate-y-1/2">
                                    <i class="fa-solid fa-eye"></i>
                                </div>
                            </div> --}}
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/24.6.0/build/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/24.6.0/build/js/utils.js"></script>

    <script>
        async function getLocationData() {
            try {
                const response = await fetch('https://ipapi.co/json/');
                const data = await response.json();
                return {
                    country: data.country_name || 'United States',
                    city: data.city || '',
                    postal: data.postal || ''
                };
            } catch (error) {
                console.error('Error fetching location data:', error);
                return {
                    country: 'United States',
                    city: '',
                    postal: ''
                };
            }
        }

        async function initLocationFields() {
            const locationData = await getLocationData(); // Fetch location data
            document.getElementById("country").value = locationData.country; // Set country field
            document.getElementById("city").value = locationData.city; // Set city field
            document.getElementById("postal").value = locationData.postal; // Set postal code field
        }

        async function getCountryCode() {
            try {
                const response = await fetch('https://ipapi.co/json/');
                const data = await response.json();
                return data.country_code.toLowerCase();
            } catch (error) {
                console.error('Error fetching country code:', error);
                return 'us'; // Default to the US
            }
        }

        async function initPhoneInput() {
            const countryCode = await getCountryCode(); // Fetch user's country code
            const phoneInputField = document.getElementById("mobileno");

            window.intlTelInput(phoneInputField, {
                initialCountry: countryCode, // Set default country based on user location
                separateDialCode: true,
                // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/24.6.0/build/js/utils.js" // For validation and formatting
                loadUtilsOnInit: true,
            });
        }

        function validatePhoneNumber() {
            const phoneValidationMessage = document.getElementById("phone-validation-message");
            const fullPhoneNumberInput = document.getElementById("mobile");
            const phoneInputField = document.getElementById("mobileno");
            const iti = window.intlTelInput(phoneInputField);

            if (!iti.isValidNumber()) {
                phoneValidationMessage.textContent = "Please enter a valid phone number.";
                fullPhoneNumberInput.value = ""; // Clear the hidden input if the number is invalid
            } else {
                phoneValidationMessage.textContent = ""; // Clear message if the number is valid
                fullPhoneNumberInput.value = iti.getNumber(); // Set the full phone number in the hidden input
            }
        }

        // Initialize the phone input and location fields when the page loads
        window.onload = function() {
            initPhoneInput(); // Initialize phone input
            initLocationFields(); // Initialize location fields
        };
    </script>
@endsection
