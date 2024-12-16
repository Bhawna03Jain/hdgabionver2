@extends('front.Layout.layout')

@section('style')

    {{-- *************Order Tracking Detail******************* --}}
    <style>
        #main-content {
            padding: 30px;
            border-radius: 15px;
        }

        #main-content .h5,
        #main-content .text-uppercase {
            font-weight: 600;
            margin-bottom: 0;
        }

        #main-content .h5+div {
            font-size: 0.9rem;
        }

        #main-content .box {
            padding: 10px;
            border-radius: 6px;
            width: 170px;
            height: 90px;
        }

        #main-content .box img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        #main-content .box .tag {
            font-size: 0.9rem;
            color: #000;
            font-weight: 500;
        }

        #main-content .box .number {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .card-stepper {
            overflow-x: scroll;
            overflow-y: hidden;
            padding-bottom: 1rem;
        }

        #trackline-container {
            width: 1800;
            min-width: 1800px;
            margin-bottom: 2rem;
            padding: 3rem;
        }


        .track-line {
            height: 2px;
            background-color: #ccc;
            /* Default grey */
            transition: transform 0.3s ease;
        }

        /* Green track line for all statuses before the last */
        .track-green {
            background-color: #28a745;
            /* Green color */
        }

        /* Tilted track line for the "Cancelled" status */
        .track-cancelled {
            position: relative;
            /* transform: rotate(-90deg);
                                                        /* Tilt the line */
            /* transform-origin: left center; */
            background-color: #ff0000;
            /* Red color to indicate cancellation */
            height: 50px;
            width: 2px;
            top: -70px;
        }

        .cancelled {
            position: absolute;
        }

        .dot-container {
            position: relative;
            display: flex;
            flex-direction: column;
            /* align-items: center; */
        }

        .dot-label {
            position: absolute;
            top: 50px;
            /* Adjust this value as needed */
            font-size: 12px;
            color: #000;
            text-align: center;
            white-space: nowrap;
        }

        .dot-label-date {
            top: 70px;
        }

        .dot-label-cancelled-date {
            position: absolute;
            /* top: 30px; */
            font-size: 12px;
            color: #000;
            text-align: center;
            white-space: nowrap;
            /* top: -100px; */
            left: -100%;
            top: -90px;
        }

        .dot-label-cancelled {
            position: absolute;
            /* top: 30px; */
            font-size: 12px;
            color: #000;
            text-align: center;
            white-space: nowrap;
            top: -110px;
            left: -100%;
        }

        .big-dot-label {

            top: 40px;
            /* Adjust this value as needed */

        }

        .dot {
            height: 10px;
            width: 10px;
            background-color: #686d6d;
            border-radius: 50%;
            display: inline-block;
        }

        .big-dot {
            height: 35px;
            width: 35px;
            background-color: #686d6d;
            /* background-color: #488978; */
            border-radius: 50%;
            display: inline-block;
            /* text-align: center; */
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #007965;

        }

        .big-dot i {
            font-size: 18px;
            color: #007965;
        }

        .dot-completed {
            background-color: #d5e6e2;
            /* Green color for completed status */
        }

        .dot-cancelled {
            position: relative;
            /* transform-origin: left center; */
            background-color: #ff0000;
            /* height: 50px; */
            /* width: 2px; */
            top: -160px;
        }

        .bg-light {
            background-color: #f0ecec !important;
        }
    </style>

    {{-- <style>
    #main-content {
        padding: 30px;
        border-radius: 15px;
    }

    #main-content .h5,
    #main-content .text-uppercase {
        font-weight: 600;
        margin-bottom: 0;
    }

    #main-content .h5+div {
        font-size: 0.9rem;
    }

    #main-content .box {
        padding: 10px;
        border-radius: 6px;
        width: 170px;
        height: 90px;
    }

    #main-content .box img {
        width: 40px;
        height: 40px;
        object-fit: contain;
    }

    #main-content .box .tag {
        font-size: 0.9rem;
        color: #000;
        font-weight: 500;
    }

    #main-content .box .number {
        font-size: 1.5rem;
        font-weight: 600;
    }

    .order {
        padding: 10px 30px;
        min-height: 150px;
    }

    .order .order-summary {
        height: 100%;
    }

    .order .blue-label {
        background-color: #aeaeeb;
        color: #0046dd;
        font-size: 0.9rem;
        padding: 0px 3px;
    }

    .order .green-label {
        background-color: #a8e9d0;
        color: #008357;
        font-size: 0.9rem;
        padding: 0px 3px;
    }

    .order .fs-8 {
        font-size: 0.85rem;
    }

    .order .rating img {
        width: 20px;
        height: 20px;
        object-fit: contain;
    }

    .order .rating .fas,
    .order .rating .far {
        font-size: 0.9rem;
    }

    .order .rating .fas {
        color: #daa520;
    }

    .order .status {
        font-weight: 600;
    }

    .order .btn.btn-primary {
        background-color: #fff;
        color: #4e2296;
        border: 1px solid #4e2296;
    }

    .order .btn.btn-primary:hover {
        background-color: #4e2296;
        color: #fff;
    }

    .order .progressbar-track {
        margin-top: 20px;
        margin-bottom: 20px;
        position: relative;
    }

    .order .progressbar-track .progressbar {
        list-style: none;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-left: 0rem;
    }

    .order .progressbar-track .progressbar li {
        font-size: 1.5rem;
        border: 1px solid #333;
        padding: 5px 10px;
        border-radius: 50%;
        background-color: #dddddd;
        z-index: 100;
        position: relative;
    }

    .order .progressbar-track .progressbar li.green {
        border: 1px solid #007965;
        background-color: #d5e6e2;
    }

    .order .progressbar-track .progressbar li::after {
        position: absolute;
        font-size: 0.9rem;
        top: 50px;
        left: 0px;
    }

    #tracker {
        position: absolute;
        border-top: 1px solid #bbb;
        width: 100%;
        top: 25px;
    }

    #step-1::after {
        content: 'Placed';
    }

    #step-2::after {
        content: 'Accepted';
        left: -10px;
    }

    #step-3::after {
        content: 'Packed';
    }

    #step-4::after {
        content: 'Shipped';
    }

    #step-5::after {
        content: 'Delivered';
        left: -10px;
    }

    .bg-purple {
        background-color: #55009b;
    }

    .bg-light {
        background-color: #f0ecec !important;
    }

    .green {
        color: #007965 !important;
    }

    @media(max-width: 500px) {
        .order .progressbar-track .progressbar li {
            font-size: 1rem;
        }

        .order .progressbar-track .progressbar li::after {
            font-size: 0.8rem;
            top: 35px;
        }

        #tracker {
            top: 20px;
        }
    }

    @media(max-width: 440px) {
        #main-content {
            padding: 20px;
        }

        .order {
            padding: 20px;
        }

        #step-4::after {
            left: -5px;
        }
    }

    @media(max-width: 395px) {
        .order .progressbar-track .progressbar li {
            font-size: 0.8rem;
        }

        .order .progressbar-track .progressbar li::after {
            font-size: 0.7rem;
            top: 35px;
        }

        #tracker {
            top: 15px;
        }

        .order .btn.btn-primary {
            font-size: 0.85rem;
        }
    }

    @media(max-width: 355px) {
        #main-content {
            padding: 15px;
        }

        .order {
            padding: 10px;
        }
    }
</style> --}}
@endsection

@section('main-content')
    <div class="container-fluid mt-5">
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

                        {{-- <div class="change-pic-icon" data-bs-toggle="modal" data-bs-target="#changePicModal">
                            <i class="fa-solid fa-camera"></i>
                        </div> --}}
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
                {{-- <ul class="nav nav-tabs" id="accountSettingsTabs" role="tablist">
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
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="order-tracking-tab" data-bs-toggle="tab"
                            data-bs-target="#order-tracking" type="button" role="tab" aria-controls="order-tracking"
                            aria-selected="false">Order Tracking</button>
                    </li>
                </ul> --}}

                <!-- Tab content -->
                <div class="tab-content mt-3" id="accountSettingsTabsContent">

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

                    <section id="orderProgress">
                        <div class="container-fluid ">
                            <h1 class="mb-3">My Recent Orders</h1>

                            @php
                                use App\Enums\OrderStatus;

                                $orderStatuses = [
                                    'pending' => [
                                        'value' => OrderStatus::Pending->value,
                                        'label' => OrderStatus::Pending->label(),
                                    ],
                                    'initial_invoice_sent' => [
                                        'value' => OrderStatus::InitialInvoiceSent->value,
                                        'label' => OrderStatus::InitialInvoiceSent->label(),
                                    ],
                                    'production_started' => [
                                        'value' => OrderStatus::ProductionStarted->value,
                                        'label' => OrderStatus::ProductionStarted->label(),
                                    ],
                                    'production_finalized' => [
                                        'value' => OrderStatus::ProductionFinalized->value,
                                        'label' => OrderStatus::ProductionFinalized->label(),
                                    ],
                                    'way_to_hot_dip_galvanized' => [
                                        'value' => OrderStatus::Way_To_Hot_Dip_Galvanized->value,
                                        'label' => OrderStatus::Way_To_Hot_Dip_Galvanized->label(),
                                    ],
                                    'received_from_hot_dip_galvanized' => [
                                        'value' => OrderStatus::Rcvd_From_Hot_Dip_Galvanized->value,
                                        'label' => OrderStatus::Rcvd_From_Hot_Dip_Galvanized->label(),
                                    ],
                                    'packing_in_progress' => [
                                        'value' => OrderStatus::Packing_In_Progress->value,
                                        'label' => OrderStatus::Packing_In_Progress->label(),
                                    ],
                                    'final_invoice_sent' => [
                                        'value' => OrderStatus::Final_Invoice_sent->value,
                                        'label' => OrderStatus::Final_Invoice_sent->label(),
                                    ],
                                    'shipped' => [
                                        'value' => OrderStatus::Shipped->value,
                                        'label' => OrderStatus::Shipped->label(),
                                    ],
                                    'delivered' => [
                                        'value' => OrderStatus::Delivered->value,
                                        'label' => OrderStatus::Delivered->label(),
                                    ],
                                    'cancelled' => [
                                        'value' => OrderStatus::Cancelled->value,
                                        'label' => OrderStatus::Cancelled->label(),
                                    ],
                                ];
                            @endphp
                            <div class="col-12 my-lg-0 my-1">
                                <div id="main-content" class="bg-white border">

                                    <div class="d-flex my-4 flex-wrap">
                                        <div class="box me-4 my-1 bg-light">
                                            <img src="https://www.freepnglogos.com/uploads/box-png/cardboard-box-brown-vector-graphic-pixabay-2.png"
                                                alt="">
                                            <div class="d-flex align-items-center mt-2">
                                                <div class="tag">Orders placed</div>
                                                <div class="ms-auto number">{{ isset($orders) && is_countable($orders) ? count($orders) : 0 }}</div>
                                            </div>
                                        </div>
                                        {{-- <div class="box me-4 my-1 bg-light">
                                                <img src="https://www.freepnglogos.com/uploads/shopping-cart-png/shopping-cart-campus-recreation-university-nebraska-lincoln-30.png"
                                                    alt="">
                                                <div class="d-flex align-items-center mt-2">
                                                    <div class="tag">Items in Cart</div>
                                                    <div class="ms-auto number">10</div>
                                                </div>
                                            </div>
                                            <div class="box me-4 my-1 bg-light">
                                                <img src="https://www.freepnglogos.com/uploads/love-png/love-png-heart-symbol-wikipedia-11.png"
                                                    alt="">
                                                <div class="d-flex align-items-center mt-2">
                                                    <div class="tag">Wishlist</div>
                                                    <div class="ms-auto number">10</div>
                                                </div>
                                            </div> --}}
                                    </div>
                                    <div class="text-uppercase mb-5">My recent orders</div>
                                    @if($orders)
                                    @foreach ($orders as $order)
                                        @php
                                            $orderLogs = $order->orderLogs;
                                        @endphp
                                        <div class="row d-flex justify-content-center align-items-center h-100">
                                            <div class="col">
                                                <div class="card card-stepper bg-light" style="border-radius: 10px;">
                                                    <div class="card-body p-5">

                                                        <div
                                                            class="d-flex flex-column justify-content-between order-summary">
                                                            <div class="d-flex align-items-center">
                                                                <div class="text-uppercase">Order#{{ $order->id }}</div>
                                                                <div class="blue-label ms-auto text-uppercase">
                                                                    {{ ucwords($order->payment_method) }}</div>
                                                                <div class="ms-auto">
                                                                    <button data-mdb-button-init data-mdb-ripple-init
                                                                        class="btn btn-outline-primary" type="button">Track
                                                                        Order
                                                                    </button>
                                                                </div>
                                                                <div class="ms-auto">
                                                                    <button data-mdb-button-init data-mdb-ripple-init
                                                                        class="btn btn-outline-primary" type="button">Order
                                                                        Detail</button>
                                                                </div>
                                                            </div>
                                                            <hr class="my-4">
                                                            <div class="d-flex align-items-center mt-2">
                                                                <div class="fs-8">
                                                                    {{ \Carbon\Carbon::parse($order->created_at)->timezone('Asia/Kolkata')->format('d-m-Y h:i A') }}
                                                                </div>
                                                                @php
                                                                    $currentStatusValue = $order->status; // Assuming this holds the current status value
                                                                    $currentStatusLabel =
                                                                        collect($orderStatuses)->firstWhere(
                                                                            'value',
                                                                            $currentStatusValue,
                                                                        )['label'] ?? 'Unknown Status';
                                                                @endphp
                                                                <div class="status ms-auto"> <strong> Status :
                                                                    </strong>{{ $currentStatusLabel }}
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <hr class="my-4">



                                                        <div class="d-flex flex-row justify-content-between align-items-center align-content-center"
                                                            id="trackline-container">
                                                            @foreach ($orders as $order)
                                                                @php
                                                                    $orderLogs = $order->orderLogs;
                                                                    $isCancelled =
                                                                        $orderLogs->isNotEmpty() &&
                                                                        $orderLogs->last()->status == 10; // Check if last status is cancelled
                                                                    if ($isCancelled) {
                                                                        $cancelDate = $orderLogs->last()->created_at;
                                                                        $cancelDate
                                                                            ? ($cancelDate = \Carbon\Carbon::parse(
                                                                                $cancelDate,
                                                                            )
                                                                                ->timezone('Asia/Kolkata')
                                                                                ->format('d-m-Y h:i A'))
                                                                            : '';
                                                                    }
                                                                    $isDelivered =
                                                                        $orderLogs->isNotEmpty() &&
                                                                        $orderLogs->last()->status == 9; // Check if last status is delivered

                                                                    $previousLog =
                                                                        $orderLogs->count() > 1
                                                                            ? $orderLogs->slice(-2, 1)->first()
                                                                            : null;
                                                                    // Get the status before the last status
                                                                    $previousStatus = $previousLog
                                                                        ? $previousLog->status
                                                                        : null;

                                                                @endphp

                                                                @foreach ($orderStatuses as $key => $status)
                                                                    @php
                                                                        // Check if this status is completed
                                                                        $isCompleted = in_array(
                                                                            $status['value'],
                                                                            $orderLogs->pluck('status')->toArray(),
                                                                        );

                                                                        // Check if the tracking is completed for the current status
                                                                        $isTrackCompleted =
                                                                            $orderLogs
                                                                                ->where('status', '>', $status['value'])
                                                                                ->where('status', '<', 10)
                                                                                ->count() > 0;
                                                                        $date = $orderLogs
                                                                            ->where('status', '=', $status['value']) // Corrected the operator
                                                                            ->first();

                                                                        // $date ? $date=$date->created_at : ''; // Check if $date exists
                                                                        $date
                                                                            ? ($date = \Carbon\Carbon::parse(
                                                                                $date->created_at,
                                                                            )
                                                                                ->timezone('Asia/Kolkata')
                                                                                ->format('d-m-Y h:i A'))
                                                                            : ''; // Check if $date exists
                                                                    @endphp

                                                                    {{-- For statuses that are not "Delivered" or "Cancelled" --}}
                                                                    @switch($status['value'])
                                                                        @case(0)
                                                                            <div class="dot-container">
                                                                                <span
                                                                                    class="big-dot dot {{ $isCompleted ? 'dot-completed' : '' }}">
                                                                                    <i class="fas fa-gift"
                                                                                        style="{{ $isCompleted ? 'color:#007965' : 'color:#ffffff' }}"></i></span>
                                                                                <span class="dot-label">Placed</span>
                                                                                <p class="dot-label dot-label-date">
                                                                                    {{ $date ? $date : '' }}
                                                                                </p>

                                                                                @if ($status['value'] == $previousStatus && $isCancelled)
                                                                                    <div class="cancelled">
                                                                                        <hr
                                                                                            class="flex-fill track-line track-cancelled">
                                                                                        <span class="dot dot-cancelled"></span>
                                                                                        <span
                                                                                            class="dot-label-cancelled">Cancelled</span>
                                                                                        <p class="dot-label-cancelled-date">
                                                                                            {{ $cancelDate ? $cancelDate : '' }}
                                                                                        </p>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            <hr
                                                                                class="flex-fill track-line {{ $isTrackCompleted ? 'dot-completed' : '' }}">
                                                                        @break

                                                                        @case(2)
                                                                            <div class="dot-container">
                                                                                <span
                                                                                    class="big-dot dot {{ $isCompleted ? 'dot-completed' : '' }}">
                                                                                    <i class="fa-brands fa-playstation"
                                                                                        style="{{ $isCompleted ? 'color:#007965' : 'color:#ffffff' }}"></i></span>
                                                                                <span
                                                                                    class="dot-label">{{ $status['label'] }}</span>
                                                                                <p class="dot-label dot-label-date">
                                                                                    {{ $date ? $date : '' }}
                                                                                </p>

                                                                                @if ($status['value'] == $previousStatus && $isCancelled)
                                                                                    <div class="cancelled">
                                                                                        <hr
                                                                                            class="flex-fill track-line track-cancelled">
                                                                                        <span class="dot dot-cancelled"></span>
                                                                                        <span
                                                                                            class="dot-label-cancelled">Cancelled</span>
                                                                                        <p class="dot-label-cancelled-date">
                                                                                            {{ $cancelDate ? $cancelDate : '' }}
                                                                                        </p>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            <hr
                                                                                class="flex-fill track-line {{ $isTrackCompleted ? 'dot-completed' : '' }}">
                                                                        @break

                                                                        @case(3)
                                                                            <div class="dot-container">
                                                                                <span
                                                                                    class="big-dot dot {{ $isCompleted ? 'dot-completed' : '' }}">
                                                                                    <i class="fa-solid fa-compact-disc"
                                                                                        style="{{ $isCompleted ? 'color:#007965' : 'color:#ffffff' }}"></i></span>
                                                                                <span
                                                                                    class="dot-label">{{ $status['label'] }}</span>
                                                                                <p class="dot-label dot-label-date">
                                                                                    {{ $date ? $date : '' }}
                                                                                </p>

                                                                                @if ($status['value'] == $previousStatus && $isCancelled)
                                                                                    <div class="cancelled">
                                                                                        <hr
                                                                                            class="flex-fill track-line track-cancelled">
                                                                                        <span class="dot dot-cancelled"></span>
                                                                                        <span
                                                                                            class="dot-label-cancelled">Cancelled</span>
                                                                                        <p class="dot-label-cancelled-date">
                                                                                            {{ $cancelDate ? $cancelDate : '' }}
                                                                                        </p>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            <hr
                                                                                class="flex-fill track-line {{ $isTrackCompleted ? 'dot-completed' : '' }}">
                                                                        @break

                                                                        @case(4)
                                                                            <div class="dot-container">
                                                                                <span
                                                                                    class="big-dot dot {{ $isCompleted ? 'dot-completed' : '' }}">
                                                                                    <i class="fa-solid fa-hot-tub-person"
                                                                                        style="{{ $isCompleted ? 'color:#007965' : 'color:#ffffff' }}"></i></span>
                                                                                <span
                                                                                    class="dot-label">{{ $status['label'] }}</span>
                                                                                <p class="dot-label dot-label-date">
                                                                                    {{ $date ? $date : '' }}
                                                                                </p>

                                                                                @if ($status['value'] == $previousStatus && $isCancelled)
                                                                                    <div class="cancelled">
                                                                                        <hr
                                                                                            class="flex-fill track-line track-cancelled">
                                                                                        <span class="dot dot-cancelled"></span>
                                                                                        <span
                                                                                            class="dot-label-cancelled">Cancelled</span>
                                                                                        <p class="dot-label-cancelled-date">
                                                                                            {{ $cancelDate ? $cancelDate : '' }}
                                                                                        </p>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            <hr
                                                                                class="flex-fill track-line {{ $isTrackCompleted ? 'dot-completed' : '' }}">
                                                                        @break

                                                                        @case(5)
                                                                            <div class="dot-container">
                                                                                <span
                                                                                    class="big-dot dot {{ $isCompleted ? 'dot-completed' : '' }}">
                                                                                    <i class="fa-solid fa-water-ladder"
                                                                                        style="{{ $isCompleted ? 'color:#007965' : 'color:#ffffff' }}"></i></span>
                                                                                <span
                                                                                    class="dot-label">{{ $status['label'] }}</span>
                                                                                <p class="dot-label dot-label-date">
                                                                                    {{ $date ? $date : '' }}
                                                                                </p>

                                                                                @if ($status['value'] == $previousStatus && $isCancelled)
                                                                                    <div class="cancelled">
                                                                                        <hr
                                                                                            class="flex-fill track-line track-cancelled">
                                                                                        <span class="dot dot-cancelled"></span>
                                                                                        <span
                                                                                            class="dot-label-cancelled">Cancelled</span>
                                                                                        <p class="dot-label-cancelled-date">
                                                                                            {{ $cancelDate ? $cancelDate : '' }}
                                                                                        </p>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            <hr
                                                                                class="flex-fill track-line {{ $isTrackCompleted ? 'dot-completed' : '' }}">
                                                                        @break

                                                                        @case(6)
                                                                            <div class="dot-container">
                                                                                <span
                                                                                    class="big-dot dot {{ $isCompleted ? 'dot-completed' : '' }}">
                                                                                    <i class="fas fa-box"
                                                                                        style="{{ $isCompleted ? 'color:#007965' : 'color:#ffffff' }}"></i></span>
                                                                                <span
                                                                                    class="dot-label">{{ $status['label'] }}</span>
                                                                                <p class="dot-label dot-label-date">
                                                                                    {{ $date ? $date : '' }}
                                                                                </p>

                                                                                @if ($status['value'] == $previousStatus && $isCancelled)
                                                                                    <div class="cancelled">
                                                                                        <hr
                                                                                            class="flex-fill track-line track-cancelled">
                                                                                        <span class="dot dot-cancelled"></span>
                                                                                        <span
                                                                                            class="dot-label-cancelled">Cancelled</span>
                                                                                        <p class="dot-label-cancelled-date">
                                                                                            {{ $cancelDate ? $cancelDate : '' }}
                                                                                        </p>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            <hr
                                                                                class="flex-fill track-line {{ $isTrackCompleted ? 'dot-completed' : '' }}">
                                                                        @break

                                                                        @case(8)
                                                                            <div class="dot-container">
                                                                                <span
                                                                                    class="big-dot dot {{ $isCompleted ? 'dot-completed' : '' }}">
                                                                                    <i class="fas fa-truck"
                                                                                        style="{{ $isCompleted ? 'color:#007965' : 'color:#ffffff' }}"></i></span>
                                                                                <span
                                                                                    class="dot-label">{{ $status['label'] }}</span>
                                                                                <p class="dot-label dot-label-date">
                                                                                    {{ $date ? $date : '' }}
                                                                                </p>

                                                                                @if ($status['value'] == $previousStatus && $isCancelled)
                                                                                    <div class="cancelled">
                                                                                        <hr
                                                                                            class="flex-fill track-line track-cancelled">
                                                                                        <span class="dot dot-cancelled"></span>
                                                                                        <span
                                                                                            class="dot-label-cancelled">Cancelled</span>
                                                                                        <p class="dot-label-cancelled-date">
                                                                                            {{ $cancelDate ? $cancelDate : '' }}
                                                                                        </p>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            <hr
                                                                                class="flex-fill track-line {{ $isTrackCompleted ? 'dot-completed' : '' }}">
                                                                        @break

                                                                        @case(9)
                                                                            <div class="dot-container">
                                                                                <span
                                                                                    class="big-dot dot {{ $isDelivered ? 'dot-completed' : '' }}">
                                                                                    <i class="fa fa-box-open text-white"></i>
                                                                                </span>
                                                                                <span
                                                                                    class="big-dot-label dot-label">Delivered</span>
                                                                            </div>
                                                                        @break

                                                                        @default
                                                                    @endswitch
                                                                @endforeach
                                                            @endforeach
                                                        </div>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
@endif
                                </div>
                            </div>

                        </div>
                    </section>


                </div>
            </div>
        </div>
    </div>
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
