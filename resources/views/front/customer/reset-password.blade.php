@extends('front.Layout.layout')
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

            a {
                color: var(--form-a);
            }
        }
        </style>
        @endsection

@section('main-content')
 <!--================Reset Password Box Area =================-->
 <section class="mainSection login-container">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12 col-md-4 mx-auto">
                <header class="mt-5" >
                    <div class="centerHeading">
                        <h4>Reset Password</h4>
                        <div class="line mx-auto"></div>
                    </div>
                </header>
                <div class="mt-5 login-form" id="">
                    <p id="reset-success"></p>
                        <p id="reset-error"></p>
                        <form action="javascript:;" method="POST" id="customerresetpassword">
                            <!-- CSRF Token for Laravel -->
                            @csrf

                            <div class="form-group">

                                <input type="hidden" class="form-control" id="code" name="code" value={{ $code }}>

                              </div>

                            <div class="mb-3 form-group">
                                {{-- <label for="password" class="form-label">Password <span class="star">*</span></label> --}}
                                <input type="password" class="form-control" id="new_pwd" name="new_pwd" placeholder="New Password" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'New Password'" autocomplete="off"  required>
                            </div>
                            <p class="reset-new_pwd"></p>


                            <div class="mb-3 form-group">
                                {{-- <label for="password" class="form-label">Confirm Password <span class="star">*</span></label> --}}
                                <input type="password" class="form-control" id="confirm_pwd" name="confirm_pwd" placeholder="Confirm password" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Confirm password'" autocomplete="off" required>
                            </div>
                            <p class="reset-confirm_pwd"></p>
                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-red mt-5   ">Reset Password</button>
                            </div>
                        </form>

                </div>
            </div>
            </div>
        </div>

    </div>
</section>


<!--================End Reset Password Box Area =================-->


@endsection
