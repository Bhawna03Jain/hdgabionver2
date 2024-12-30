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
            padding: 20px 40px;
            width: 100%;

            a {
                color: var(--form-a);
            }
        }
    </style>
@endsection
@section('content')
    {{-- @section('main-content') --}}
    <!--================Login Box Area =================-->
    <section class="mainSection">
        <div class=" mx-auto w-full md:w-2/4">
            <header class="w-full ">
                <div class="w-full">
                    <h3 class="text-center text-red text-3xl font-bold mt-10">Reset Password</h3>
                    <div class="line bg-red border"></div>
                </div>
            </header>
            <div class="register-container flex justify-around items-center flex-col md:flex-row">

                <div class="register-form w-full px-1" id="">

                    <form action="javascript:;" method="POST" id="customerresetpassword"
                        class="flex flex-col justify-center items-center" novalidate>
                        <p id="reset-success" class="mb-5"></p>
                        <p id="reset-error" class="mb-5"></p>
                        @csrf

                        <!--Email-->
                        <div class="relative my-5 w-full ">
                            <label for="email"
                                class="absolute left-3 top-1/4 text-base text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">email
                                <span class="text-red">*</span></label>
                            <input type="password" name="email" id="email" autocomplete="email"
                                value="{{ request('email') }}" required
                                class="form-control block w-full bg-white px-3 py-2  text-gray-900 placeholder-transparent outline-none border-b-2 border-gray-300 focus:border-red text-sm ">
                        </div>
                        <p class="reset-email"></p>
                        <!--Password-->
                        <div class="relative my-5 w-full ">
                            <label for="new_pwd"
                                class="absolute left-3 top-1/4 text-base text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">new_pwd
                                <span class="text-red">*</span></label>
                            <input type="password" name="new_pwd" id="new_pwd" autocomplete="new_pwd"
                                value="{{ request('new_pwd') }}" required
                                class="form-control block w-full bg-white px-3 py-2  text-gray-900 placeholder-transparent outline-none border-b-2 border-gray-300 focus:border-red text-sm ">
                        </div>
                        <p class="reset-new_pwd"></p>
                        <!--Password Confirmation-->
                        <div class="relative my-5 w-full ">
                            <label for="confirm_pwd"
                                class="mb-10 absolute left-3 top-1/4 text-base text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">Confirm
                                Password<span class="text-red">*</span></label>
                            <input type="password" name="confirm_pwd" id="confirm_pwd" autocomplete="confirm_pwd"
                                value="" required
                                class="form-control block w-full bg-white px-3 py-2  text-gray-900 placeholder-transparent outline-none border-b-2 border-gray-300 focus:border-red text-sm ">

                        </div>
                        <p class="reset-confirm_pwd"></p>


                        <button type="submit" class="bg-red w-full m-6 p-1 text-white rounded">Reset Password</button>

                    </form>
                </div>

            </div>
        </div>
        </div>
    </section>

    <!--================End Login Box Area =================-->

    <div class="h-96"></div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    @vite('resources/js/customerauth.js');
@endsection
