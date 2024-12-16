@extends('front.Layout.layout')
@section('main-content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card card-form">
                    <div class="card-header">
                        <h2 class="mb-0 mx-auto text-center" style="">Register</h2>
                    </div>

                    <div class="card-body">
                        {{-- @include('validation_error') --}}
                        <p id="reset-success"></p>
                        <form action="javascript:;" method="POST" id="customerRegisterForm">
                            <!-- CSRF Token for Laravel -->
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="form-label">Name <span class="star">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <p class="reset-name"></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="email" class="form-label">Email <span class="star">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" required>

                                    </div>
                                    <p class="reset-email"></p>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="mobile" class="form-label">Mobile No. <span class="star">*</span></label>
                                        <input type="text" class="form-control" id="mobile" name="mobile" required>
                                    </div>
                                    <p class="reset-mobile"></p>
                                </div>
                            </div>




{{--
                            <div class="mb-4">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div> --}}
                            <p class="reset-address"></p>
                              <div class="mb-4">
                                <label for="address" class="form-label">Address <span class="star">*</span></label>
                                <textarea class="form-control" name="address" id="address" rows="2"></textarea>
                            </div>
                                <p></p>
                            {{-- <div class="mb-4">
                                <label for="state" class="form-label">State</label>
                                <input type="text" class="form-control" id="state" name="state" required>
                            </div> --}}
                            {{-- <p class="reset-state"></p>
                            <div class="mb-4">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" id="country" name="country" required>
                            </div>
                            <p class="reset-country"></p> --}}

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password <span class="star">*</span> <span class="password_property"> (Password must be minimum 4 characters)</span></label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <p class="reset-password"></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="password_confirmation" class="form-label">Confirm Password <span class="star">*</span></label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                    </div>
                                    <p class="reset-password_confirmation" name="password_confirmation"></p>
                                </div>
                            </div>


                            <div class="mb-4  d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>

                        </form>
                    </div>
                    {{-- <div class="card-footer text-center">
                        <p class="mb-0">Already have an account? <a href="{{ route('customerLogin')}}">Login here</a>.</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

@endsection
