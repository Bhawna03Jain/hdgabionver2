<!-- ==========Sample 1 Template ========== -->

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" sizes="40x40" href="{{ asset('images/logo/favicon-40x40.svg') }} ">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <title> Home-HD Gabion
    </title>
    <!-- ========== Bootstrap ========== -->
    <link rel="stylesheet" href="{{ asset('front/css/normalization.css') }}">

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- ==========Font awesome ========== -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/24.6.0/build/css/intlTelInput.min.css" />

    <!-- ========== Owl Carousel ========== -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- ========== Animate.css ========== -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css">
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

    {{-- <link rel="stylesheet" href="{{ asset('front/css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/footer.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('front/css/front.css') }}"> --}}

    {{-- <link rel="stylesheet" href="css/normalization.css"> --}}
    <link rel="stylesheet" href="{{ asset('front/css/common.css')}}">
    <link rel="stylesheet" href="{{ asset('front/css/header.css')}}">
    <link rel="stylesheet" href="{{ asset('front/css/footer.css')}}">


    {{-- <link rel="stylesheet" href="{{ asset('front/css/home-carousel.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('front/css/square-moving-background.css')}}"> --}}


    <link rel="stylesheet" href="{{ asset('front/css/home.css')}}">
<link rel="stylesheet" href="{{ asset('front/css/product_filter.css')}}">
    @yield('style')

    <style>

    </style>
</head>

<body>
    <!-- Loader HTML -->
    <div id="loader" style="display: none;">
        <div class="spinner"></div>
    </div>
    <!-- Loader -->
    {{-- <div class="loadingOverlayDrawing" id="loadingOverlayDrawing">
    <svg width="48" height="48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <mask id="a" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="9" y="3" width="32" height="42">
            <path d="M25 44a15 15 0 1 0 0-30 15 15 0 0 0 0 30Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="m18 8 3-4h8l3 4-7 6-7-6Z" fill="#555" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"/>
        </mask>
        <g mask="url(#a)">
            <path d="M0 0h48v48H0V0Z" fill="#fff"/>
        </g>
    </svg>
    <h1 style="font-size: 2.3rem;">HD-Gabion</h1>
    <h3>Loading 3D Experience...</h3>
    <br><br><br>
    <div class="progress"></div>
</div> --}}
    <!-- Full-page overlay with progress bar -->
    {{-- <div id="loadingOverlayDrawing">
    <svg width="48" height="48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <mask id="a" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="9" y="3" width="32" height="42">
            <path d="M25 44a15 15 0 1 0 0-30 15 15 0 0 0 0 30Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="m18 8 3-4h8l3 4-7 6-7-6Z" fill="#555" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"/>
        </mask>
        <g mask="url(#a)">
            <path d="M0 0h48v48H0V0Z" fill="#fff"/>
        </g>
    </svg>
    <h1 style="font-size: 2.3rem;">HD-Gabion</h1>
    <h3>Loading 3D Experience...</h3>
    <br><br><br>
    <div class="progress"></div>

</div> --}}
    {{-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="" src="{{asset('images/loader/loading.gif')}}" alt="AdminLTELogo" height="60" width="60">
      </div> --}}
    <!-- ========== Header  ========== -->

    @include('front.Layout.header')
    <!-- ========== Main Section ========== -->
    {{-- @include('front.Layout.home-carousel') --}}

    @yield('main-content')


    @include('front.Layout.footer');

    {{-- @vite(['resources/js/app.js']) --}}
    <!-- ========== Bootstrap ========== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- ========== Owl Carousel ========== -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/24.6.0/build/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/24.6.0/build/js/utils.js"></script>


    <script src="{{ asset('front/js/custom.js') }}"></script>
    <script src="{{ asset('admin/js/functions.js') }}"></script>
    {{-- <script src="{{ asset('front/js/drawingLoader.js') }}"></script> --}}
  <script src="{{ asset('front/js/header.js') }}"></script>

    @yield('js')

</body>

</html>
