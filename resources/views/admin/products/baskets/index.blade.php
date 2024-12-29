@extends('admin.Layout.layout')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
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
    <style>
        .main {
            .container {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                grid-gap: 1rem;
                justify-content: center;
                align-items: center;
            }

            .card {
                background: $color-white;
                box-shadow: $box-shadow;
                color: $color-dark;
                border-radius: 2px;

                &-image {
                    background: $color-white;
                    display: block;
                    padding-top: 70%;
                    position: relative;
                    width: 100%;

                    img {
                        display: block;
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    }
                }
            }
        }

        @media only screen and (max-width: 600px) {
            .main {
                .container {
                    display: grid;
                    grid-template-columns: 1fr;
                    grid-gap: 1rem;
                }
            }
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
                                            <th>Article No</th>
                                            <th>HS Code</th>
                                            {{-- <th>SKU</th> --}}
                                            <th>Name</th>
                                            <th>Length</th>
                                            <th>Width</th>
                                            <th>Height</th>
                                            <th>Maze</th>
                                            <th>Price</th>
                                            <th>Short Description</th>
                                            <th>Detailed Description</th>
                                            <th>Main Image</th>
                                            <th>Visible To Frontend</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @forelse ($products as $product)
                                                <tr>
                                                    <td>{{ $product->id }}</td>
                                                    <td>{{ $product->article_no }}</td>
                                                    <td>{{ $product->hs_code }}</td>
                                                    {{-- <td>{{ $product->sku }}</td> --}}
                                                    <td>{{ $product->name }}</td>
                                                    <td>@php
                                                        $Attribute = $product->attributes->firstWhere('name', 'length');
                                                    @endphp
                                                        @if ($Attribute)
                                                            {{ $Attribute->value }}
                                                        @endif
                                                    </td>
                                                    <td>@php
                                                        $Attribute = $product->attributes->firstWhere('name', 'width');
                                                    @endphp
                                                        @if ($Attribute)
                                                            {{ $Attribute->value }}
                                                        @endif
                                                    </td>
                                                    <td>@php
                                                        $Attribute = $product->attributes->firstWhere('name', 'height');
                                                    @endphp
                                                        @if ($Attribute)
                                                            {{ $Attribute->value }}
                                                        @endif
                                                    </td>
                                                    <td>@php
                                                        $Attribute = $product->attributes->firstWhere('name', 'maze');
                                                    @endphp
                                                        @if ($Attribute)
                                                            {{ $Attribute->value }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $product->total_price }}</td>
                                                    <td>
                                                        @php
                                                            $Attribute = $product->attributes->firstWhere(
                                                                'name',
                                                                'short_description',
                                                            );
                                                        @endphp
                                                        @if ($Attribute)
                                                            {{ $Attribute->value }}
                                                        @endif
                                                    </td>

                                                    <td>
                                                        {{-- <a href="#" class="view-description"
                                                            data-id="{{ $product->id }}">View Full Description</a>
                                                        <!-- Modal Structure --> --}}
                                                        <a href="#" class="view-description" data-toggle="modal"
                                                            data-target="#productDescriptionModal-{{ $product->id }}">
                                                            View Full Description
                                                        </a>
                                                        <!-- Modal Structure -->
                                                        <div id="productDescriptionModal-{{ $product->id }}"
                                                            class="modal fade" tabindex="-1" role="dialog"
                                                            aria-labelledby="productDescriptionLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="productDescriptionLabel">
                                                                            Product Full Description</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body"
                                                                        id="modalContent-{{ $product->id }}">
                                                                        @php
                                                                            $Attribute = $product->attributes->firstWhere(
                                                                                'name',
                                                                                'full_description',
                                                                            );
                                                                        @endphp
                                                                        @if ($Attribute)
                                                                            <div class="description-content"
                                                                                style="width: 100vw;">
                                                                                {!! $Attribute->value !!}
                                                                            </div>
                                                                        @else
                                                                            <p>No Detailed Description</p>
                                                                        @endif
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        @if ($product->main_image)
                                                            <img src="{{ asset($product->main_image) }}" alt="Main Image"
                                                                width="50">
                                                        @else
                                                            <p>No Image</p>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" checked data-toggle="toggle" data-size="xs" value="{{ $product->is_shown_to_fronend }}">
                                                    </td>
                                                    <td>
                                                        {{-- <a href="javascript:void(0)" class="text-warning edit-product-btn" data-id="{{ $product->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a> --}}
                                                        <a href="{{ route('products.edit', $product->id) }}"
                                                            class="text-warning edit-product-btn"
                                                            data-id="{{ $product->id }}">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="#" class="view-description" data-toggle="modal"
                                                            data-target="#relevantImagesModal-{{ $product->id }}">
                                                            <i class="fas fa-eye icon-white" data-toggle="tooltip"
                                                                title="Show Images"></i>
                                                        </a>
                                                        {{-- <a href="javascript:void(0)"
                                                            class="text-primary show-product-images-btn"
                                                            data-id="{{ $product->id }}">
                                                            <i class="fas fa-eye icon-white" data-toggle="tooltip"
                                                                title="Show Images"></i>
                                                        </a> --}}
                                                        <!-- Modal Structure -->
                                                        <div id="relevantImagesModal-{{ $product->id }}"
                                                            class="modal fade modal-fullscreen  lightbox-modal" tabindex="-1"
                                                            role="dialog" aria-labelledby="relevantImagesLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog  modal-dialog-centered modal-fullscreen"
                                                                role="document">
                                                                <div class="modal-content bg-white">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="relevantImagesLabel">
                                                                            Images</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    {{-- <div class="modal-body">

                                                                        @if (!empty($product->relevant_images) && is_array(json_decode($product->relevant_images, true)))
                                                                            <div class="">
                                                                                @foreach (json_decode($product->relevant_images) as $image)
                                                                                    <a href="{{ asset($image) }}"
                                                                                        data-fancybox="product-images">
                                                                                        <img src="{{ asset($image) }}"
                                                                                            class="img-fluid mb-2"
                                                                                            alt="Relevant Image">
                                                                                    </a>
                                                                                @endforeach
                                                                            </div>
                                                                        @else
                                                                            <p>No additional images</p>
                                                                        @endif
                                                                    </div> --}}
                                                                    {{-- ******Carousal******* --}}
                                                                    {{-- <div class="modal-body">
                                                                        @if (!empty($product->relevant_images) && is_array(json_decode($product->relevant_images, true)))
                                                                            <div id="carouselExampleIndicators-{{ $product->id }}" class="carousel slide" data-ride="carousel">
                                                                                <ol class="carousel-indicators">
                                                                                    @foreach (json_decode($product->relevant_images) as $key => $image)
                                                                                        <li data-target="#carouselExampleIndicators-{{ $product->id }}" data-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}"></li>
                                                                                    @endforeach
                                                                                </ol>
                                                                                <div class="carousel-inner">
                                                                                    @foreach (json_decode($product->relevant_images) as $key => $image)
                                                                                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                                                                            <img src="{{ asset($image) }}" class="d-block w-100" alt="Relevant Image">
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                <a class="carousel-control-prev" href="#carouselExampleIndicators-{{ $product->id }}" role="button" data-slide="prev">
                                                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                                    <span class="sr-only">Previous</span>
                                                                                </a>
                                                                                <a class="carousel-control-next" href="#carouselExampleIndicators-{{ $product->id }}" role="button" data-slide="next">
                                                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                                    <span class="sr-only">Next</span>
                                                                                </a>
                                                                            </div>
                                                                        @else
                                                                            <p>No additional images</p>
                                                                        @endif
                                                                    </div> --}}

                                                                    {{-- <div class="modal-body"
                                                                        id="modalContent-{{ $product->id }}">
                                                                        <section class="photo-gallery ">
                                                                            <div class="container">
                                                                                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 gallery-grid">
                                                                                    @if (!empty($product->relevant_images) && is_array(json_decode($product->relevant_images, true)))
                                                                                    @foreach (json_decode($product->relevant_images) as $image)
                                                                                    <div class="col">
                                                                                        <a class="gallery-item" href="{{ asset($image) }}">

                                                                                            <img src="{{ asset($image) }}" class="img-fluid" alt="Relevant Image">
                                                                                        </a>
                                                                                    </div>
                                                                                    @endforeach
                                                                                    @else
                                                                                        <p>No additional images</p>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </section>
                                                                        {{-- @if (!empty($product->relevant_images) && is_array(json_decode($product->relevant_images, true)))
                                                                            @foreach (json_decode($product->relevant_images) as $image)
                                                                                <img src="{{ asset($image) }}"
                                                                                    alt="Relevant Image" width="100">
                                                                            @endforeach
                                                                        @else
                                                                            <p>No additional images</p>
                                                                        @endif--
                                                                    </div> --}}
                                                                    <div class="modal-body"
                                                                        id="modalContent-{{ $product->id }}">
                                                                        <main class="main">
                                                                            <div class="container">
                                                                                @if (!empty($product->relevant_images) && is_array(json_decode($product->relevant_images, true)))
                                                                                    @foreach (json_decode($product->relevant_images) as $image)
                                                                                        <div class="card">
                                                                                            <div class="card-image">
                                                                                                <a href="{{ asset($image) }}"
                                                                                                    data-fancybox="gallery-{{ $product->id }}"
                                                                                                    data-caption="Caption Images 1">
                                                                                                    <img src="{{ asset($image) }}"
                                                                                                        class="img-fluid"
                                                                                                        alt="Relevant Image">
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>

                                                                                    @endforeach
                                                                                @else
                                                                                    <p>No additional images</p>
                                                                                @endif

                                                                            </div>
                                                                        </main>
                                                                        {{-- <section class="photo-gallery">
                                                                            <div class="container">
                                                                                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 gallery-grid">
                                                                                    @if (!empty($product->relevant_images) && is_array(json_decode($product->relevant_images, true)))
                                                                                        @foreach (json_decode($product->relevant_images) as $image)
                                                                                            <div class="col">
                                                                                                <a class="gallery-item" href="{{ asset($image) }}" data-fancybox="product-images" data-caption="Relevant Image">
                                                                                                    <img src="{{ asset($image) }}" class="img-fluid" alt="Relevant Image">
                                                                                                </a>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    @else
                                                                                        <p>No additional images</p>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </section> --}}
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Image Gallery -->

                                                {{-- <tr class="image-gallery-row" id="image-gallery-{{ $product->id }}" style="display: none;"> --}}

                                                {{-- <tr class="no-datatable image-gallery-row"
                                                    id="image-gallery-{{ $product->id }}" style="display: none;">
                                                    <td colspan="10">
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
                                                <tr class="no-datatable full-description-row"
                                                    id="full-description-{{ $product->id }}" style="display: none;">
                                                    <td colspan="10">
                                                        @php
                                                            $Attribute = $product->attributes->firstWhere(
                                                                'name',
                                                                'full_description',
                                                            );
                                                        @endphp
                                                        @if ($Attribute)
                                                            <div class="description-content" style="width: 100vw;">
                                                                {!! $Attribute->value !!}
                                                            </div>
                                                        @else
                                                            <p>No Detailed Description</p>
                                                        @endif
                                                    </td>
                                                </tr> --}}

                                            @empty
                                                <tr>
                                                    <td colspan="13">No Products found.</td>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    {{-- <script src="{{ url('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}

    {{-- <script>
        $(function() {
            $("#products").DataTable();
        });
    </script> --}}
    {{-- <script src="{{ asset('admin/js/functions.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/js/product.js') }}"></script> --}}
    <script>
        $("#products").DataTable({
            "lengthChange": true,
            "autoWidth": true,
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            scrollX: true,
            scrollY: "70vh",
            "buttons": ["pdf", "colvis"],
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            rowCallback: function(row, data, index) {
                if ($(row).hasClass("no-datatable")) {

                    $(row).remove();
                }
            }
        }).buttons().container().appendTo('#products_wrapper .col-md-6:eq(0)');
    </script>
    <script src="{{ asset('admin/js/product.js') }}"></script>
    <script>
        // $(document).ready(function() {
        //     $('.fancybox').fancybox({
        //         buttons: [
        //             'slideShow',
        //             'fullScreen',
        //             'thumbs',
        //             'close'
        //         ]
        //     });
        // });
//
// console.log(productId);
//         $('[data-fancybox="gallery"]').fancybox({
//             buttons: [
//                 "slideShow",
//                 // "thumbs",
//                 "zoom",
//                 "fullScreen",
//                 // "share",
//                 "close"
//             ],
//             loop: false,
//             protect: true
//         });
    </script>
@endsection
