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
  <!--================Forgot Password Box Area =================-->
  <section class="mainSection login-container">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12 col-md-4 mx-auto">
                <header class="" style="margin-bottom: 5rem;">
                    <div class="centerHeading">
                        <h4>Forgot Password</h4>
                        <div class="line mx-auto"></div>
                    </div>
                </header>
                <div class="mt-5 login-form" id="">
                    <p id="forgot-success"></p>
                    <p id="forgot-error"></p>
                    <form action="javascript:;" method="POST" id="customerforgotpassword">
                        <!-- CSRF Token for Laravel -->
                        @csrf
                        <div class="mb-4 form-group">
                            {{-- <label for="email" class="form-label">Email Address<span class="star">*</span></label> --}}
                            <input type="email" class="form-control" id="email" name="email"  placeholder="Email ID" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Email ID'" autocomplete="off" required>
                        </div>
                        <p class="forgot-email"></p>

                        <div class="mb-4 d-flex justify-content-center mt-5 ">
                            <button type="submit" class="btn btn-red">Request New Password</button>
                        </div>
                    </form>

                </div>
            </div>
            </div>
        </div>

    </div>
</section>

<!--================End Forgot Password Box Area =================-->


@endsection
