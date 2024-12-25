@extends('admin.Layout.layout')
@section('style')
    <style>
        .note-editable {
            height: 209.614px;
            background-color: white;
            color: black;
        }
    </style>
    <style>
        .card-body {
            padding: 0px;
        }

        fieldset {
            border: 1px solid #ccc;
            padding: 0 8px;
            /* margin-bottom: 20px; */
            border-radius: 5px;
            margin: 1rem;

        }

        /* fieldset fieldset .form-group {
                                                                                        margin-bottom: 0.5rem;
                                                                                    }

                                                                                    */
        fieldset .form-group label,
        fieldset th,
        fieldset td {
            font-size: 0.85rem;
        }

        fieldset legend {
            font-weight: bold;
            width: auto;
            padding: 0rem;
            font-size: 0.9rem;
        }

        /* fieldset .table td,
                                                                                    fieldset .table th {
                                                                                        padding: 5px 0;
                                                                                        text-align: center;

                                                                                    }

                                                                                    fieldset .form-control {
                                                                                        padding: 0;
                                                                                        text-align: center;
                                                                                        font-size: 13px;
                                                                                        height: calc(1.65rem + 2px);
                                                                                        border: none;
                                                                                    } */

        /* input:-internal-autofill-selected {
                                                                                            background-color: transparent !important;
                                                                                        } */
    </style>
    <style>
        .input-error {
            border: 2px solid red !important;
        }

        .error-message {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit {{ $category->category_name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ $category->category_name }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Category-{{ $category->category_name }}</h3>

                        <div class="card-tools">

                            <a href="{{ route('products.index', $category->id) }}" class="btn btn-primary">Back</a>

                        </div>
                    </div>
                    {{-- <div class="card-header">
                        <h3 class="card-title">{{ $category->category_name }}</h3>

                        <div class="card-tools">

                            <a href="{{ route('products.index', $category->id) }}" class="btn btn-primary">Back</a>

                        </div>
                    </div> --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <!-- form start -->
                                <p class="reset-errors text-danger"></p>
                                <p id="reset-success text-danger"></p>
                            </div>
                        </div>
                        <form id="productEditForm" method="POST" action="{{ route('products.update', $product->id) }}"
                            enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <fieldset>
                                        <legend>Detail</legend>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="hidden" name="category_id" id="cat_id"
                                                    value="{{ $category->id }}">
                                                <input type="hidden" name="product_id" id="product_id"
                                                    value="{{ $product->id }}">
                                                <input type="hidden" name="sku" id="sku"
                                                    value="{{ $product->sku }}">
                                            </div>
                                            <div class="col-md-12">

                                                <div class="form-group">
                                                    <label for="name">Product Name*</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        value="{{ old('name', $product->name) }}" required>
                                                </div>
                                                <p class="reset-name text-danger"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="article_no">Article No*</label>
                                                    <input type="text" class="form-control" id="article_no"
                                                        name="article_no" value="{{ old('name', $product->article_no) }}"
                                                        required>
                                                </div>
                                                <p class="reset-article_no text-danger"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="hs_code">HS Code*</label>
                                                    <input type="text" class="form-control" id="hs_code" name="hs_code"
                                                        value="{{ old('name', $product->hs_code) }}">
                                                </div>
                                                <p class="reset-hs_code text-danger"></p>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-12 col-md-6">
                                    <fieldset>
                                        <legend>Dimension</legend>

                                        <div class="row">
                                            {{-- <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="length">Length</label>
                                                    <input type="number" step="any" class="form-control" id="length"
                                                        name="attributes[length]" value="{{ old('length', $product->attributes->where('name', 'length')->first()->value ?? '')}}" >

                                                <p class="reset-length text-danger"></p>
                                            </div> --}}

                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="no">No</label>
                                                    <input type="number" step="any" class="form-control" id="no"
                                                        name="attributes[no]"
                                                        value="{{ old('no', $product->attributes->where('name', 'no')->first()->value ?? '') }}">
                                                </div>
                                                <p class="reset-no text-danger"></p>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="weight_per_unit">Weight Per Unit</label>
                                                    <input type="number" step="any" class="form-control"
                                                        id="weight_per_unit" name="attributes[weight_per_unit]"
                                                        value="{{ old('weight_per_unit', $product->attributes->where('name', 'weight_per_unit')->first()->value ?? '') }}">


                                                </div>
                                                <p class="reset-weight_per_unit text-danger"></p>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="unit_price">Unit Price*</label>
                                                    <input type="number" step="any" class="form-control"
                                                        id="unit_price" name="attributes[unit_price]"
                                                        value="{{ old('unit_price', $product->attributes->where('name', 'unit_price')->first()->value ?? '') }}"
                                                        required>

                                                    {{-- <select class="form-control" id="maze" name="attributes[maze]">
                                                        <option value="">Select Maze Size</option>
                                                        <option value="10x5"
                                                            {{ old('maze', $product->attributes->where('name', 'maze')->first()->value ?? '') == '10x5' ? 'selected' : '' }}>
                                                        10x5
                                                        </option>
                                                        <option value="10x10"
                                                            {{ old('maze', $product->attributes->where('name', 'maze')->first()->value ?? '') == '10x10' ? 'selected' : '' }}>
                                                            10x10
                                                        </option>

                                                    </select> --}}
                                                </div>
                                                <p class="reset-unit_price text-danger"></p>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="maze">Margin Factor*</label>
                                                    <input type="number" step="any" class="form-control"
                                                        id="unit_price" name="attributes[margin_factor]" value=""
                                                        required>

                                                </div>
                                                <p class="reset-unit_price text-danger"></p>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <fieldset>
                                <legend>Description</legend>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="short_description">Short Description*</label>
                                            <textarea class="form-control" id="short_description" name="attributes[short_description]" required>
                                                        {{ old('short_description', $product->attributes->where('name', 'short_description')->first()->value ?? '') }}
                                                    </textarea>
                                        </div>
                                        <p class="reset-short_description text-danger"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="fullt_description"> Full Description</label>

                                            <textarea id="summernote" name="attributes[full_description]" style="display: none;">                Place &lt;em&gt;some&lt;/em&gt; &lt;u&gt;text&lt;/u&gt; &lt;strong&gt;here&lt;/strong&gt;
                                                            {{ old('full_description', $product->attributes->where('name', 'full_description')->first()->value ?? '') }}
                                                        </textarea>
                                        </div>
                                    </div>
                                </div>


                            </fieldset>
                            <fieldset>
                                <legend>Images</legend>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="main_image" name="main_image"
                                                value="{{ $product->main_image ? $product->main_image : '' }}" required>

                                            <label for="main_image">Main Image</label>
                                            <input type="file" class="form-control" id="main_image"
                                                name="main_image">
                                            {{-- Display existing main image if available --}}
                                            <div id="main_image_box">
                                                @if (isset($product) && $product->main_image)
                                                    <img src="{{ asset($product->main_image) }}" alt="Main Image"
                                                        width="100">
                                                @endif
                                            </div>
                                            {{-- @if (isset($product) && $product->main_image) --}}
                                        </div>
                                        <p class="reset-main_image text-danger"></p>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="relevant_images">Relevant Images</label>
                                            <input type="hidden" class="form-control" id="relevant_images_hidden"
                                                name="relevant_images"
                                                value="{{ $product->relevant_images ? $product->relevant_images : '' }}">
                                            <input type="file" class="form-control" id="relevant_images"
                                                name="relevant_images[]" multiple>
                                            {{-- Display existing relevant images if available --}}
                                            <div id="rel_image_box">
                                                @if (isset($product) && $product->relevant_images)
                                                    @foreach (json_decode($product->relevant_images) as $image)
                                                        <img src="{{ asset($image) }}" alt="Relevant Image"
                                                            width="100">
                                                    @endforeach
                                                    {{-- @foreach ($product->relevant_images as $image)
                                                            <img src="{{ asset($image) }}" alt="Relevant Image" width="100">
                                                        @endforeach --}}
                                                @endif
                                            </div>
                                            {{-- @if (isset($product) && $product->relevant_images) --}}
                                        </div>
                                        <p class="reset-relevant_images text-danger"></p>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="save-product">Update
                                    Product</button>
                            </div>
                        </form>
                        {{-- <form method="post" action="javascript:;" id="categoryCreateForm" name="categoryForm"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="category_name">Category Name</label>
                                            <input type="text" class="form-control" id="category_name"
                                                name="category_name" placeholder="Enter category_name">
                                        </div>
                                        <p class="reset-category_name text-danger"></p>

                                        <div class="form-group">
                                            <label for="category_name">Parent</label>
                                            <p id="reset-overflow text-danger"></p>
                                            <div class="tree">
                                                <ul>
                                                    <li>
                                                        <span class="caret">
                                                            <i class="fas fa-caret-right"></i>

                                                            <input type="radio" name="parent_id" value="0"
                                                                checked>
                                                        </span>
                                                        <a href="#"><i class="fas fa-file"></i> Main category
                                                        </a>
                                                    </li>
                                                    @foreach ($categories as $category)
                                                        <li id="parent">
                                                            <!-- Check if the category has children -->
                                                            @if ($category->children->count() > 0)
                                                                <!-- Display caret and folder icon -->
                                                                <span class="caret">
                                                                    <i class="fas fa-caret-right"></i>
                                                                    <span>
                                                                        <input type="radio" name="parent_id"
                                                                            value="{{ $category->id }}">
                                                                    </span>
                                                                </span>
                                                                <a href="#">
                                                                    <i class="fas fa-folder"></i>
                                                                    {{ $category->category_name }}
                                                                </a>
                                                                <!-- Display subcategories if present -->
                                                                <ul id="subcategory">
                                                                    @foreach ($category->children as $subcategory)
                                                                        <li>
                                                                            @if ($subcategory->children->count() > 0)
                                                                                <!-- Subcategory with children (caret and folder icon) -->
                                                                                <span class="caret">
                                                                                    <i class="fas fa-caret-right"></i>
                                                                                    <input type="radio" name="parent_id"
                                                                                        value="{{ $subcategory->id }}">
                                                                                </span>
                                                                                <a href="#">
                                                                                    <i class="fas fa-folder"></i>
                                                                                    {{ $subcategory->category_name }}
                                                                                </a>
                                                                                <ul id="subsubcategory">
                                                                                    @foreach ($subcategory->children as $subSubCategory)
                                                                                        <li>
                                                                                            <!-- Subsubcategory (no caret, file icon) -->
                                                                                            <span>
                                                                                                <input type="radio"
                                                                                                    name="parent_id"
                                                                                                    value="{{ $subSubCategory->id }}">
                                                                                            </span>
                                                                                            <a href="#">
                                                                                                <i class="fas fa-file"></i>
                                                                                                {{ $subSubCategory->category_name }}
                                                                                            </a>
                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            @else
                                                                                <!-- Subcategory without children (no caret, file icon) -->
                                                                                <span>
                                                                                    <input type="radio" name="parent_id"
                                                                                        value="{{ $subcategory->id }}">
                                                                                </span>
                                                                                <a href="#">
                                                                                    <i class="fas fa-file"></i>
                                                                                    {{ $subcategory->category_name }}
                                                                                </a>
                                                                            @endif
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @else
                                                                <!-- Category without children (no caret, file icon) -->
                                                                <span>
                                                                    <input type="radio" name="parent_id"
                                                                        value="{{ $category->id }}">
                                                                </span>
                                                                <a href="#">
                                                                    <i class="fas fa-file"></i>
                                                                    {{ $category->category_name }}
                                                                </a>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="reset-parent_id text-danger"></p>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter ..." id="description" name="description"></textarea>
                                        </div>
                                        <p class="reset-description text-danger"></p>
                                        <div class="form-group">
                                            <label for="category_image">Category Image</label>
                                            <input type="file" class="form-control" id="category_image"
                                                name="category_image" placeholder="Enter category_image">
                                        </div>
                                        <p class="reset-category_image text-danger"></p>
                                        <div class="form-group">


                                        </div>
                                        <!-- /.card-body -->
                                        <p class="reset-errors text-danger"></p>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form> --}}
                    </div>
                </div>

            </div>
        </section>

    </div>


@endsection

@section('jscript')
    <!-- Select2 -->
    <script src="{{ url('admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/js/product.js') }}"></script>
    <script>
        $('.select2').select2()
    </script>
@endsection
