@extends('front.Layout.layout')
{{-- @extends('front.Layout.layout_old') --}}
@section('style')
    <style>
        .login-container {
            /* display: flex;
                min-height: 85vh;
                align-items: center;
                justify-content: center;
                background-color: #f7f7f7;
                flex-direction: column; */

            & #form-wrapper {
                /* height: 100%;
                    display: flex;
                    align-items: center; */
            }
        }

        .login-image {
            background: url('../images/AITool/1.jpg') no-repeat center center;
            background-size: cover;
            min-height: 50vh;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .login-image .overlay {
            background-color: rgba(0, 0, 0, 0.7);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            /* display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100%;
                position: relative; */
        }

        .login-form {
            /* padding: 20px 40px;
                width: 100%;

                a {
                    color: var(--form-a);
                } */


        }

        .line {
            display: block;
            height: 5px;
            width: 100px;
            position: relative;
            border-radius: 5px;
            /* overflow: hidden; */
            margin: 10px auto 20px auto;
        }

        .line::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 5px;
            background: white;
            animation: MOVE-BG 4s linear infinite;
        }

        @keyframes MOVE-BG {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(105px);
            }
        }


    </style>
@endsection
@section('content')
    {{-- @section('main-content') --}}
    <!--================Login Box Area =================-->
    <section class="mainSection">
        <div class=" mx-10">
            <header class="w-full mb-10">
                <div class="w-full">
                    <h3 class="text-center text-red text-3xl font-bold mt-10">LOGIN</h3>
                    <div class="line bg-red border"></div>
                </div>
            </header>
            <div class="login-container flex justify-around items-center flex-col md:flex-row">
                <div class="login-image image-box w-full md:w-1/2">
                    <div class="overlay z-10 flex justify-center items-center flex-col gap-8">
                        <header class="mb-0 z-50">
                            <div class="text-red text-3xl font-bold">
                                New to our website?
                            </div>

                        </header>

                        <p class="content mb-5 mt-3 text-white text-base"> Explore how our gabion baskets and fences offer
                            sustainable,
                            durable, and aesthetically pleasing solutions for your next project!</p>
                        <a href="{{ route('customerRegister') }}"
                            class="bg-red text-base opacity-90 px-8 py-2 rounded-xl">Create an Account</a>
                    </div>
                </div>
                <div class="login-form  w-full md:w-1/2 px-1" id="">

                    <form action="javascript:;" method="POST" id="customerLoginForm"
                        class="py-5 px-10 flex flex-col justify-center items-center">
                        <p id="reset-success" class="mb-5"></p>
                        <p id="reset-error" class="mb-5"></p>
                        @csrf
                        <!--Email-->
                        <div class="relative my-5 w-full">
                            <label for="email"
                                class="absolute left-3 top-1/4 text-lg text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">Email
                                <span class="text-red">*</span></label>
                            <input type="text" name="email" id="email" autocomplete="email"
                                value="{{ request('email') }}" required
                                class="form-control block w-full bg-white px-3 py-2  text-gray-900 placeholder-transparent outline-none border-b-2 border-gray-300 focus:border-red text-sm ">
                        </div>
                        <p class="reset-email"></p>
                        <!--Password-->
                        <div class="relative my-5 w-full">
                            <label for="password"
                                class="mb-10 absolute left-3 top-1/4 text-lg text-gray-500  transform -translate-y-1/2 pointer-events-none transition-all duration-200">password<span
                                    class="text-red">*</span></label>
                            <input type="password" name="password" id="password" autocomplete="password" value=""
                                required
                                class="form-control block w-full bg-white px-3 py-2  text-gray-900 placeholder-transparent outline-none border-b-2 border-gray-300 focus:border-red text-sm ">
                        </div>
                        <p class="reset-password"></p>

                        <button type="submit" class="bg-red w-full m-6 p-1 text-white rounded">Log In</button>
                        <div class="form-text text-center">
                            <a href="{{ route('customerForgotPassword') }}">Forgot Password?</a>
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
@endsection
