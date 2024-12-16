@extends('admin.Layout.layout')
@section('style')
    <style>
        .note-editable {
            height: 209.614px;
            background-color: white;
            color: black;
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
            <div class="container-fluid">

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{ $category->category_name }}</h3>

                        <div class="card-tools">

                            <a href="{{ route('products.index', $category->id) }}" class="btn btn-primary">Back</a>

                        </div>
                    </div>
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
                                <p class="reset-errors"></p>
                                <p id="reset-success"></p>
                                <form id="productCreateForm" method="POST" action="javascript:;"
                                    enctype="multipart/form-data">
                                    @csrf

                                    {{-- <div class="modal-header">
                                        <h5 class="modal-title" id="createProductModalLabel">
                                            Create Product </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div> --}}
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="hidden" name="category_id" id="cat_id"
                                                    value="{{ $category->id }}">
                                                <div class="form-group">
                                                    <label for="category_id">Category</label>
                                                    <input type="text" class="form-control" id="cat_name"
                                                        name="cat_name" value="{{ $category->category_name }}" readonly>
                                                    {{-- <select class="form-control" id="category_id" name="category_id">
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->category_name }}
                                                            </option>
                                                        @endforeach
                                                    </select> --}}
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Product Name</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        value="" required>
                                                </div>
                                                <p class="reset-name"></p>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="maze">Maze Size</label>
                                                    <select class="form-control" id="maze" name="attributes[maze]">
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
                                                    {{-- <input type="number" step="any" class="form-control" id="length"
                                                        name="attributes[length]" value="" required> --}}
                                                        <select class="form-control" id="length" name="attributes[length]">
                                                            <option value="">Select Length</option>
                                                            <option value="30">
                                                                30</option>
                                                            <option value="50">
                                                                50</option>
                                                            <option value="100">
                                                                100</option>
                                                        </select>
                                                </div>
                                                <p class="reset-length"></p>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="depth">Width</label>
                                                    {{-- <input type="number" step="any" class="form-control" id="depth"
                                                        name="attributes[depth]" value="" required> --}}
                                                        <select class="form-control" id="length" name="attributes[width]">
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
                                                        </select>
                                                </div>
                                                <p class="reset-depth"></p>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="height">Height</label>
                                                    {{-- <input type="number" step="any" class="form-control" id="height"
                                                        name="attributes[height]" value="" required> --}}
                                                        <select class="form-control" id="length" name="attributes[height]">
                                                            <option value="">Select Height</option>

                                                            <option value="30">
                                                                30</option>
                                                            <option value="50">
                                                                50</option>
                                                                <option value="70">
                                                                    70</option>
                                                                <option value="100">
                                                                    100</option>
                                                        </select>
                                                </div>
                                                <p class="reset-height"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="short_description">Short Description</label>
                                                    <textarea class="form-control" id="short_description" name="attributes[short_description]" required>
                                                    </textarea>
                                                    <p class="reset-attributes_short_description">Short Error</p>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card card-outline card-info">
                                                    <div class="card-header">
                                                        <h3 class="card-title">
                                                            Full Description
                                                        </h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <textarea id="summernote" style="display: none;" name="attributes[full_description]">                Place &lt;em&gt;some&lt;/em&gt; &lt;u&gt;text&lt;/u&gt; &lt;strong&gt;here&lt;/strong&gt;
                                                  </textarea>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <p class="reset-attributes_full_description"></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label for="main_image">Main Image</label>
                                                    <input type="file" class="form-control" id="main_image"
                                                        name="main_image">
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
                                                    <label for="relevant_images">Relevant Images</label>
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

                                    </div>

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
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->


            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    </div>

@endsection

@section('jscript')
    <!-- Select2 -->
    {{-- <script src="{{ url('admin/plugins/select2/js/select2.full.min.js') }}"></script> --}}
    <script src="{{ asset('admin/js/product.js') }}"></script>
    {{-- <script>
        $('.select2').select2()
    </script> --}}
@endsection
