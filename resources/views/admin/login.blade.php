<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HD Gabion | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    {{-- <link rel="stylesheet" href="{{ url('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('admin/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center" style="display: flex;justify-content:center;align-items:center">
                <img src="{{ asset('images/logo/HD-Gabion.png') }}" alt="" srcset="" width="70px">
                <a href="{{ url('admin/login') }}" class="h1">Admin Login</a>
            </div>
            <div class="card-body">
                {{-- <p class="login-box-msg">Sign In </p> --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('flash_message_error'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> {{ Session::get('flash_message_error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form action="{{ url('admin/login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input name='email' type="email" class="form-control" placeholder="Email"
                            @if (isset($_COOKIE['email'])) value="{{ $_COOKIE['email'] }}" @endif required="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Password"
                            @if (isset($_COOKIE['password'])) value="{{ $_COOKIE['password'] }}" @endif required="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
{{-- <option value="editor">Editor</option>
            <option value="customer">Customer</option> --}}
                    {{-- Roles Select Box --}}
                    <!-- Role Selection Dropdown -->
                    {{-- <div class="input-group mb-3">
                        <select name="admin_role" class="form-control" required="">
                            <option value="" disabled >Select Role</option>
                            <option value="admin" selected>Admin</option>

                            <!-- Add other roles here as needed -->
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-tag"></span>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>

                            {{-- <div class="icheck-primary">
                                <input type="checkbox" id="remember" name ="remember"
                                    @if (isset($_COOKIE['email'])) checked="" @endif>
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div> --}}
                        </div>
                        <!-- /.col -->
                        {{-- <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div> --}}
                        <!-- /.col -->
                    </div>
                </form>

                {{-- <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div> --}}
                <!-- /.social-auth-links -->

                <p class="mb-1 mt-3">Forgot Password?
                    <a href="{{ url('admin/forgot-password') }}" class="mx-auto">Click Here >></a>
                </p>
                {{-- <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> --}}
            </div>


            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ url('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('admin/js/adminlte.min.js') }}"></script>
</body>

</html>
