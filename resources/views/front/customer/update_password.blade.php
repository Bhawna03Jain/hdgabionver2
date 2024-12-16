<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0 mx-auto">Update Password</h4>
                    </div>

                    <div class="card-body">
                        {{-- @include('validation_error') --}}
                        <p id="reset-success"></p>
                        <p id="reset-error"></p>
                        <form action="javascript:;" method="POST" id="customerUpdatePasswordForm">
                            <!-- CSRF Token for Laravel -->
                            @csrf


                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="admin_email">Email address</label>
                                    <input type="email" class="form-control" id="admin_email"
                                        value="{{ Auth::user()->email }}" readonly="" style="background-color:#666">
                                </div>

                                <div class="mb-3">
                                    <label for="current_pwd">Current Password</label>
                                    <input type="password" class="form-control" id="current_pwd" name="current_pwd"
                                        placeholder="Current Password">

                                </div>
                                <p class="reset-current_pwd"></p>
                                <div class="mb-3">
                                    <label for="new_pwd">New Password</label>
                                    <input type="password" class="form-control" id="new_pwd" name="new_pwd"
                                        placeholder="New Password">
                                </div>
                                <p class="reset-new_pwd"></p>
                                <div class="mb-3">
                                    <label for="confirm_pwd">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_pwd" name="confirm_pwd"
                                        placeholder="Confirm Password">
                                </div>
                                <p class="reset-confirm_pwd"></p>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>



                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="{{ asset('front/js/custom.js') }}"></script>
</body>

</html>

