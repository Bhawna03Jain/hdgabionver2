@extends('front.Layout.layout')
@section('main-content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-form">
                    <div class="card-header">
                        <h2 class="mb-0 mx-auto text-center" >Forgot Password</h2>

                    </div>

                    <div class="card-body">
                        {{-- @include('validation_error') --}}
                        <p id="forgot-success"></p>
                        <p id="forgot-error"></p>
                        <form action="javascript:;" method="POST" id="customerforgotpassword">
                            <!-- CSRF Token for Laravel -->
                            @csrf
                            <div class="mb-4">
                                <label for="email" class="form-label">Email Address<span class="star">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <p class="forgot-email"></p>

                            <div class="mb-4 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Request New Password</button>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="card-footer text-center d-flex justify-content-between">
                        <p class="mb-0"> <a href="{{ route('customerLogin')}}">Login</a>.</p>
                        <p class="mb-0">No account? <a href="{{ route('customerRegister')}}">Register here</a>.</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

@endsection
