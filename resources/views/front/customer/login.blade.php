@extends('front.Layout.layout')
@section('style')
    <style>
        .login-container {
            display: flex;
            min-height: 85vh;
            align-items: center;
            justify-content: center;
            background-color: #f7f7f7;
            flex-direction: column;

            & #form-wrapper {
                height: 100%;
                display: flex;
                align-items: center;
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
        }

        .login-image .overlay {
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .login-form {
            padding: 20px 40px;
            width: 100%;

            a {
                color: var(--form-a);
            }
        }
    </style>
@endsection
@section('main-content')
    <!--================Login Box Area =================-->
    <section class="mainSection">
        <div class="container login-container ">
            <div class="row">
                <div class="col-12">
                    <header>
                        <div >
                            <h3 class="centerSubHeading">LOGIN</h3>
                            <div class="line mx-auto"></div>
                        </div>
                    </header>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 col-md-6 ">
                    <div class="login-image image-box ">
                        <div class="overlay">
                            <header class="mb-0">
                                <div class="centerHeading">
                                    New to our website?
                                </div>

                            </header>

                            <p class="content mb-5 mt-3"> Explore how our gabion baskets and fences offer sustainable,
                                durable, and aesthetically pleasing solutions for your next project!</p>
                            <a href="{{ route('customerRegister') }}" class="btn btn-red">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">

                    <div class="login-form" id="">
                        <p id="reset-success"></p>
                        <p id="reset-error"></p>
                        <form class="" action="javascript:;" method="POST" id="customerLoginForm">
                            @csrf
                            <div class="mb-3 form-group">
                                {{-- <label for="username" class="form-label">Username</label> --}}
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Email ID" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Email ID'" autocomplete="off"   value="{{ request('email') }}" >
                            </div>
                            <p class="reset-email"></p>
                            <div class="mb-3 form-group">
                                {{-- <label for="password" class="form-label">Password</label> --}}
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Password'" autocomplete="off" required>
                            </div>
                            <p class="reset-password"></p>
                            {{-- <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Keep me logged in</label>
                            </div> --}}
                            <button type="submit" class="btn btn-red w-100 mt-5">Log In</button>
                            <div class="form-text mt-4 text-center">
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
