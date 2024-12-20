@extends('admin.Layout.layout')
@section('style')
<style>
    .note-editable{
        height: 209.614px;
    background-color: white;
    color: black;
    }
    .modal-body{
        padding: 0!important;
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
                        <h1>{{ $category->category_name }}</h1>
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
                        <h3 class="card-title">Edit Product-{{ $category->category_name }}</h3>

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
                                <form id="productEditForm" method="POST" action="{{ route('products.update',$product->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    {{-- <div class="modal-header">
                                        <h5 class="modal-title" id="createProductModalLabel">
                                            Edit Product </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div> --}}
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="hidden" name="category_id" id="cat_id"
                                                    value="{{ $category->id }}">
                                                <input type="hidden" name="product_id" id="product_id"
                                                    value="{{ $product->id }}">
                                                    <input type="hidden" name="sku" id="sku"
                                                    value="{{ $product->sku }}">
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


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="name">Product Name*</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        value="{{ old('name', $product->name) }}" required>
                                                </div>
                                                <p class="reset-name"></p>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="article_no">Article No*</label>
                                                    <input type="text" class="form-control" id="article_no" name="article_no"
                                                        value="{{ old('name', $product->article_no) }}" required>
                                                </div>
                                                <p class="reset-article_no"></p>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="hs_code">HS Code*</label>
                                                    <input type="text" class="form-control" id="hs_code" name="hs_code"
                                                        value="{{ old('name', $product->hs_code) }}">
                                                </div>
                                                <p class="reset-hs_code"></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="length">Length*</label>
                                                    {{-- <input type="number" step="any" class="form-control" id="length"
                                                        name="attributes[length]" value="" required> --}}
                                                        <select class="form-control" id="length" name="attributes[length]">
                                                            {{-- <option value="">Select Length</option> --}}
                                                            <option value="30"  {{ old('length', $product->attributes->where('name', 'length')->first()->value ?? '') == '30' ? 'selected' : '' }}>

                                                                30</option>
                                                            <option value="50"  {{ old('length', $product->attributes->where('name', 'length')->first()->value ?? '') == '50' ? 'selected' : '' }}>

                                                                50</option>
                                                            <option value="100"  {{ old('length', $product->attributes->where('name', 'length')->first()->value ?? '') == '100' ? 'selected' : '' }}>

                                                                100</option>
                                                        </select>
                                                </div>
                                                <p class="reset-length"></p>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="depth">Width</label>
                                                    {{-- <input type="number" step="any" class="form-control" id="depth"
                                                        name="attributes[depth]" value="" required> --}}
                                                        <select class="form-control" id="width" name="attributes[width]">
                                                            <option value="">Select Width</option>
                                                            <option value="20" {{ old('width', $product->attributes->where('name', 'width')->first()->value ?? '') == '20' ? 'selected' : '' }}>
                                                                20</option>
                                                            <option value="30" {{ old('width', $product->attributes->where('name', 'width')->first()->value ?? '') == '30' ? 'selected' : '' }}>
                                                                30</option>
                                                            <option value="50" {{ old('width', $product->attributes->where('name', 'width')->first()->value ?? '') == '50' ? 'selected' : '' }}>
                                                                50</option>
                                                                <option value="70" {{ old('width', $product->attributes->where('name', 'width')->first()->value ?? '') == '70' ? 'selected' : '' }}>
                                                                    70</option>
                                                                <option value="100" {{ old('width', $product->attributes->where('name', 'width')->first()->value ?? '') == '100' ? 'selected' : '' }}>
                                                                    100</option>
                                                        </select>
                                                </div>
                                                <p class="reset-width"></p>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="height">Height</label>
                                                    {{-- <input type="number" step="any" class="form-control" id="height"
                                                        name="attributes[height]" value="" required> --}}
                                                        <select class="form-control" id="height" name="attributes[height]">
                                                            <option value="">Select Height</option>

                                                            <option value="30" {{ old('height', $product->attributes->where('name', 'height')->first()->value ?? '') == '30' ? 'selected' : '' }}>
                                                                30</option>
                                                            <option value="50" {{ old('height', $product->attributes->where('name', 'height')->first()->value ?? '') == '50' ? 'selected' : '' }}>
                                                                50</option>
                                                                <option value="70" {{ old('height', $product->attributes->where('name', 'height')->first()->value ?? '') == '70' ? 'selected' : '' }}>
                                                                    70</option>
                                                                <option value="100" {{ old('height', $product->attributes->where('name', 'height')->first()->value ?? '') == '100' ? 'selected' : '' }}>
                                                                    100</option>
                                                        </select>
                                                </div>
                                                <p class="reset-height"></p>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="maze">Maze Size</label>
                                                    <select class="form-control" id="maze" name="attributes[maze]">
                                                        <option value="">Select Maze Size</option>
                                                        <option value="10x5"
                                                            {{ old('maze', $product->attributes->where('name', 'maze')->first()->value ?? '') == '10x5' ? 'selected' : '' }}>
                                                        10x5
                                                        </option>
                                                        <option value="10x10"
                                                            {{ old('maze', $product->attributes->where('name', 'maze')->first()->value ?? '') == '10x10' ? 'selected' : '' }}>
                                                            10x10
                                                        </option>
                                                        {{-- <option value="5x15"
                                                            {{ old('maze', $product->attributes->where('name', 'maze')->first()->value ?? '') == '5x15' ? 'selected' : '' }}>
                                                            5x15
                                                        </option> --}}
                                                    </select>
                                                </div>
                                                <p class="reset-maze"></p>
                                            </div>
                                        </div>
                                            {{-- <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="length">Length</label>
                                                        <input type="number" step="any" class="form-control"
                                                            id="length" name="attributes[length]"
                                                            value="{{ old('length', $product->attributes->where('name', 'length')->first()->value ?? '') }}"
                                                            required>
                                                    </div>
                                                    <p class="reset-length"></p>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="depth">Depth</label>
                                                        <input type="number" step="any" class="form-control"
                                                            id="depth" name="attributes[depth]"
                                                            value="{{ old('attributes.depth', $product->attributes->where('name', 'depth')->first()->value ?? '') }}"
                                                            required>
                                                    </div>
                                                    <p class="reset-depth"></p>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="height">Height</label>
                                                        <input type="number" step="any" class="form-control"
                                                            id="height" name="attributes[height]"
                                                            value="{{ old('attributes.height', $product->attributes->where('name', 'height')->first()->value ?? '') }}"
                                                            required>
                                                    </div>
                                                    <p class="reset-height"></p>
                                                </div>
                                            </div> --}}
                                        {{-- <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="main_image">Description</label>
                                                    <textarea class="form-control" id="description" name="description">
                                                    </textarea>
                                                </div>
                                                <p class="reset-description"></p>
                                            </div>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="short_description">Short Description</label>
                                                    <textarea class="form-control" id="short_description" name="attributes[short_description]">
                                                        {{ old('short_description', $product->attributes->where('name', 'short_description')->first()->value ?? '')}}
                                                    </textarea>
                                                </div>
                                                <p class="reset-short_description"></p>
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
                                                        <textarea id="summernote" name="attributes[full_description]" style="display: none;">                Place &lt;em&gt;some&lt;/em&gt; &lt;u&gt;text&lt;/u&gt; &lt;strong&gt;here&lt;/strong&gt;
                                                            {{ old('full_description', $product->attributes->where('name', 'full_description')->first()->value ?? '')}}
                                                        </textarea>


                                                    </div>

                                                </div>
                                            </div>
                                            <div class="card-footer">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" id="main_image" name="main_image" value="{{$product->main_image?$product->main_image:""  }}">

                                                    <label for="main_image">Main Image</label>
                                                    <input type="file" class="form-control" id="main_image" name="main_image">
                                                    {{-- Display existing main image if available --}}
                                                    <div id="main_image_box">
                                                        @if(isset($product) && $product->main_image)
                                                            <img src="{{ asset($product->main_image) }}" alt="Main Image" width="100">
                                                        @endif
                                                    </div>
                                                    {{-- @if (isset($product) && $product->main_image) --}}
                                                </div>
                                                <p class="reset-main_image"></p>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="relevant_images">Relevant Images</label>
                                                    <input type="hidden" class="form-control" id="relevant_images_hidden" name="relevant_images" value="{{ $product->relevant_images?$product->relevant_images:"" }}">
                                                    <input type="file" class="form-control" id="relevant_images" name="relevant_images[]" multiple>
                                                    {{-- Display existing relevant images if available --}}
                                                    <div id="rel_image_box">
                                                        @if(isset($product) && $product->relevant_images)
                                                            @foreach(json_decode($product->relevant_images) as $image)
                                                                <img src="{{ asset($image) }}" alt="Relevant Image" width="100">
                                                            @endforeach
                                                            {{-- @foreach($product->relevant_images as $image)
                                                            <img src="{{ asset($image) }}" alt="Relevant Image" width="100">
                                                        @endforeach --}}
                                                        @endif
                                                    </div>
                                                    {{-- @if (isset($product) && $product->relevant_images) --}}
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
    <script src="{{ url('admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/js/product.js') }}"></script>
    <script>
        $('.select2').select2()
    </script>
@endsection
