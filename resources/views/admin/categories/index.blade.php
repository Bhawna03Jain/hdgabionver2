@extends('admin.Layout.layout')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Categories</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Categories</li>
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
                            <div class="card-header d-flex">
                                {{-- <a href="{{ route('categories.create') }}" class="btn btn-primary" style="margin-left: auto;" disabled>Create Category</a> --}}
                                {{-- <a href="javascript:;" class="btn btn-primary" style="margin-left: auto;" id="create-category-btn">Create Category</a> --}}
                                <a href="{{ route('categories.create') }}" class="btn btn-primary disabled-link"
                                    style="margin-left: auto;" onclick="return false;">Create Category</a>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="categories" class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Name</th>
                                            <th>Parent Name</th>
                                            {{-- <th>Discount</th> --}}
                                            <th>Description</th>
                                            <th>Image</th>
                                            {{-- <th>Status</th> --}}
                                            {{-- <th>Created At</th>
                                        <th>Updated At</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->category_name }}</td>
                                                <td>{{ optional($category->parent)->category_name ?? 'No Parent' }}</td>
                                                {{-- <td>{{ $category->category_discount }}</td> --}}
                                                <td>{{ $category->description }}</td>
                                                <td>
                                                    @if ($category->category_image)
                                                        <img src="{{ asset($category->category_image) }}"
                                                            alt="Category Image" style="max-width: 60px; height: auto;">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                                {{-- <td>
                                                @if ($category->status == 1)
                                                    <a href="javascript:void(0)" class="updateCategoryStatus" id="page-{{ $category->id }}" page-id={{ $category->id }}>
                                                        <i class="fas fa-toggle-on" status="Active"></i>
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0)" class="updateCategoryStatus" id="page-{{ $category->id }}" page-id={{ $category->id }} style="color: grey;">
                                                        <i class="fas fa-toggle-off" status="Inactive"></i>
                                                    </a>
                                                @endif
                                            </td> --}}
                                                {{-- <td>{{ $category->created_at->format('F j, Y') }}</td>
                                            <td>{{ $category->updated_at->format('F j, Y') }}</td> --}}
                                                <td>
                                                    <a href="{{ route('categories.edit', $category->id) }}"
                                                        class="text-warning disabled-link"><i class="fas fa-edit"></i></a>
                                                    {{-- <a href="javascript:void(0)" class="confirmDelete text-danger" record="categories" recordid="{{ $category->id }}">
                                                    <i class="fas fa-trash ml-2"></i>
                                                </a> --}}
                                                    {{-- <a href="{{ route('products.index') }}."/"., $category->id class="text-primary ml-2"><i class="fas fa-plus"></i></a> --}}
                                                    <a href="{{ route('products.index', $category->id) }}"
                                                        class="text-primary ml-2">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @foreach ($category->children as $child)
                                                <tr>
                                                    <td>{{ $child->id }}</td>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $child->category_name }}</td>
                                                    <td>{{ optional($child->parent)->category_name ?? 'No Parent' }}</td>
                                                    {{-- <td>{{ $child->category_discount }}</td> --}}
                                                    <td>{{ $child->description }}</td>
                                                    <td>
                                                        @if ($child->category_image)
                                                            {{-- <img src="{{ asset('admin/images/category/' . $child->category_image) }}" alt="Category Image" style="max-width: 60px; height: auto;"> --}}
                                                            <img src="{{ asset($child->category_image) }}"
                                                                alt="Category Image" style="max-width: 60px; height: auto;">
                                                        @else
                                                            No Image
                                                        @endif
                                                    </td>
                                                    {{-- <td>
                                                    @if ($child->status == 1)
                                                        <a href="javascript:void(0)" class="updateCategoryStatus" id="page-{{ $child->id }}" page-id={{ $child->id }}>
                                                            <i class="fas fa-toggle-on" status="Active"></i>
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0)" class="updateCategoryStatus" id="page-{{ $child->id }}" page-id={{ $child->id }} style="color: grey;">
                                                            <i class="fas fa-toggle-off" status="Inactive"></i>
                                                        </a>
                                                    @endif
                                                </td> --}}
                                                    {{-- <td>{{ $child->created_at->format('F j, Y') }}</td>
                                                <td>{{ $child->updated_at->format('F j, Y') }}</td> --}}
                                                    <td>
                                                        <a href="{{ route('categories.edit', $child->id) }}"
                                                            class="text-warning"><i class="fas fa-edit"></i></a>
                                                        {{-- <a href="javascript:void(0)" class="confirmDelete text-danger" record="categories" recordid="{{ $child->id }}">
                                                        <i class="fas fa-trash ml-2"></i>
                                                    </a> --}}
                                                        <a href="{{ route('products.index', $child->id) }}"
                                                            class="text-primary ml-2"><i class="fas fa-plus"></i></a>

                                                    </td>
                                                </tr>
                                                @foreach ($child->children as $grandchild)
                                                    <tr>
                                                        <td>{{ $grandchild->id }}</td>
                                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $grandchild->category_name }}
                                                        </td>
                                                        <td>{{ optional($grandchild->parent)->category_name ?? 'No Parent' }}
                                                        </td>
                                                        {{-- <td>{{ $grandchild->category_discount }}</td> --}}
                                                        <td>{{ $grandchild->description }}</td>
                                                        <td>
                                                            @if ($grandchild->category_image)
                                                                {{-- <img src="{{ asset('admin/images/category/' . $grandchild->category_image) }}" alt="Category Image" style="max-width: 60px; height: auto;"> --}}
                                                                <img src="{{ asset($grandchild->category_image) }}"
                                                                    alt="Category Image"
                                                                    style="max-width: 60px; height: auto;">
                                                            @else
                                                                No Image
                                                            @endif
                                                        </td>
                                                        {{-- <td>
                                                        @if ($grandchild->status == 1)
                                                            <a href="javascript:void(0)" class="updateCategoryStatus" id="page-{{ $grandchild->id }}" page-id={{ $grandchild->id }}>
                                                                <i class="fas fa-toggle-on" status="Active"></i>
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0)" class="updateCategoryStatus" id="page-{{ $grandchild->id }}" page-id={{ $grandchild->id }} style="color: grey;">
                                                                <i class="fas fa-toggle-off" status="Inactive"></i>
                                                            </a>
                                                        @endif
                                                    </td> --}}
                                                        {{-- <td>{{ $grandchild->created_at->format('F j, Y') }}</td>
                                                    <td>{{ $grandchild->updated_at->format('F j, Y') }}</td> --}}
                                                        {{-- <td>
                                                        <a href="{{ route('categories.edit', $grandchild->id) }}" class="text-warning"><i class="fas fa-edit"></i></a>
                                                        <a href="javascript:void(0)" class="confirmDelete text-danger" record="categories" recordid="{{ $grandchild->id }}">
                                                            <i class="fas fa-trash ml-2"></i>
                                                        </a>
                                                    </td> --}}
                                                        <td>
                                                            <a href="{{ route('categories.edit', $grandchild->id) }}"
                                                                class="text-warning"><i class="fas fa-edit"></i></a>
                                                            <a href="{{ route('products.index', $grandchild->id) }}"
                                                                class="text-primary ml-2"><i class="fas fa-plus"></i></a>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @empty
                                            <tr>
                                                <td colspan="10">No Category found.</td>
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
    <script src="{{ asset('admin/js/category.js') }}"></script> --}}
    <script>
        // $(function() {
            $("#categories").DataTable(
                {
                    // "responsiv   e": true,
                    "lengthChange": true,
                    "autoWidth": true,
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#categories_wrapper .col-md-6:eq(0)');


    </script>
    <script src="{{ asset('admin/js/category.js') }}"></script>
@endsection
