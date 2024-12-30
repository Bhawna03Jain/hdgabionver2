    @extends('front.Layout.layout')

    @section('style')
        <style>
            .register-container {
                display: flex;
                min-height: 70vh;
                align-items: center;
                justify-content: center;
                background-color: #f7f7f7;
                flex-direction: column;
            }

            .register-form {
                padding: 0px 40px;
                width: 100%;
            }
            .row{
                display:flex;
                justify-content:space-between;
                align-items: center;
                width:100%;


            }
        </style>
    @endsection
    @section('content')
        {{-- @section('main-content') --}}
        <!--================Login Box Area =================-->
        <section class="mainSection">
            <div class=" mx-auto w-full md:w-3/4">
                <header class="w-full ">
                    <div class="w-full">
                        <h3 class="text-center text-red text-3xl font-bold mt-10">REGISTER</h3>
                        <div class="line bg-red border"></div>
                    </div>
                </header>
                <div class="register-container flex justify-around items-center flex-col md:flex-row">

                    <div class="register-form w-full px-1" id="">

                        <form action="javascript:;" method="POST" id="customerRegisterForm"
                            class="flex flex-col justify-center items-center" novalidate>
                            <p id="reset-success" class="mb-5"></p>
                            <p id="reset-error" class="mb-5"></p>
                            @csrf
                            <!--Name-->
                            <div class="relative my-5 w-full">
                                <label for="name"
                                    class="absolute left-3 top-1/4 text-base text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">Name
                                    <span class="text-red">*</span></label>
                                <input type="text" name="name" id="name" autocomplete="name"
                                    value="{{ request('name') }}" required
                                    class="form-control block w-full bg-white px-3 py-2  text-gray-900 placeholder-transparent outline-none border-b-2 border-gray-300 focus:border-red text-sm ">
                            </div>
                            <p class="reset-name"></p>
                            <!-- New Row-->
                            <div class="row  flex-col md:flex-row ">
                                <!--Email-->
                                <div class="relative my-5 w-full m-0 md:mr-4">
                                    <label for="email"
                                        class="absolute left-3 top-1/4 text-base text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">Email
                                        <span class="text-red">*</span></label>
                                    <input type="text" name="email" id="email" autocomplete="email"
                                        value="{{ request('email') }}" required
                                        class="form-control block w-full bg-white py-2  text-gray-900 placeholder-transparent outline-none border-b-2 border-gray-300 focus:border-red text-sm ">
                                </div>
                                <p class="reset-email"></p>
                                <!--Password-->
                                <div class="relative my-5  w-full m-0 md:mr-4">
                                    <label for="mobileno"
                                        class="mb-10 absolute left-3 top-1/4 text-base text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">mobileno<span
                                            class="text-red">*</span></label>
                                    <input type="tel" name="mobileno" id="mobileno" autocomplete="mobileno"
                                        value="" required
                                        class="form-control block w-full bg-white py-2  text-gray-900 placeholder-transparent outline-none border-b-2 border-gray-300 focus:border-red text-sm ">
                                    <input type="hidden" name="mobile" id="mobile">
                                    <p id="phone-validation-message" class="text-red"></p>
                                </div>
                                <p class="reset-mobile"></p>
                            </div>
                            <!--End Row-->
                            <!-- Row-->
                            <!--Address-->
                            <div class="relative my-5 w-full">
                                <label for="address"
                                    class="mb-10 absolute left-3 top-1/4 text-base text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">Address<span
                                        class="text-red">*</span></label>
                                <textarea type="text" name="address" id="address" autocomplete="address" required
                                    class="form-control block w-full bg-white px-3 py-2  text-gray-900 placeholder-transparent outline-none border-b-2 border-gray-300 focus:border-red text-sm ">
                                </textarea>
                            </div>
                            <p class="reset-address"></p>

                            <!--End Row-->

                            <!-- New Row-->
                            <div class="row flex-col md:flex-row">
                                <!--City-->
                                <div class="relative my-5 w-full m-0 md:mr-4">
                                    <label for="city"
                                        class="absolute left-3 top-1/4 text-base text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">City
                                        <span class="text-red">*</span></label>
                                    <input type="text" name="city" id="city" autocomplete="city"
                                        value="{{ request('city') }}" required
                                        class="form-control block w-full bg-white px-3 py-2  text-gray-900 placeholder-transparent outline-none border-b-2 border-gray-300 focus:border-red text-sm ">
                                </div>
                                <p class="reset-city"></p>
                                <!--Country-->
                                <div class="relative my-5 w-full m-0 md:mr-4">
                                    <label for="country"
                                        class="mb-10 absolute left-3 top-1/4 text-base text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">country<span
                                            class="text-red">*</span></label>
                                    <input type="text" name="country" id="country" autocomplete="country"
                                        value="" required
                                        class="form-control block w-full bg-white px-3 py-2  text-gray-900 placeholder-transparent outline-none border-b-2 border-gray-300 focus:border-red text-sm ">

                                </div>
                                <p class="reset-country"></p>
                            </div>
                            <!--End Row-->
                            <!--Address-->
                            <div class="relative my-5 w-full">
                                <label for="postal"
                                    class="mb-10 absolute left-3 top-1/4 text-base text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">Postal<span
                                        class="text-red">*</span></label>
                                <input type="text" name="postal" id="postal" autocomplete="postal" required
                                    class="form-control block w-full bg-white px-3 py-2  text-gray-900 placeholder-transparent outline-none border-b-2 border-gray-300 focus:border-red text-sm ">

                            </div>
                            <p class="reset-postal"></p>
                            <!-- New Row-->
                            <div class="row flex-col md:flex-row">
                                <!--Password-->
                                <div class="relative my-5 w-full m-0 md:mr-4">
                                    <label for="password"
                                        class="absolute left-3 top-1/4 text-base text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">password
                                        <span class="text-red">*</span></label>
                                    <input type="text" name="password" id="password" autocomplete="password"
                                        value="{{ request('password') }}" required
                                        class="form-control block w-full bg-white px-3 py-2  text-gray-900 placeholder-transparent outline-none border-b-2 border-gray-300 focus:border-red text-sm ">
                                </div>
                                <p class="reset-password"></p>
                                <!--Password Confirmation-->
                                <div class="relative my-5 w-full m-0 md:mr-4">
                                    <label for="password_confirmation"
                                        class="mb-10 absolute left-3 top-1/4 text-base text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">password_confirmation<span
                                            class="text-red">*</span></label>
                                    <input type="text" name="password_confirmation" id="password_confirmation"
                                        autocomplete="password_confirmation" value="" required
                                        class="form-control block w-full bg-white px-3 py-2  text-gray-900 placeholder-transparent outline-none border-b-2 border-gray-300 focus:border-red text-sm ">

                                </div>
                                <p class="reset-password_confirmation"></p>
                            </div>
                            <!--End Row-->

                            <button type="submit" class="bg-red w-full m-6 p-1 text-white rounded">Register</button>
                            <div class="form-text text-center">Already have Account >>
                                <a href="{{ route('customerLogin') }}">Login</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            </div>
        </section>

        <!--================End Login Box Area =================-->
    @endsection
    @section('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        @vite('resources/js/customerauth.js');
        <script>
            let iti;
            async function getLocationData() {
                try {
                    const response = await fetch('https://ipapi.co/json/');
                    const data = await response.json();
                    return {
                        country: data.country_name || 'United States',
                        city: data.city || '',
                        // state: data.region || '',  // Get the state from the response
                        postal: data.postal || ''
                    };
                } catch (error) {
                    console.error('Error fetching location data:', error);
                    return {
                        country: 'United States',
                        city: '',
                        // state: '',  // Default to empty if there's an error
                        postal: ''
                    };
                }
            }

            async function initLocationFields() {
                const locationData = await getLocationData(); // Fetch location data
                document.getElementById("country").value = locationData.country; // Set country field
                document.getElementById("city").value = locationData.city; // Set city field
                // document.getElementById("state").value = locationData.state;     // Set state field
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
                console.log(countryCode);
                iti = window.intlTelInput(phoneInputField, {
                    initialCountry: countryCode, // Set default country based on user location
                    separateDialCode: true,
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/24.6.0/build/js/utils.js" // For validation and formatting
                });
                phoneInputField.addEventListener('blur', validatePhoneNumber);
            }

            function validatePhoneNumber() {
                const phoneValidationMessage = document.getElementById("phone-validation-message");
                const fullPhoneNumberInput = document.getElementById("mobile");
                const phoneInputField = document.getElementById("mobileno");
                // const iti = window.intlTelInput(phoneInputField);
                // const iti = window.intlTelInputGlobals.getInstance(phoneInputField);

                if (!iti.isValidNumber()) {
                    phoneValidationMessage.textContent = "Please enter a valid phone number.";
                    fullPhoneNumberInput.value = ""; // Clear the hidden input if the number is invalid
                } else {
                    phoneValidationMessage.textContent = ""; // Clear message if the number is valid
                    fullPhoneNumberInput.value = iti.getNumber(); // Set the full phone number in the hidden input
                    // phoneValidationMessage.textContent = ""; // Clear message if valid
                    // const phoneCode = iti.getSelectedCountryData().dialCode; // Get country code
                    // const fullPhoneNumber = iti.getNumber(); // Get full international phone number

                    // console.log("Phone Code:", phoneCode); // e.g., 1 for USA
                    // console.log("Full Phone Number:", fullPhoneNumberInput); // e.g., +11234567890
                }
            }

            // Initialize the phone input and location fields when the page loads
            window.onload = function() {
                initPhoneInput(); // Initialize phone input
                initLocationFields(); // Initialize location fields
            };
        </script>
    @endsection

    {{-- @section('js')

    @endsection --}}
