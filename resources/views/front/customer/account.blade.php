@extends('front.Layout.layout_old')

@section('style')
    <style>
        #tracking {
            background: #fff
        }

        .tracking-detail {
            padding: 3rem 0;
        }

        #tracking {
            margin-bottom: 1rem;
        }

        [class*="tracking-status-"] p {
            margin: 0;
            font-size: 1.1rem;
            color: #fff;
            text-transform: uppercase;
            text-align: center;
        }

        [class*="tracking-status-"] {
            padding: 1.6rem 0;
        }

        .tracking-list {
            border: 1px solid #e5e5e5;
        }

        .tracking-item {
            border-left: 4px solid #00ba0d;
            position: relative;
            padding: 2rem 1.5rem 0.5rem 2.5rem;
            font-size: 0.9rem;
            margin-left: 3rem;
            min-height: 5rem;
        }

        .tracking-item:last-child {
            padding-bottom: 4rem;
        }

        .tracking-item .tracking-date {
            margin-bottom: 0.5rem;
        }

        .tracking-item .tracking-date span {
            color: #888;
            font-size: 85%;
            padding-left: 0.4rem;
        }

        .tracking-item .tracking-content {
            padding: 0.5rem 0.8rem;
            background-color: #f4f4f4;
            border-radius: 0.5rem;
        }

        .tracking-item .tracking-content span {
            display: block;
            color: #767676;
            font-size: 13px;
        }

        .tracking-item .tracking-icon {
            position: absolute;
            left: -0.7rem;
            width: 1.1rem;
            height: 1.1rem;
            text-align: center;
            border-radius: 50%;
            font-size: 1.1rem;
            background-color: #fff;
            color: #fff;
        }

        .tracking-item-pending {
            border-left: 4px solid #d6d6d6;
            position: relative;
            padding: 2rem 1.5rem 0.5rem 2.5rem;
            font-size: 0.9rem;
            margin-left: 3rem;
            min-height: 5rem;
        }

        .tracking-item-pending:last-child {
            padding-bottom: 4rem;
        }

        .tracking-item-pending .tracking-date {
            margin-bottom: 0.5rem;
        }

        .tracking-item-pending .tracking-date span {
            color: #888;
            font-size: 85%;
            padding-left: 0.4rem;
        }

        .tracking-item-pending .tracking-content {
            padding: 0.5rem 0.8rem;
            background-color: #f4f4f4;
            border-radius: 0.5rem;
        }

        .tracking-item-pending .tracking-content span {
            display: block;
            color: #767676;
            font-size: 13px;
        }

        .tracking-item-pending .tracking-icon {
            line-height: 2.6rem;
            position: absolute;
            left: -0.7rem;
            width: 1.1rem;
            height: 1.1rem;
            text-align: center;
            border-radius: 50%;
            font-size: 1.1rem;
            color: #d6d6d6;
        }

        .tracking-item-pending .tracking-content {
            font-weight: 600;
            font-size: 17px;
        }

        .tracking-item .tracking-icon.status-current {
            width: 1.9rem;
            height: 1.9rem;
            left: -1.1rem;
        }

        .tracking-item .tracking-icon.status-intransit {
            color: #00ba0d;
            font-size: 0.6rem;
        }

        .tracking-item .tracking-icon.status-current {
            color: #00ba0d;
            font-size: 0.6rem;
        }

        @media (min-width: 992px) {
            .tracking-item {
                margin-left: 10rem;
            }

            .tracking-item .tracking-date {
                position: absolute;
                left: -10rem;
                width: 7.5rem;
                text-align: right;
            }

            .tracking-item .tracking-date span {
                display: block;
            }

            .tracking-item .tracking-content {
                padding: 0;
                background-color: transparent;
            }

            .tracking-item-pending {
                margin-left: 10rem;
            }

            .tracking-item-pending .tracking-date {
                position: absolute;
                left: -10rem;
                width: 7.5rem;
                text-align: right;
            }

            .tracking-item-pending .tracking-date span {
                display: block;
            }

            .tracking-item-pending .tracking-content {
                padding: 0;
                background-color: transparent;
            }
        }

        .tracking-item .tracking-content {
            font-weight: 600;
            font-size: 17px;
        }

        .blinker {
            border: 7px solid #e9f8ea;
            animation: blink 1s;
            animation-iteration-count: infinite;
        }

        @keyframes blink {
            50% {
                border-color: #fff;
            }
        }
    </style>
     {{-- *************Order Tracking Detail******************* --}}
     <style>
        .track-line {
            height: 2px !important;
            background-color: #488978;
            opacity: 1;
        }

        .dot {
            height: 10px;
            width: 10px;
            margin-left: 3px;
            margin-right: 3px;
            margin-top: 0px;
            background-color: #488978;
            border-radius: 50%;
            display: inline-block
        }

        .big-dot {
            height: 25px;
            width: 25px;
            margin-left: 0px;
            margin-right: 0px;
            margin-top: 0px;
            background-color: #488978;
            border-radius: 50%;
            display: inline-block;
        }

        .big-dot i {
            font-size: 12px;
        }

        .card-stepper {
            z-index: 0
        }
    </style>
@endsection
{{-- <section class="mainSection login-container">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12 col-md-4 mx-auto"> --}}

@section('main-content')
<section class="mainSection">
    <div class="container mt-5">
        <div class="row">
            <!-- Left Side: Profile -->
            <div class="col-md-3 profile-container">
                <div class="text-center">
                    <div class="position-relative">
                        {{-- <img src="https://via.placeholder.com/150" alt="User Image" class="profile-image mb-3" name="current_image"> --}}
                        @if (Auth::user()->image)
                            <img src="{{ asset('storage/Customer/images/profile') . '/' . Auth::user()->image }}"
                                alt="User Image" class="profile-image mb-3" name="current_image">
                        @else
                            <img src="{{ asset('front/images/profile/default-150x150.png') }}" alt="User Image"
                                class="profile-image mb-3" name="current_image">
                            {{-- <img src="https://via.placeholder.com/150" alt="User Image" class="profile-image mb-3" name="current_image"> --}}
                        @endif

                        <div class="change-pic-icon" data-bs-toggle="modal" data-bs-target="#changePicModal">
                            <i class="fa-solid fa-camera"></i>
                        </div>
                    </div>
                    <h4 id="cust_name">{{ Auth::user()->name }}</h4>
                </div>
                <div class="profile-details">
                    <p id="cust_email"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p id="cust_mobile"><strong>Mobile:</strong> {{ Auth::user()->mobile }}</p>
                </div>
                <div>

                    {{-- <ul class="list-group">
                        <li class="list-group-item">
                            <a href="#edit-details" data-bs-toggle="tab">Edit Details</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#update-password" data-bs-toggle="tab">Update Password</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#order-tracking" data-bs-toggle="tab">Order Tracking</a>
                        </li>
                    </ul> --}}


                </div>
            </div>

            <!-- Right Side: Tabs -->
            <div class="col-md-9">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="accountSettingsTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="edit-details-tab" data-bs-toggle="tab"
                            data-bs-target="#edit-details" type="button" role="tab" aria-controls="edit-details"
                            aria-selected="true">Edit Details</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="update-password-tab" data-bs-toggle="tab"
                            data-bs-target="#update-password" type="button" role="tab" aria-controls="update-password"
                            aria-selected="false">Update Password</button>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="order-tracking-tab" data-bs-toggle="tab"
                            data-bs-target="#order-tracking" type="button" role="tab" aria-controls="order-tracking"
                            aria-selected="false">Order Tracking</button>
                    </li> --}}
                </ul>

                <!-- Tab content -->
                <div class="tab-content mt-3" id="accountSettingsTabsContent">
                    <!-- Edit Details Tab -->
                    <div class="tab-pane fade show active" id="edit-details" role="tabpanel"
                        aria-labelledby="edit-details-tab">
                        <h5>Edit Details</h5>
                        <p id="update-success"></p>
                        <p id="update-error"></p>
                        <form action="javascript:;" method="POST" id="customerUpdateDetail">
                            <!-- CSRF Token for Laravel -->
                            @csrf
                            {{-- <input type="hidden" name="email" value={{ Auth::user()->email }}> --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ Auth::user()->name }}">
                            </div>
                            <p class="update-name"></p>

                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="text" class="form-control" id="mobile" name="mobile"
                                    value="{{ Auth::user()->mobile }}">
                            </div>
                            <p class="update-mobile"></p>
                            <div class="mb-4">
                                <label for="address" class="form-label">Address <span class="star">*</span></label>
                                <textarea class="form-control" name="address" id="address" rows="2">{{ Auth::user()->address }}</textarea>
                            </div>
                            <p class="update-address"></p>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>

                    <!-- Update Password Tab -->
                    <div class="tab-pane fade" id="update-password" role="tabpanel"
                        aria-labelledby="update-password-tab">
                        <h5>Update Password</h5>
                        <p id="reset-success"></p>
                        <p id="reset-error"></p>
                        <form action="javascript:;" method="POST" id="customerUpdatePasswordForm">
                            <!-- CSRF Token for Laravel -->
                            @csrf
                            <div class="mb-3">
                                <label for="current_pwd" class="form-label">Current Password <span
                                        class="star">*</span><span class="password_property"> (Password must be minimum
                                        4
                                        characters)</span></label>
                                <input type="password" class="form-control" id="current_pwd" name="current_pwd"
                                    placeholder="Current Password">

                            </div>
                            <p class="reset-current_pwd"></p>
                            <div class="mb-3">
                                <label for="new_pwd" class="form-label">New Password <span class="star">*</span><span
                                        class="password_property"> (Password must be minimum 4 characters)</span></label>
                                <input type="password" class="form-control" id="new_pwd" name="new_pwd"
                                    placeholder="New Password">
                            </div>
                            <p class="reset-new_pwd"></p>
                            <div class="mb-3">
                                <label for="confirm_pwd" class="form-label">Confirm Password <span
                                        class="star">*</span><span class="password_property"> (Password must be minimum
                                        4 characters)</span></label>
                                <input type="password" class="form-control" id="confirm_pwd" name="confirm_pwd"
                                    placeholder="Confirm Password">
                            </div>
                            <p class="reset-confirm_pwd"></p>

                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </form>
                    </div>

                    <!-- Order Tracking Tab -->
                    {{-- <div class="tab-pane fade" id="order-tracking" role="tabpanel" aria-labelledby="order-tracking-tab">
                        <h5>Order Tracking</h5>
                        <div class="container py-5">
                            <div class="row">

                                <div class="col-md-12 col-lg-12">
                                    <div id="tracking-pre"></div>
                                    <div id="tracking">
                                        <div class="tracking-list">
                                            <div class="tracking-item">
                                                <div class="tracking-icon status-intransit">
                                                    <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                                        data-prefix="fas" data-icon="circle" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="tracking-date"><img
                                                        src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                                                        class="img-responsive" alt="order-placed" /></div>
                                                <div class="tracking-content">Order Placed<span>09 Aug 2025, 10:00am</span>
                                                </div>
                                            </div>
                                            <div class="tracking-item">
                                                <div class="tracking-icon status-intransit">
                                                    <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                                        data-prefix="fas" data-icon="circle" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="tracking-date"><img
                                                        src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                                                        class="img-responsive" alt="order-placed" /></div>
                                                <div class="tracking-content">Order Confirmed<span>09 Aug 2025,
                                                        10:30am</span></div>
                                            </div>
                                            <div class="tracking-item">
                                                <div class="tracking-icon status-intransit">
                                                    <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                                        data-prefix="fas" data-icon="circle" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="tracking-date"><img
                                                        src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                                                        class="img-responsive" alt="order-placed" /></div>
                                                <div class="tracking-content">Packed the product<span>09 Aug 2025,
                                                        12:00pm</span></div>
                                            </div>
                                            <div class="tracking-item">
                                                <div class="tracking-icon status-intransit">
                                                    <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                                        data-prefix="fas" data-icon="circle" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="tracking-date"><img
                                                        src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                                                        class="img-responsive" alt="order-placed" /></div>
                                                <div class="tracking-content">Arrived in the warehouse<span>10 Aug 2025,
                                                        02:00pm</span></div>
                                            </div>
                                            <div class="tracking-item">
                                                <div class="tracking-icon status-current blinker">
                                                    <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                                        data-prefix="fas" data-icon="circle" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="tracking-date"><img
                                                        src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                                                        class="img-responsive" alt="order-placed" /></div>
                                                <div class="tracking-content">Near by Courier facility<span>10 Aug 2025,
                                                        03:00pm</span></div>
                                            </div>

                                            <div class="tracking-item-pending">
                                                <div class="tracking-icon status-intransit">
                                                    <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                                        data-prefix="fas" data-icon="circle" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="tracking-date"><img
                                                        src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                                                        class="img-responsive" alt="order-placed" /></div>
                                                <div class="tracking-content">Out for Delivery<span>12 Aug 2025,
                                                        05:00pm</span></div>
                                            </div>
                                            <div class="tracking-item-pending">
                                                <div class="tracking-icon status-intransit">
                                                    <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                                        data-prefix="fas" data-icon="circle" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="tracking-date"><img
                                                        src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                                                        class="img-responsive" alt="order-placed" /></div>
                                                <div class="tracking-content">Delivered<span>12 Aug 2025, 09:00pm</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> --}}

                     {{-- ************************Order Tracking Detail************************* --}}

                     {{-- <section class="vh-100" style="background-color: #eee;">
                        <div class="container py-5 h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col">
                                    <div class="card card-stepper" style="border-radius: 10px;">
                                        <div class="card-body p-4">

                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex flex-column">
                                                    <span class="lead fw-normal">Your order has been delivered</span>
                                                    <span class="text-muted small">by DHFL on 21 Jan, 2020</span>
                                                </div>
                                                <div>
                                                    <button data-mdb-button-init data-mdb-ripple-init
                                                        class="btn btn-outline-primary" type="button">Track order
                                                        details</button>
                                                </div>
                                            </div>
                                            <hr class="my-4">

                                            <div
                                                class="d-flex flex-row justify-content-between align-items-center align-content-center">
                                                <span class="dot"></span>
                                                <hr class="flex-fill track-line"><span class="dot"></span>
                                                <hr class="flex-fill track-line"><span class="dot"></span>
                                                <hr class="flex-fill track-line"><span class="dot"></span>
                                                <hr class="flex-fill track-line"><span
                                                    class="d-flex justify-content-center align-items-center big-dot dot">
                                                    <i class="fa fa-check text-white"></i></span>
                                            </div>

                                            <div class="d-flex flex-row justify-content-between align-items-center">
                                                <div class="d-flex flex-column align-items-start"><span>15
                                                        Mar</span><span>Order placed</span>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center"><span>15
                                                        Mar</span><span>Order
                                                        placed</span></div>
                                                <div class="d-flex flex-column justify-content-center align-items-center">
                                                    <span>15
                                                        Mar</span><span>Order Dispatched</span>
                                                </div>
                                                <div class="d-flex flex-column align-items-center"><span>15
                                                        Mar</span><span>Out for
                                                        delivery</span></div>
                                                <div class="d-flex flex-column align-items-end"><span>15
                                                        Mar</span><span>Delivered</span></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section> --}}

                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Change Picture -->
    <div class="modal fade" id="changePicModal" tabindex="-1" aria-labelledby="changePicModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePicModalLabel">Change Profile Picture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:;" method="POST" id="customerUpdatePic" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="cust_image" class="form-label">Select New Picture</label>
                            <input type="file" class="form-control" id="cust_image" name="cust_image">
                            <input type="hidden" name="current_image" value="{{ Auth::user()->image }}">
                        </div>
                        <p class="update-cust_image"></p>
                        <p class="update-error"></p>
                        <p id="update-uploaded"></p>
                        <p id="update-notupdated"></p>
                        <p id="update-exception"></p>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    <!-- Include Bootstrap JS if not already included -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let hash = window.location.hash;

            if (hash) {
                // Activate the correct tab
                let tabTriggerEl = document.querySelector(`a[href="${hash}"]`);
                if (tabTriggerEl) {
                    let tab = new bootstrap.Tab(tabTriggerEl);
                    tab.show();
                }
            }

            // Update hash on tab change
            let tabLinks = document.querySelectorAll('a[data-bs-toggle="tab"]');
            tabLinks.forEach(function(tabLink) {
                tabLink.addEventListener('shown.bs.tab', function(event) {
                    window.location.hash = event.target.getAttribute('href');
                });
            });
        });
    </script>
@endsection
