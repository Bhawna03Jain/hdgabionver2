<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ url('images/logo/HD-Gabion.png') }}" alt="HD-Gabion Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">HD-GABION</span>
    </a>
    <style>
        .disabled-link {
            /* pointer-events: none;
          color: grey;
          cursor: not-allowed;
          text-decoration: none; */
        }
    </style>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (Auth::guard('admin')->user()->image)
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{ asset(Auth::guard('admin')->user()->image )}}"
                        alt="User profile picture" width=150 height=150>
                @else
                    <img class="profile-user-img img-fluid img-circle" src="https://via.placeholder.com/150"
                        alt="User profile picture">
                @endif
            </div>

            <div class="info">
                <a href="#" class="d-block">{{ ucfirst(strtolower(Auth::guard('admin')->user()->name)) }}</a>


            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2" id="sidebar-adminLayout">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                {{-- *************Quotations ******** --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.quotes.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>RFQ </p>
                    </a>
                </li> --}}



                {{-- <li class="nav-item">
                    <a href="{{ route('admin.orders.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Orders </p>
                    </a>
                </li> --}}
                {{-- Settings --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin_boq_fences_config.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>BOQ Fences Config </p>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a href="{{ route('templates.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Templates
                                </p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('adminAccount') }}" class="nav-link">
                                {{-- <i class="nav-icon fas fa-calendar-alt"></i> --}}
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Profile
                                </p>
                            </a>
                        </li>


                        {{-- <li class="nav-item mb-2">
                            <a href="{{ route('exchange_rates.index') }}" class="nav-link">

                                <i class="nav-icon fas fa-euro-sign"></i>
                                <p>Exchange Rate</p>
                            </a>
                        </li> --}}


                        {{-- <li class="nav-item">
                            <a href="{{ route('tax_categories.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tax Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tax_rates.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tax Rate</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>

                {{-- Super Admin --}}
                {{-- <li class="nav-item ">
                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Super Admin
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview"> --}}

                        {{-- <li class="nav-item">
                            <a href="{{ route('templates.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Templates
                                </p>
                            </a>
                        </li> --}}

                        {{-- <li class="nav-item">
                            <a href="{{ route('adminLocales') }}" class="nav-link">

                                <i class="nav-icon fas fa-globe"></i>
                                <p>Locale</p>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a href="{{ route('currencies.index') }}" class="nav-link  disabled-link">

                                <i class="nav-icon fas fa-euro-sign"></i>
                                <p>Currencies</p>
                            </a>
                        </li> --}}

                        {{-- <li class="nav-item">
                            <a href="{{ route('countries.index') }}" class="nav-link  disabled-link">

                                <i class="nav-icon fas fa-flag"></i>
                                <p>
                                    Country
                                </p>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link  disabled-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tax Category</p>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link  disabled-link">

                                <i class="nav-icon fas fa-percentage"></i>
                                <p>Tax Rate</p>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a href="{{ route('tax_categories.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tax Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tax_rates.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tax Rate</p>
                            </a>
                        </li> --}}
                    {{-- </ul>
                </li> --}}
                {{--  Catalog-->Categories, Product, Product Attributes --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link">

                        <i class="far fa-circle nav-icon"></i>
                        <p>Categories</p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Catalog
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Master Sheet</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                           Fences
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/admin/mastersheet/fence') }}" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>
                                <p>2.5m Fence BOQ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/mastersheet/fence/materials') }}" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Materials</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/mastersheet/fence/manufacturing') }}" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Manufacturing</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/mastersheet/fence/taxes') }}" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Taxes</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Margin</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('products.index') }}" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Products</p>
                            </a>
                        </li> --}}
                    {{-- </ul>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- <li class="nav-item">
                            <a href="{{ url('admin/products/baskets') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Baskets</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/products/baskets-parts') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Baskets Parts</p>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a href="{{ url('admin/products/fences-materials') }}" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Fences Materials</p>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a href="{{ url('admin/products/others') }}" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Others</p>
                            </a>
                        </li> --}}


                    </ul>

                {{-- </li> --}}
                {{-- End Roles and Permissions --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
{{-- <script>
    // Configure Toastr options globally
    toastr.options = {
      "closeButton": true,
      "progressBar": true,
      "positionClass": "toast-top-right",  // Position of the notification
      "timeOut": "3000"                    // Duration in milliseconds
    };

    // Get all elements with the class 'disabled-link'
    const disabledLinks = document.getElementsByClassName("disabled-link");

    // Loop through each link and add the event listener to prevent the default behavior
    for (let i = 0; i < disabledLinks.length; i++) {
      disabledLinks[i].addEventListener("click", function(event) {
        event.preventDefault();  // Prevents the link from navigating
        // Show a toastr warning
        toastr.warning("This link is For Super Admin Only.");
      });
    }

    // Get all elements with the class 'later-use-link'
    const laterUseLinks = document.getElementsByClassName("later-use-link");

    // Loop through each link and add the event listener to prevent the default behavior
    for (let i = 0; i < laterUseLinks.length; i++) {
      laterUseLinks[i].addEventListener("click", function(event) {
        event.preventDefault();  // Prevents the link from navigating
        // Show a toastr info message
        toastr.info("This link will be activated Later.");
      });
    }
  </script> --}}

{{-- <script>
    // Get all elements with the class 'disabled-link'
    const disabledLinks = document.getElementsByClassName("disabled-link");

    // Loop through each link and add the event listener to prevent the default behavior
    for (let i = 0; i < disabledLinks.length; i++) {
      disabledLinks[i].addEventListener("click", function(event) {
        event.preventDefault();  // Prevents the link from navigating
        // Show a toastr warning
      toastr.warning("This link is For Super Admin Only.");
    });
  }

  // Optionally, you can configure Toastr options here
  toastr.options = {
    "closeButton": true,
    "progressBar": true,
    "positionClass": "toast-top-right",  // Position of the notification
    "timeOut": "3000"                    // Duration in milliseconds
  };
  </script>
<script>
    // Get all elements with the class 'disabled-link'
    const laterUseLinks = document.getElementsByClassName("later-use-link");

    // Loop through each link and add the event listener to prevent the default behavior
    for (let i = 0; i < laterUseLinks.length; i++) {
      laterUseLinks[i].addEventListener("click", function(event) {
        event.preventDefault();  // Prevents the link from navigating
        // Show a toastr warning
      toastr.info("This link will be activated Later.");
    });
  }

  // Optionally, you can configure Toastr options here
  toastr.options = {
    "closeButton": true,
    "progressBar": true,
    "positionClass": "toast-top-right",  // Position of the notification
    "timeOut": "3000"                    // Duration in milliseconds
  };
  </script> --}}