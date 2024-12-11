
@extends('admin.Layout.layout')
<!-- Content Wrapper. Contains page content -->
 @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="mx-auto">Admin panel - HD Gabion</h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="d-flex justify-content-center align-items-center flex-column" style="
    height: 60vh;">
            <h1 class="mb-4">Welcome to HD Gabion</h1>
            <img src="{{ asset('images/logo/logo.webp') }}" alt="HD Gabion Logo" width="200px">
            <h3 class="mt-4">Admin Panel</h3>
        </div>

      </div><!--/. container-fluid -->
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
