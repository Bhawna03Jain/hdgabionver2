@extends('front.Layout.layout')
@section('main-content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card carf-form">
                    <div class="card-header">
                        <h4 class="mb-0 mx-auto">Reset Password</h4>
                    </div>

                    <div class="card-body">
                        {{-- @include('validation_error') --}}
                        <p id="reset-success"></p>
                        <p id="reset-error"></p>
                        <form action="javascript:;" method="POST" id="customerresetpassword">
                            <!-- CSRF Token for Laravel -->
                            @csrf

                            <div class="form-group">

                                <input type="hidden" class="form-control" id="code" name="code" value={{ $code }}>

                              </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password <span class="star">*</span></label>
                                <input type="password" class="form-control" id="new_pwd" name="new_pwd" required>
                            </div>
                            <p class="reset-new_pwd"></p>


                            <div class="mb-3">
                                <label for="password" class="form-label">Confirm Password <span class="star">*</span></label>
                                <input type="password" class="form-control" id="confirm_pwd" name="confirm_pwd" required>
                            </div>
                            <p class="reset-confirm_pwd"></p>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Reset</button>
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
