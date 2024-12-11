@extends('admin.Layout.layout')

@section('content')
    <style>
        .tree ul li {
            list-style: none;
        }

        .tree {
            margin-bottom: 1.8rem;
        }

        .tree li a {
            /* display: inline-flex; */
            /* align-items: center; */
            text-decoration: none;
            color: #fff;
            /* padding: 5px 0; */
        }

        .tree li {
            /* position: relative;
                                margin-left: 1%;
                                padding-left: 0px;
                                list-style: none; */
            padding-top: 10px;
        }

        /* .tree ul {
                                padding-top: 5px;
                                list-style: none;
                                position: relative;
                                padding-left: 0px
                            }

                            .tree li {
                                position: relative;
                                margin-left: 1%;
                                padding-left: 0px;
                                list-style: none;
                            }

                            .tree li#parent {
                                margin-left: 30px;
                            }

                            .tree li#parent ul#subcategory {
                                margin-left: 30px;
                            } */
        .tree li#parent ul#subcategory span.caret {
            margin-left: -20px;
        }

        .caret {
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            font-size: 24px;
            /* Adjust as needed */
            transition: transform 0.3s ease;
            padding-right: 5px;
        }

        .caret i {

            padding-right: 10px;
        }

        .caret-down i {
            transform: rotate(90deg);
            /* Rotate caret to point down */
        }

        ul ul {
            display: none;

        }

        /* Hide children initially */
        /*

                            #subcategory li {
                                padding-left: 30px;
                            }


                            input[type="radio"] {
                                margin-right: 10px;
                            }

                            .tree li a {
                                display: inline-flex;
                                align-items: center;
                                text-decoration: none;
                                color: #fff;
                                padding: 5px 0;
                            }

                            .tree li a:hover {
                                color: #000;

                                border-radius: 3px;
                            }

                            .tree li a i {
                                margin-right: 10px;
                            } */
        /* Add form-control-like border and padding */
        .tree-wrapper {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 10px;

        }

        .tree-wrapper:focus-within {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
    </style>
    <style></style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggles = document.querySelectorAll('.caret');
            toggles.forEach(function(toggle) {
                toggle.addEventListener('click', function() {
                    // Toggle the display of the nested <ul>
                    const nestedList = this.parentElement.querySelector('ul');
                    if (nestedList) {
                        nestedList.style.display = nestedList.style.display === 'block' ? 'none' :
                            'block';
                        this.classList.toggle('caret-down'); // Rotate the caret
                    }
                });
            });
            // Automatically expand the tree if a radio button is checked
            const checkedRadio = document.querySelector('input[name="parent_id"]:checked');
            if (checkedRadio) {
                let parent = checkedRadio.closest('ul');
                while (parent) {
                    const caretElement = parent.previousElementSibling;
                    if (caretElement && caretElement.classList.contains('caret')) {
                        caretElement.classList.add('caret-down');
                    }
                    parent.style.display = 'block';
                    parent = parent.parentElement.closest('ul');
                }
                // Expand children of the checked radio
                let childUl = checkedRadio.closest('li').querySelector('ul');
                if (childUl) {
                    childUl.style.display = 'block';
                    const childCaret = checkedRadio.closest('li').querySelector('.caret');
                    if (childCaret) {
                        childCaret.classList.add('caret-down');
                    }
                }
            }
        });
        // document.addEventListener('DOMContentLoaded', function() {
        //     function disableTree(element) {
        //         const radios = element.querySelectorAll('input[type="radio"]');
        //         radios.forEach(radio => {
        //             radio.disabled = true;
        //         });
        //     }

        //     function disableCheckedCategory() {
        //         const checkedRadio = document.querySelector('input[name="parent_id"]:checked');
        //         if (checkedRadio) {
        //             let currentElement = checkedRadio.closest('li');

        //             // Disable the current element and all its descendants
        //             while (currentElement) {
        //                 disableTree(currentElement);
        //                 currentElement = currentElement.querySelector('ul > li');
        //             }
        //         }
        //     }

        //     function toggleCaret() {
        //         const toggles = document.querySelectorAll('.caret');
        //         toggles.forEach(function(toggle) {
        //             toggle.addEventListener('click', function() {
        //                 // Toggle the display of the nested <ul>
        //                 const nestedList = this.parentElement.querySelector('ul');
        //                 if (nestedList) {
        //                     nestedList.style.display = nestedList.style.display === 'block' ?
        //                         'none' : 'block';
        //                     this.classList.toggle('caret-down'); // Rotate the caret
        //                 }
        //             });
        //         });
        //     }

        //     function expandCheckedCategory() {
        //         const checkedRadio = document.querySelector('input[name="parent_id"]:checked');
        //         if (checkedRadio) {
        //             let parent = checkedRadio.closest('ul');
        //             while (parent) {
        //                 const caretElement = parent.previousElementSibling;
        //                 if (caretElement && caretElement.classList.contains('caret')) {
        //                     caretElement.classList.add('caret-down');
        //                 }
        //                 parent.style.display = 'block';
        //                 parent = parent.parentElement.closest('ul');
        //             }

        //             // Expand children of the checked radio
        //             let childUl = checkedRadio.closest('li').querySelector('ul');
        //             if (childUl) {
        //                 childUl.style.display = 'block';
        //                 const childCaret = checkedRadio.closest('li').querySelector('.caret');
        //                 if (childCaret) {
        //                     childCaret.classList.add('caret-down');
        //                 }
        //             }
        //         }
        //     }

        //     // Initialize functions
        //     disableCheckedCategory();
        //     toggleCaret();
        //     expandCheckedCategory();
        // });
        // document.addEventListener('DOMContentLoaded', function() {
        //     function disableChildrenOfCheckedRadio() {
        //         const checkedRadio = document.querySelector('input[name="parent_id"]:checked');
        //         if (checkedRadio) {
        //             // Start from the checked radio button
        //             const checkedLi = checkedRadio.closest('li');

        //             // Disable all descendants of the checked radio button
        //             const descendants = checkedLi.querySelectorAll('li input[type="radio"]');
        //             descendants.forEach(radio => {
        //                 radio.disabled = true;
        //             });
        //         }
        //     }

        //     function toggleCaret() {
        //         const toggles = document.querySelectorAll('.caret');
        //         toggles.forEach(function(toggle) {
        //             toggle.addEventListener('click', function() {
        //                 // Toggle the display of the nested <ul>
        //                 const nestedList = this.parentElement.querySelector('ul');
        //                 if (nestedList) {
        //                     nestedList.style.display = nestedList.style.display === 'block' ?
        //                         'none' : 'block';
        //                     this.classList.toggle('caret-down'); // Rotate the caret
        //                 }
        //             });
        //         });
        //     }

        //     function expandCheckedCategory() {
        //         const checkedRadio = document.querySelector('input[name="parent_id"]:checked');
        //         if (checkedRadio) {
        //             let parent = checkedRadio.closest('ul');
        //             while (parent) {
        //                 const caretElement = parent.previousElementSibling;
        //                 if (caretElement && caretElement.classList.contains('caret')) {
        //                     caretElement.classList.add('caret-down');
        //                 }
        //                 parent.style.display = 'block';
        //                 parent = parent.parentElement.closest('ul');
        //             }

        //             // Expand children of the checked radio
        //             let childUl = checkedRadio.closest('li').querySelector('ul');
        //             if (childUl) {
        //                 childUl.style.display = 'block';
        //                 const childCaret = checkedRadio.closest('li').querySelector('.caret');
        //                 if (childCaret) {
        //                     childCaret.classList.add('caret-down');
        //                 }
        //             }
        //         }
        //     }

        //     // Initialize functions
        //     disableChildrenOfCheckedRadio();
        //     toggleCaret();
        //     expandCheckedCategory();
        // });
    </script>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
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
                        <h3 class="card-title">{{ $title }}</h3>

                        <div class="card-tools">

                            <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>

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
                                <form method="post" action="javascript:;" id="categoryEditForm" name="categoryForm"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value={{ old('category_id', $category->id) }}>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="category_name">Category Name</label>
                                            <input type="text" class="form-control" id="category_name"
                                                name="category_name" placeholder="Enter category_name"
                                                value="{{ old('category_name', $category->category_name) }}">
                                        </div>
                                        <p class="reset-category_name"></p>


                                        {{-- <div class="form-group">
                                            <label for="category_name">Parent</label>
                                            <p id="reset-overflow"></p>
                                            <div class="tree">
                                                <ul>
                                                    <li>
                                                        <span class="caret">
                                                            <i class="fas fa-caret-right"></i>

                                                            <input type="radio" name="parent_id" value="0" checked>
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
                                        </div> --}}
                                        @php
                                            // Define a helper function to gather all child names
                                            function getAllChildrenNames($category)
                                            {
                                                $names = [$category->category_name]; // Include the current category's name
                                                // $names = [];

                                                foreach ($category->children as $child) {
                                                    $names[] = $child->category_name;
                                                    // Recursively gather names from children's children
                                                    $names = array_merge($names, getAllChildrenNames($child));
                                                }

                                                return $names;
                                            }

                                            // Get all child names of the current category
                                            $allChildrenNames = getAllChildrenNames($category);

                                        @endphp
                                      <ul>

                                    </ul>
                                        <div class="form-group">
                                            <label for="parent ">Parent</label>
                                            <div class="tree-wrapper"> <!-- Added wrapper with form-control-like styling -->
                                                <div class="tree">
                                                    <ul>
                                                        <li>
                                                            <span class="caret">
                                                                <i class="fas fa-caret-right"></i>
                                                                <input type="radio" name="parent_id" value="0"
                                                                    {{ $category->parent_id == 0 ? 'checked' : '' }}>
                                                            </span>
                                                            <a href="#"><i class="fas fa-file"></i> Main category</a>
                                                        </li>
                                                        @foreach ($categories as $categoryItem)
                                                        @php
                                                        $isDisabled = in_array($categoryItem->category_name, $allChildrenNames);
                                                    @endphp
                                                            <li id="parent">
                                                                @if ($categoryItem->children->count() > 0)
                                                                    <span class="caret">
                                                                        <i class="fas fa-caret-right"></i>
                                                                        <input type="radio" name="parent_id"
                                                                            value="{{ $categoryItem->id }}"
                                                                            {{ $category->parent_id == $categoryItem->id ? 'checked' : '' }}
                                                                            {{ $isDisabled ? 'disabled' : '' }}>


                                                                    </span>
                                                                    <a href="#"><i class="fas fa-folder"></i>
                                                                        {{ $categoryItem->category_name }}</a>
                                                                    <ul id="subcategory">
                                                                        @foreach ($categoryItem->children as $subcategory)
                                                                        @php
                                                                        $isSubDisabled = in_array($subcategory->category_name, $allChildrenNames);
                                                                    @endphp
                                                                            <li>
                                                                                @if ($subcategory->children->count() > 0)
                                                                                    <span class="caret">
                                                                                        <i class="fas fa-caret-right"></i>
                                                                                        <input type="radio"
                                                                                            name="parent_id"
                                                                                            value="{{ $subcategory->id }}"
                                                                                            {{ $category->parent_id == $subcategory->id ? 'checked' : '' }}
                                                                                            {{ $isSubDisabled ? 'disabled' : '' }}>
                                                                                    </span>
                                                                                    <a href="#"><i
                                                                                            class="fas fa-folder"></i>
                                                                                        {{ $subcategory->category_name }}</a>
                                                                                    <ul id="subsubcategory">
                                                                                        @foreach ($subcategory->children as $subSubCategory)
                                                                                        @php
                                                                                        $isSubSubDisabled = in_array($subSubCategory->category_name, $allChildrenNames);
                                                                                    @endphp
                                                                                            <li>
                                                                                                <span>
                                                                                                    <input type="radio"
                                                                                                        name="parent_id"
                                                                                                        value="{{ $subSubCategory->id }}"
                                                                                                        {{ $category->parent_id == $subSubCategory->id ? 'checked' : '' }}
                                                                                                        {{ $isSubSubDisabled ? 'disabled' : '' }}>
                                                                                                    </span>
                                                                                                <a href="#"><i
                                                                                                        class="fas fa-file"></i>
                                                                                                    {{ $subSubCategory->category_name }}</a>
                                                                                            </li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                @else
                                                                                    <span>
                                                                                        <input type="radio"
                                                                                            name="parent_id"
                                                                                            value="{{ $subcategory->id }}"
                                                                                            {{ $category->parent_id == $subcategory->id ? 'checked' : '' }}
                                                                                            {{ $isSubDisabled ? 'disabled' : '' }}>
                                                                                    </span>
                                                                                    <a href="#"><i
                                                                                            class="fas fa-file"></i>
                                                                                        {{ $subcategory->category_name }}</a>
                                                                                @endif
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @else
                                                                @php
                                                                $isDisabled = in_array($categoryItem->category_name, $allChildrenNames);
                                                            @endphp
                                                                    <span>
                                                                        <input type="radio" name="parent_id"
                                                                            value="{{ $categoryItem->id }}"
                                                                            {{ $category->parent_id == $categoryItem->id ? 'checked' : '' }}
                                                                            {{ $isDisabled ? 'disabled' : '' }}>
                                                                    </span>
                                                                    <a href="#"><i class="fas fa-file"></i>
                                                                        {{ $categoryItem->category_name }}</a>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <input type="hidden" id="parent_id_hidden" name="parent_id"
                                        value="{{ old('parent_id', $category->parent_id ?? 0) }}"> --}}

                                        <p class="reset-parent_id"></p>

                                        {{-- <div class="form-group">
                                            <label for="category_discount">Category Discount</label>
                                            <input type="text" class="form-control" id="category_discount"
                                                name="category_discount" placeholder="Enter categorydiscount"
                                                value="{{ old('category_discount', $category->category_discount) }}">
                                        </div>
                                        <p class="reset-category_discount"></p> --}}
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter ..." id="description" name="description">{{ old('description', $category->description) }}</textarea>
                                        </div>
                                        <p class="reset-description"></p>
                                        {{-- <div class="form-group">
                                            <label for="category_image">Category Image</label>
                                            <input type="file" class="form-control" id="category_image"
                                                name="category_image" placeholder="Enter category_image" value="{{ $category->category_image }}">
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="category_image">Category Image</label>
                                            @if ($category->category_image)
                                                <!-- Display existing image if available -->
                                                <div>
                                                    {{-- <img src="{{ asset('admin/images/category/' . $category->category_image) }}" --}}
                                                    <img src="{{ asset($category->category_image) }}"
                                                        id="current_image" name="current_image" alt="Category Image"
                                                        style="max-width: 150px; height: auto;">
                                                </div>
                                                <br>
                                            @endif
                                            <input type="hidden" name="current_image"
                                                value="{{ $category->category_image }}">
                                            <input type="file" class="form-control" id="category_image"
                                                name="category_image">
                                            <p class="reset-category_image"></p>
                                        </div>
                                        <p class="reset-category_image"></p>
                                        {{-- <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter Meta Title">
                  </div>
                   <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="Enter URL">
                  </div>
                  <div class="form-group">
                    <label for="meta_keywords">Meta Keywords</label>
                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter Meta Keywords">
                  </div>
                  <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." id="meta_description" name="meta_description"></textarea>
                  </div> --}}


                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
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
    <!-- /.content-wrapper -->
    @include('admin.Layout.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
@endsection

@section('jscript')
    <!-- Select2 -->
    {{-- <script src="{{ url('admin/plugins/select2/js/select2.full.min.js') }}"></script> --}}
    <script src="{{ asset('admin/js/category.js') }}"></script>
    {{-- <script>
        $('.select2').select2()
    </script> --}}
@endsection
