<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ url('images/logo/HD-Gabion.png') }}" alt="HD-Gabion Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">HD-GABION</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (Auth::guard('admin')->user()->image)
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{ asset('admin/images/profile') . '/' . Auth::guard('admin')->user()->image }}"
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
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                {{-- <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              Admin Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/update-password')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Admin Password
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/update-details')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Admin Detail
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/subadmins')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Admins
                  </p>
                </a>
              </li>
            </ul>
          </li> --}}

                {{-- Roles and Permissions --}}
                {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Roles & Permission
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/admin/roles') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Roles</p>
                    </a>
                  </li>
              <li class="nav-item">
                <a href="{{ url('/admin/permissions') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permissions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/admin-roles') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admins</p>
                </a>
              </li>

            </ul>
          </li> --}}
                {{-- End Roles and Permissions --}}
                {{-- Sales-->Orders, Invoice, Transactions, Refund, Shipments --}}
                {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Sales
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transactions</p>
                </a>
              </li>


            </ul>
          </li> --}}

                {{--  Catalog-->Categories, Product, Product Attributes --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Catalog
                            <i class="fas fa-angle-left right"></i>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Attributes</p>
                </a>
              </li> --}}


                    </ul>
                </li>
   {{-- Roles and Permissions --}}
   <li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
            Quotations Request
            <i class="fas fa-angle-left right"></i>
            {{-- <span class="badge badge-info right">6</span> --}}
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.quotes.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Customer Request</p>
            </a>
        </li>


    </ul>
</li>

                {{-- Customers-->Customers, Roles,Groups, Review --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customers</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li> --}}
                        {{-- <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Groups</p>
                </a>
              </li> --}}
                        {{-- <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Review</p>
                </a>
              </li> --}}
                    </ul>
                </li>
                {{-- BOQ-->BOQ Fence , BOQ Baskets --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            BOQ Config
                            <i class="fas fa-angle-left right"></i>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin_boq_fences_config.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>BOQ Fences Config </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin_boq_config_fences.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>BOQ Config Fences</p>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a href="{{ route('boq_fences.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>BOQ Fencesorig</p>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a href="{{ route('boq_baskets.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>BOQ Basket</p>
                            </a>
                        </li> --}}
                </li>
                {{-- Reporting-->Customers, Sales --}}
                {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Reporting
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales</p>
                </a>
              </li>--}}

            </ul>
          </li>

                <li class="nav-header">Settings</li>
                {{-- <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Email Templates
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li> --}}

                <li class="nav-item">
                    <a href="{{ route('adminAccount') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('countries.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Country
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('adminLocales') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Locale
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
            <a href="{{ route('currencies.index') }}" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
               Currency
                 </p>
            </a>
          </li> --}}

                {{--  Currency-->Currency, Exchange Rate --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Currency
                            <i class="fas fa-angle-left right"></i>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('currencies.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Currencies</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('exchange_rates.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Exchange Rate</p>
                            </a>
                        </li>



                    </ul>
                </li>
                {{--  Tax-->Tax Category, Tax Rate --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Tax
                            <i class="fas fa-angle-left right"></i>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
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
                        </li>



                    </ul>
                </li>






                {{-- Settings-->Locale, Currencies, Exchange Rate --}}
                {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Settings
                    <i class="fas fa-angle-left right"></i>

                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{url('/admin/update-password')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Update Admin Password
                          </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{url('/admin/update-details')}}" class="nav-link active">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Update Admin Detail
                          </p>
                        </a>
                      </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Locale</p>
                        </a>
                      </li>
                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Currencies</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Exchange Rate </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Taxes</p>
                    </a>
                  </li>
                </ul>
              </li> --}}




            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
