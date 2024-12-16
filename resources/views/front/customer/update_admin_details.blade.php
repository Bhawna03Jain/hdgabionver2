@extends('admin.Layout.layout')
<!-- Content Wrapper. Contains page content -->
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Update Admin Details</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Update Admin Details</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Admin Details</h3>
            </div>
            <!-- /.card-header -->
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
                @if (Session::has('flash_message_success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Congrats!</strong> {{ Session::get('flash_message_success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <!-- form start -->
            <form method="post" action="{{url('/admin/update-details')}}" enctype="multipart/form-data"> @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="admin_email">Email Address</label>
                  <input type="email" class="form-control" id="admin_email" value="{{Auth::guard('admin')->user()->email}}" readonly="" style="background-color:#666">
                </div>
                <div class="form-group">
                  <label for="admin_name">Name</label>
                  <input type="text" class="form-control" id="admin_name" name="admin_name" placeholder="Name" value="{{Auth::guard('admin')->user()->name}}">
                  <span id="verifyAdminName"></span>
                </div>
                <div class="form-group">
                  <label for="admin_mobile">Mobile</label>
                  <input type="text" class="form-control" id="admin_mobile" name="admin_mobile" placeholder="Mobile" value="{{Auth::guard('admin')->user()->mobile}}">
                </div>
                <div class="form-group">
                  <label for="admin_image">Image</label>
                  <input type="file" class="form-control" id="admin_image" name="admin_image" placeholder="Image">
                  <input type="hidden" name="current_image" value="{{Auth::guard('admin')->user()->image}}">
                  @if(!empty(Auth::guard('admin')->user()->image))
                    <a href="{{ url('admin/images/user/'.Auth::guard('admin')->user()->image) }}" target="_blank" >View Photo</a>
                  @endif
                </div>


              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->




        </div>
        <!--/.col (left) -->

        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
@include('admin.Layout.footer')


</div>
@endsection
<!-- ./wrapper -->
