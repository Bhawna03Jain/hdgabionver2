@extends('front.Layout.layout')
@section('main-content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-form">
                    <div class="card-header">
                        <h2 class="mb-0 mx-auto text-center" >Login</h2>
                    </div>

                    <div class="card-body">
                        {{-- @include('validation_error') --}}
                        <p id="reset-success"></p>
                        <p id="reset-error"></p>
                        <form action="javascript:;" method="POST" id="customerLoginForm">
                            <!-- CSRF Token for Laravel -->
                            @csrf
                            <div class="mb-4">
                                <label for="email" class="form-label">Email Address <span class="star">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" required autocomplete="off">
                            </div>
                            <p class="reset-email"></p>


                            <div class="mb-4">
                                <label for="password" class="form-label">Password <span class="star">*</span></label>
                                <input type="password" class="form-control" id="password" name="password" required autocomplete="off">
                            </div>
                            <p class="reset-password"></p>


                            <div class="mb-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Login</button>
                                <a href="{{ route('customerForgotPassword') }}" class="btn border border-1 ms-3 bg-transparent">Forgot Password?</a>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="card-footer text-center">
                        <p class="mb-0">No account? <a href="{{ route('customerRegister')}}">Register here</a>.</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
