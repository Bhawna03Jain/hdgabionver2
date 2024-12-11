@extends('admin.Layout.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- <h1 class="m-0">Admin Panel - HD Gabion</h1> --}}
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Admin Profile</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content admin-content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Left Side: Profile -->
                    <!-- Left Side: Profile -->
                    <div class="col-md-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <div class="position-relative">
                                        @if (Auth::guard('admin')->user()->image)
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="{{ asset(Auth::guard('admin')->user()->image) }}"
                                                alt="User profile picture" width=150 height=150>
                                        @else
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="https://via.placeholder.com/150" alt="User profile picture">
                                        @endif

                                        <div class="change-pic-icon position-absolute"
                                            style="top: 80%; left: 80%; cursor:pointer;" data-toggle="modal"
                                            data-target="#changePicModal">
                                            <i class="fa fa-camera"></i>
                                        </div>
                                    </div>
                                    <h3 id="profile-name" class="profile-username text-center">
                                        {{ ucwords(Auth::guard('admin')->user()->name) }}</h3>
                                    <p id="update-uploaded"></p>
                                </div>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Email</b> <a id="profile-email"
                                            class="float-right">{{ Auth::guard('admin')->user()->email }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Mobile</b> <a id="profile-mobile"
                                            class="float-right">{{ Auth::guard('admin')->user()->mobile }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side: Tabs -->
                    <div class="col-md-9 ">
                        <div class="card p-3">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#edit-details" data-toggle="tab">Edit Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#update-password" data-toggle="tab">Update Password</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                    <a class="nav-link" href="#order-tracking" data-toggle="tab">Order Tracking</a>
                                </li> --}}
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- Edit Details Tab -->
                                    <div class="active tab-pane" id="edit-details">
                                        <h5>Edit Details</h5>
                                        <p id="update-success"></p>
                                        <p id="update-error"></p>
                                        <form action="javascript:;" method="POST" id="adminUpdateDetail">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name" class="form-label">Name<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ Auth::guard('admin')->user()->name }}">
                                            </div>
                                            <p class="update-name"></p>

                                            <div class="form-group">
                                                <label for="mobile" class="form-label">Mobile <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="mobile" name="mobile"
                                                    value="{{ Auth::guard('admin')->user()->mobile }}">
                                            </div>
                                            <p class="update-mobile"></p>

                                            <div class="form-group">
                                                <label for="address" class="form-label">Address </label>
                                                <textarea class="form-control" name="address" id="address" rows="2">{{ Auth::guard('admin')->user()->address }}</textarea>
                                            </div>
                                            <p class="update-address"></p>

                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>

                                    <!-- Update Password Tab -->
                                    <div class="tab-pane" id="update-password">
                                        <h5>Update Password</h5>
                                        <p id="reset-success"></p>
                                        <p id="reset-error"></p>
                                        <form action="javascript:;" method="POST" id="adminUpdatePasswordForm">
                                            @csrf
                                            <div class="form-group">
                                                <label for="current_pwd" class="form-label">Current Password <span
                                                        class="text-danger">*</span><span class="password_property">
                                                        (Password must be minimum 4 characters)</span></label>
                                                <input type="password" class="form-control" id="current_pwd"
                                                    name="current_pwd" placeholder="Current Password">
                                            </div>
                                            <p id="verifyCurrentPwd"></p>
                                            <p class="reset-current_pwd"></p>

                                            <div class="form-group">
                                                <label for="new_pwd" class="form-label">New Password <span
                                                        class="text-danger">*</span><span class="password_property">
                                                        (Password must be minimum 4 characters)</span></label>
                                                <input type="password" class="form-control" id="new_pwd"
                                                    name="new_pwd" placeholder="New Password">
                                            </div>
                                            <p class="reset-new_pwd"></p>

                                            <div class="form-group">
                                                <label for="confirm_pwd" class="form-label">Confirm Password <span
                                                        class="text-danger">*</span><span class="password_property">
                                                        (Password must be minimum 4 characters)</span></label>
                                                <input type="password" class="form-control" id="confirm_pwd"
                                                    name="confirm_pwd" placeholder="Confirm Password">
                                            </div>
                                            <p class="reset-confirm_pwd"></p>

                                            <button type="submit" class="btn btn-primary">Update Password</button>
                                        </form>
                                    </div>

                                    <!-- Order Tracking Tab -->
                                    <div class="tab-pane" id="order-tracking">
                                        <h5>Order Tracking</h5>
                                        <p>Order #12345 - Shipped on September 12, 2023</p>
                                        <p>Order #67890 - Delivered on August 30, 2023</p>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for Change Picture -->
            <div class="modal fade" id="changePicModal" tabindex="-1" aria-labelledby="changePicModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="changePicModalLabel">Change Profile Picture</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:;" method="POST" id="adminUpdatePic"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="admin_image" class="form-label">Select New Picture</label>
                                    <input type="file" class="form-control" id="admin_image" name="admin_image">
                                    <input type="hidden" name="current_image"
                                        value="{{ Auth::guard('admin')->user()->image }}">
                                </div>
                                <p class="update-admin_image"></p>
                                <p class="update-error"></p>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('jscript')
    <script src="{{ url('admin/js/admin-login.js') }}"></script>
    <script src="{{ url('admin/js/admin-detail.js') }}"></script>
@endsection
