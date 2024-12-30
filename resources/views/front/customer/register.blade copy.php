@extends('front.Layout.layout_old')

@section('style')
    <style>
        .login-container {
            display: flex;
            min-height: 70vh;
            align-items: center;
            justify-content: center;
            background-color: #f7f7f7;
            flex-direction: column;
        }

        .login-form {
            padding: 20px 40px;
            width: 100%;
        }
    </style>
@endsection

@section('main-content')
    <!--================Reset Password Box Area =================-->
    <section class="mainSection login-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-8 mx-auto">
                    <header class="mt-5">
                        <div>
                            <h4 class="centerSubHeading">REGISTER</h4>
                            <div class="line mx-auto"></div>
                        </div>
                    </header>
                    <div class="mt-5 login-form">
                        <p id="reset-success"></p>
                        <form action="javascript:;" method="POST" id="customerRegisterForm">
                            @csrf

                            <div class="mb-4 form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'" autocomplete="off" required>
                            </div>
                            <p class="reset-name"></p>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4 form-group">
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Email ID" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Email ID'" autocomplete="off" required>
                                    </div>
                                    <p class="reset-email"></p>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-4 form-group">
                                        <input type="tel" class="form-control" id="mobileno" name="mobileno"
                                               placeholder="Mobile No." onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Mobile No.'; validatePhoneNumber()"
                                               autocomplete="off" required>
                                        <input type="hidden" name="mobile" id="mobile">
                                        <p id="phone-validation-message" class="text-danger"></p>
                                    </div>
                                    <p class="reset-mobile"></p>
                                </div>
                            </div>

                            <div class="mb-4 form-group">
                                <textarea class="form-control" name="address" id="address" rows="4"
                                          placeholder="Address" onfocus="this.placeholder = ''"
                                          onblur="this.placeholder = 'Address'" autocomplete="off"></textarea>
                            </div>

                            <div class="mb-4 form-group">
                                <input type="text" class="form-control" id="country" name="country"
                                       placeholder="Country" required>
                            </div>
                            <div class="mb-4 form-group">
                                <input type="text" class="form-control" id="city" name="city"
                                       placeholder="City" required>
                            </div>
                            <div class="mb-4 form-group">
                                <input type="text" class="form-control" id="postal" name="postal"
                                       placeholder="Postal Code" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4 form-group">
                                        <input type="password" class="form-control" id="password" name="password"
                                               placeholder="Password" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Password'" autocomplete="off" required>
                                    </div>
                                    <p class="reset-password"></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4 form-group">
                                        <input type="password" class="form-control" id="password_confirmation"
                                               name="password_confirmation" placeholder="Confirm Password"
                                               onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Confirm Password'" autocomplete="off" required>
                                    </div>
                                    <p class="reset-password_confirmation"></p>
                                </div>
                            </div>

                            <div class="mb-4 form-group d-flex justify-content-between align-items-center flex-column">
                                <button type="submit" class="btn btn-red">Register</button>
                                <div class="mt-4">Already have Account >> <a href="{{ route('customerLogin') }}"
                                       class="color-logo">Login</a></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Reset Password Box Area =================-->
@endsection

@section('js')
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
            document.getElementById("city").value = locationData.city;       // Set city field
            document.getElementById("postal").value = locationData.postal;   // Set postal code field
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
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/24.6.0/build/js/utils.js" // For validation and formatting
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
