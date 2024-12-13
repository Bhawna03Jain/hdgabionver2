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
        .icon-white {
    color: white;
}
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Products-{{ $category->category_name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Products-{{ $category->category_name }}</li>
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
                            {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#createProductModal">
                                Create Product
                            </button> --}}
                            <div class="card-header d-flex">
                                <a href="{{ route('products.create', $category->id) }}" class="btn btn-primary"
                                    style="margin-left: auto;">Create Products</a>
                                {{-- <a href="javascript:;" class="btn btn-primary" style="margin-left: auto;" id="create-category-btn">Create Category</a> --}}
                            </div>
                            <div class="card-body table-responsive">
                                <table id="products" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            {{-- <th>Category</th> --}}
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
                                        @php
                                            // echo $product->attributes;
                                            @endphp
                                        @endphp
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                {{-- <td>{{ $product->category->category_name ?? 'N/A' }}</td> --}}
                                                <td>{{ $product->name }}</td>
                                                <td>@php
                                                    $Attribute = $product->attributes->firstWhere('name', 'length');
                                                @endphp
                                                @if ($Attribute)
                                                   {{ $Attribute->value }}
                                                @endif</td>
                                                <td>@php
                                                    $Attribute = $product->attributes->firstWhere('name', 'depth');
                                                @endphp
                                                @if ($Attribute)
                                                   {{ $Attribute->value }}
                                                @endif</td>
                                                <td>@php
                                                    $Attribute = $product->attributes->firstWhere('name', 'height');
                                                @endphp
                                                @if ($Attribute)
                                                   {{ $Attribute->value }}
                                                @endif</td>
                                                <td>@php
                                                    $Attribute = $product->attributes->firstWhere('name', 'maze');
                                                @endphp
                                                @if ($Attribute)
                                                   {{ $Attribute->value }}
                                                @endif</td>

                                                <td>
                                                    @if ($product->main_image )
                                                        <img src="{{ asset($product->main_image) }}" alt="Main Image"
                                                            width="50">

                                                    @else
                                                        <p>No Image</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{-- <a href="javascript:void(0)" class="text-warning edit-product-btn" data-id="{{ $product->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </a> --}}
                                                    <a href="{{ route('products.edit', $product->id) }}" class="text-warning edit-product-btn"
                                                        data-id="{{ $product->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="javascript:void(0)"
                                                        class="text-primary show-product-images-btn"
                                                        data-id="{{ $product->id }}">
                                                        <i class="fas fa-eye icon-white" data-toggle="tooltip" title="Show Images"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <!-- Image Gallery -->
                                            <tr id="image-gallery-{{ $product->id }}" style="display: none;">
                                                <td colspan="10">
                                                    {{-- @if (!empty($product->relevant_images) && count(json_decode($product->relevant_images)) > 0) --}}
                                                    @if (!empty($product->relevant_images) && is_array(json_decode($product->relevant_images, true)))
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
                                                            @if (!empty($product->relevant_images) && is_array(json_decode($product->relevant_images)))
                                                                @foreach (json_decode($product->relevant_images) as $image)
                                                                    <img src="{{ asset($image) }}" alt="Relevant Image"
                                                                        width="100">
                                                                @endforeach
                                                            @else
                                                                <p>No additional images</p>
                                                            @endif
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



                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('jscript')
    {{-- <script src="{{ url('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}

    <script>
        $(function() {
            $("#products").DataTable();
        });
    </script>
    {{-- <script src="{{ asset('admin/js/functions.js') }}"></script> --}}
    <script src="{{ asset('admin/js/product.js') }}"></script>
@endsection
