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
            border: 2px solid red!important;
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
                        <h1>Create {{ $category->category_name }}</h1>
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
            <div class="container-fluid" id="product-part">
                <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Category-{{ $category->category_name }}</h3>

                            <div class="card-tools">

                                <a href="{{ route('products.index', $category->id) }}" class="btn btn-primary">Back</a>

                            </div>
                        </div>


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
                                    <p class="reset-errors"></p>
                                    <p id="reset-success"></p>
                                </div>
                            </div>
                            <form id="productCreateForm" method="POST" action="javascript:;" enctype="multipart/form-data" novalidate>
                                @csrf

                                {{-- <div class="modal-body"> --}}
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <fieldset>
                                            <legend>Detail</legend>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="category_id" id="cat_id"
                                                        value="{{ $category->id }}">
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name">Product Name*</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" value="" required>
                                                    </div>
                                                    <p class="reset-name text-danger"></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="articleno">Article No*</label>
                                                        <input type="text" class="form-control" id="article_no"
                                                            name="article_no" value="" required>
                                                    </div>
                                                    <p class="reset-article_no text-danger"></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="hs_code">HS Code </label>
                                                        <input type="text" class="form-control" id="hs_code"
                                                            name="hs_code" value="">
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
                                                {{-- <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="length">Length(m)</label>
                                                        <input type="number" step="any" class="form-control"
                                                            id="length" name="attributes[length]" value="">
                                                            </div>
                                                    <p class="reset-length"></p>
                                                </div> --}}

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="no">No</label>
                                                        <input type="number" step="any" class="form-control"
                                                            id="no" name="attributes[no]" value="" required>
                                                        {{-- <select class="form-control" id="width" name="attributes[width]">
                                                                                                        <option value="">Select Width</option>
                                                                                                        <option value="20">
                                                                                                            20</option>
                                                                                                        <option value="30">
                                                                                                            30</option>
                                                                                                        <option value="50">
                                                                                                            50</option>
                                                                                                            <option value="70">
                                                                                                                70</option>
                                                                                                            <option value="100">
                                                                                                                100</option>
                                                                                                    </select> --}}
                                                    </div>
                                                    <p class="reset-no"></p>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="weight_per_unit">Weight Per
                                                            Unit</label>
                                                        <input type="number" step="any" class="form-control"
                                                            id="weight_per_unit" name="attributes[weight_per_unit]"
                                                            value="">
                                                        {{-- <select class="form-control" id="height" name="attributes[height]">
                                                                                                        <option value="">Select Height</option>

                                                                                                        <option value="30">
                                                                                                            30</option>
                                                                                                        <option value="50">
                                                                                                            50</option>
                                                                                                            <option value="70">
                                                                                                                70</option>
                                                                                                            <option value="100">
                                                                                                                100</option>
                                                                                                    </select> --}}
                                                    </div>
                                                    <p class="reset-weight_per_unit"></p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="maze">Unit Price*</label>
                                                        <input type="number" step="any" class="form-control"
                                                            id="unit_price" name="attributes[unit_price]" value=""
                                                            required>

                                                    </div>
                                                    <p class="reset-unit_price"></p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="maze">Margin Factor*</label>
                                                        <input type="number" step="any" class="form-control"
                                                            id="unit_price" name="attributes[margin_factor]"
                                                            value="" required>

                                                    </div>
                                                    <p class="reset-unit_price"></p>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                {{-- </fieldset> --}}
                                <fieldset>
                                    <legend>Description</legend>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="short_description">Short
                                                    Description*</label>
                                                <textarea class="form-control" id="short_description" name="attributes[short_description]" required>
                                                                                                </textarea>
                                                <p class="reset-attributes_short_description">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label for="fullt_description"> Full Description</label>
                                                <textarea id="summernote" style="display: none;" name="attributes[full_description]">                Place &lt;em&gt;some&lt;/em&gt; &lt;u&gt;text&lt;/u&gt; &lt;strong&gt;here&lt;/strong&gt;
                                                                                              </textarea>
                                            </div>

                                        </div>
                                        {{-- <div class="card-footer"> --}}
                                        <p class="reset-attributes_full_description">
                                        </p>
                                        {{-- </div> --}}
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Images</legend>

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="main_image">Main Image*</label>
                                                <input type="file" class="form-control" id="main_image"
                                                    name="main_image" required>
                                                {{-- @if (isset($product) && $product->main_image) --}}
                                                <div id="main_image_box" class="mt-2">
                                                    {{-- <img src="" alt="Main Image" width="100"> --}}
                                                </div>
                                                {{-- @endif --}}
                                            </div>
                                            <p class="reset-main_image"></p>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="relevant_images">Relevant
                                                    Images</label>
                                                <input type="file" class="form-control" id="relevant_images"
                                                    name="relevant_images[]" multiple>
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
                                </fieldset>


                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="create-product">Save
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
                                                                                    <p class="reset-category_name"></p>

                                                                                    <div class="form-group">
                                                                                        <label for="category_name">Parent</label>
                                                                                        <p id="reset-overflow"></p>
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
                                                                                    <p class="reset-parent_id"></p>

                                                                                    <div class="form-group">
                                                                                        <label for="description">Description</label>
                                                                                        <textarea class="form-control" rows="3" placeholder="Enter ..." id="description" name="description"></textarea>
                                                                                    </div>
                                                                                    <p class="reset-description"></p>
                                                                                    <div class="form-group">
                                                                                        <label for="category_image">Category Image</label>
                                                                                        <input type="file" class="form-control" id="category_image"
                                                                                            name="category_image" placeholder="Enter category_image">
                                                                                    </div>
                                                                                    <p class="reset-category_image"></p>
                                                                                    <div class="form-group">


                                                                                    </div>
                                                                                    <!-- /.card-body -->
                                                                                    <p class="reset-errors"></p>
                                                                                    <div class="card-footer">
                                                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form> --}}
                        </div>
                        <!-- /.col -->

                    <!-- /.row -->
                </div>
                <!-- /.card-body -->

            </div>






        </section>
        <!-- /.content -->
    </div>


    {{-- <div class="row">
                                                                                        <div class="col-md-6">

                                                                                            <div class="form-group">
                                                                                                <label for="model_3d">3D Model</label>
                                                                                                <input type="file" class="form-control" id="model_3d"
                                                                                                    name="model_3d">

                                                                                                <div id="model_3d_box">
                                                                                                    <img src="" alt="Main Image" width="100">
                                                                                                </div>

                                                                                            </div>
                                                                                            <p class="reset-model_3d"></p>
                                                                                        </div>

                                                                                    </div> --}}
    {{-- <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="card card-default">
                                                                                                <div class="card-header">
                                                                                                    <h3 class="card-title">Dropzone.js <small><em>jQuery File
                                                                                                                Upload</em> like look</small></h3>
                                                                                                </div>
                                                                                                <div class="card-body">
                                                                                                    <div id="actions" class="row">
                                                                                                        <div class="col-lg-6">
                                                                                                            <div class="btn-group w-100">
                                                                                                                <span class="btn btn-success col fileinput-button">
                                                                                                                    <i class="fas fa-plus"></i>
                                                                                                                    <span>Add files</span>
                                                                                                                </span>
                                                                                                                <button type="submit"
                                                                                                                    class="btn btn-primary col start">
                                                                                                                    <i class="fas fa-upload"></i>
                                                                                                                    <span>Start upload</span>
                                                                                                                </button>
                                                                                                                <button type="reset"
                                                                                                                    class="btn btn-warning col cancel">
                                                                                                                    <i class="fas fa-times-circle"></i>
                                                                                                                    <span>Cancel upload</span>
                                                                                                                </button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-lg-6 d-flex align-items-center">
                                                                                                            <div class="fileupload-process w-100">
                                                                                                                <div id="total-progress"
                                                                                                                    class="progress progress-striped active"
                                                                                                                    role="progressbar" aria-valuemin="0"
                                                                                                                    aria-valuemax="100" aria-valuenow="0">
                                                                                                                    <div class="progress-bar progress-bar-success"
                                                                                                                        style="width:0%;" data-dz-uploadprogress></div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="table table-striped files" id="previews">
                                                                                                        <div id="template" class="row mt-2">
                                                                                                            <div class="col-auto">
                                                                                                                <span class="preview"><img src="data:,"
                                                                                                                        alt="" data-dz-thumbnail /></span>
                                                                                                            </div>
                                                                                                            <div class="col d-flex align-items-center">
                                                                                                                <p class="mb-0">
                                                                                                                    <span class="lead" data-dz-name></span>
                                                                                                                    (<span data-dz-size></span>)
                                                                                                                </p>
                                                                                                                <strong class="error text-danger"
                                                                                                                    data-dz-errormessage></strong>
                                                                                                            </div>
                                                                                                            <div class="col-4 d-flex align-items-center">
                                                                                                                <div class="progress progress-striped active w-100"
                                                                                                                    role="progressbar" aria-valuemin="0"
                                                                                                                    aria-valuemax="100" aria-valuenow="0">
                                                                                                                    <div class="progress-bar progress-bar-success"
                                                                                                                        style="width:0%;" data-dz-uploadprogress></div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-auto d-flex align-items-center">
                                                                                                                <div class="btn-group">
                                                                                                                    <button class="btn btn-primary start">
                                                                                                                        <i class="fas fa-upload"></i>
                                                                                                                        <span>Start</span>
                                                                                                                    </button>
                                                                                                                    <button data-dz-remove
                                                                                                                        class="btn btn-warning cancel">
                                                                                                                        <i class="fas fa-times-circle"></i>
                                                                                                                        <span>Cancel</span>
                                                                                                                    </button>
                                                                                                                    <button data-dz-remove
                                                                                                                        class="btn btn-danger delete">
                                                                                                                        <i class="fas fa-trash"></i>
                                                                                                                        <span>Delete</span>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- /.card-body -->
                                                                                                <div class="card-footer">
                                                                                                    Visit <a href="https://www.dropzonejs.com">dropzone.js
                                                                                                        documentation</a> for more examples and information about the
                                                                                                    plugin.
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- /.card -->
                                                                                        </div>
                                                                                    </div> --}}
    <!-- /.row -->

@endsection

@section('jscript')
    <!-- Select2 -->
    {{-- <script src="{{ url('admin/plugins/select2/js/select2.full.min.js') }}"></script> --}}
    <script src="{{ asset('admin/js/product.js') }}"></script>
    {{-- <script>
        $('.select2').select2()
    </script> --}}
@endsection
