@extends('admin.Layout.layout')
@section('style')
    <style>
        #main_image_box {
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #main_image_box img {
            width: 70%;
        }

        #rel_image_box {
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- Button to trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#createProductModal">
                                Create Product
                            </button>
                            <div class="card-body table-responsive">
                                <table id="products" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category</th>
                                            <th>Name</th>
                                            <th>Length</th>
                                            <th>Depth</th>
                                            <th>Height</th>
                                            <th>Maze</th>
                                            <th>Main Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->category->category_name ?? 'N/A' }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->length }}</td>
                                                <td>{{ $product->depth }}</td>
                                                <td>{{ $product->height }}</td>
                                                <td>{{ $product->maze }}</td>
                                                <td>
                                                    <img src="{{ asset($product->main_image) }}"
                                                        alt="Main Image-{{ asset($product->main_image) }}" width="50">
                                                </td>
                                                <td>
                                                    {{-- <a href="javascript:void(0)" class="text-warning edit-product-btn" data-id="{{ $product->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </a> --}}
                                                    <a href="javascript:void(0)" class="text-warning edit-product-btn"
                                                        data-id="{{ $product->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0)"
                                                        class="text-primary show-product-images-btn"
                                                        data-id="{{ $product->id }}">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <!-- Image Gallery -->
                                            <tr id="image-gallery-{{ $product->id }}" style="display: none;">
                                                <td colspan="10">
                                                    @if (!empty($product->relevant_images) && count(json_decode($product->relevant_images)) > 0)
                                                        @foreach (json_decode($product->relevant_images) as $image)
                                                            <img src="{{ asset($image) }}" alt="Relevant Image"
                                                                width="100">
                                                        @endforeach
                                                    @else
                                                        <p>No additional images</p>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr id="image-gallery-{{ $product->id }}" style="display: none;">
                                                <td colspan="10">
                                                    @if ($products && count($products) > 0)
                                                        @foreach ($products as $product)
                                                            @foreach (json_decode($product->relevant_images) as $image)
                                                                <img src="{{ asset($image) }}" alt="Relevant Image"
                                                                    width="100">
                                                            @endforeach
                                                        @endforeach
                                                    @else
                                                        <p>No additional images</p>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10">No Products found.</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>

                            <div class="modal fade" id="createProductModal" tabindex="-1" role="dialog"
                                aria-labelledby="createProductModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        {{-- <form id="productCreateForm" method="POST"
                                            action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}"
                                            enctype="multipart/form-data"> --}}
                                        <form id="productCreateForm" method="POST" action="javascript:;"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="modal-header">
                                                <h5 class="modal-title" id="createProductModalLabel">
                                                    Create Product </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="id" id="id" value="">
                                                        <div class="form-group">
                                                            <label for="category_id">Category</label>
                                                            <select class="form-control" id="category_id"
                                                                name="category_id">
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">
                                                                        {{ $category->category_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="name">Product Name</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" value="" required>
                                                        </div>
                                                        <p class="reset-name"></p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="maze">Maze Size</label>
                                                            <select class="form-control" id="maze" name="maze">
                                                                <option value="">Select Maze Size</option>
                                                                <option value="5x5">
                                                                    5x5</option>
                                                                <option value="5x10">
                                                                    5x10</option>
                                                                <option value="5x15">
                                                                    5x15</option>
                                                            </select>
                                                        </div>
                                                        <p class="reset-maze"></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="length">Length</label>
                                                            <input type="number" step="any" class="form-control"
                                                                id="length" name="length" value="" required>
                                                        </div>
                                                        <p class="reset-length"></p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="depth">Depth</label>
                                                            <input type="number" step="any" class="form-control"
                                                                id="depth" name="depth" value="" required>
                                                        </div>
                                                        <p class="reset-depth"></p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="height">Height</label>
                                                            <input type="number" step="any" class="form-control"
                                                                id="height" name="height" value="" required>
                                                        </div>
                                                        <p class="reset-height"></p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="main_image">Main Image</label>
                                                            <input type="file" class="form-control" id="main_image"
                                                                name="main_image">
                                                            {{-- @if (isset($product) && $product->main_image) --}}
                                                            <div id="main_image_box">
                                                                <img src="" alt="Main Image" width="100">
                                                            </div>
                                                            {{-- @endif --}}
                                                        </div>
                                                        <p class="reset-main_image"></p>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="relevant_images">Relevant Images</label>
                                                            <input type="file" class="form-control"
                                                                id="relevant_images" name="relevant_images[]" multiple>
                                                            {{-- @if (isset($product) && $product->relevant_images) --}}
                                                            <div id="rel_image_box">
                                                                {{-- @foreach (json_decode($product->relevant_images) as $image)
                                                                        <img src="{{ asset($image) }}"
                                                                            alt="Relevant Image" width="100">
                                                                    @endforeach --}}
                                                            </div>
                                                            {{-- @endif --}}
                                                        </div>
                                                        <p class="reset-relevant_images"></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" id="save-product">Save
                                                    Product</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog"
                                aria-labelledby="editProductModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">

                                        <form id="producteditForm" method="POST"
                                            action="{{ route('products.update', $product->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editProductModalLabel">
                                                    Edit Product</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="id" id="id"
                                                            value="">
                                                        <div class="form-group">
                                                            <label for="category_id">Category</label>
                                                            <select class="form-control" id="category_id"
                                                                name="category_id">
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">
                                                                        {{ $category->category_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="name">Product Name</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" value="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="maze">Maze Size</label>
                                                            <select class="form-control" id="maze" name="maze">
                                                                <option value="">Select Maze Size</option>
                                                                <option value="5x5">
                                                                    5x5</option>
                                                                <option value="5x10">
                                                                    5x10</option>
                                                                <option value="5x15">
                                                                    5x15</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="length">Length</label>
                                                            <input type="number" step="any" class="form-control"
                                                                id="length" name="length" value="" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="depth">Depth</label>
                                                            <input type="number" step="any" class="form-control"
                                                                id="depth" name="depth" value="" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="height">Height</label>
                                                            <input type="number" step="any" class="form-control"
                                                                id="height" name="height" value="" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="main_image">Main Image</label>
                                                            <input type="file" class="form-control" id="main_image"
                                                                name="main_image">
                                                            {{-- @if (isset($product) && $product->main_image) --}}
                                                            <div id="main_image_box">
                                                                <img src="" alt="Main Image" width="100">
                                                            </div>
                                                            {{-- @endif --}}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="relevant_images">Relevant Images</label>
                                                            <input type="file" class="form-control"
                                                                id="relevant_images" name="relevant_images[]" multiple>

                                                            <div id="rel_image_box">
                                                                {{-- @foreach (json_decode($product->relevant_images) as $image) --}}
                                                                {{-- <img src=""
                                                                            alt="Relevant Image" width="100"> --}}
                                                                {{-- @endforeach --}}
                                                            </div>
                                                            {{-- @endif --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" id="update-product" class="btn btn-primary">Update
                                                    Product</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('jscript')
    <script src="{{ url('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        // $(function() {
            $("#products").DataTable();
        // });
        // $(function() {
        //         $("#products").DataTable({
        //             "responsive": true,
        //             "lengthChange": false,
        //             "autoWidth": false,
        //             "paging": true,

        //             "searching": false,
        //             "ordering": true,
        //             "info": true,

        //             "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        //         }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        //     });
    </script>
    <script src="{{ asset('admin/js/functions.js') }}"></script>
    <script src="{{ asset('admin/js/product.js') }}"></script>
@endsection
