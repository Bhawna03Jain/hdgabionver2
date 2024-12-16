<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="icon" type="image/x-icon" sizes="40x40" href="{{ asset('images/logo/favicon-40x40.svg') }} "> --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo/favicon-40x40.svg') }}">
    {{-- <link rel="icon" type="image/x-icon" sizes="40x40" href="https://hd-gabion.eu/images/logo/favicon-40x40.svg "> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HD Gabion | Dashboard</title>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{url('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

     <!-- DataTables -->
  {{-- <link rel="stylesheet" href="{{ url('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}"> --}}
 <!-- DataTables -->
 {{-- <link rel="stylesheet" href="{{ url('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ url('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ url('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}"> --}}

  {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css"> --}}
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css"> --}}
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap4.css"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('admin/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ url('admin/plugins/dropzone/min/dropzone.min.css') }}">

    {{-- <link rel="stylesheet" href="{{url('admin/plugins/summernote/summernote-bs4.min.css')}}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Select2 -->
    {{-- <link rel="stylesheet" href="{{url('admin/plugins/select2/css/select2.min.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{url('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('admin/css/backend.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    @yield('style');
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="" src="{{ asset('images/loader/loading.gif') }}" alt="AdminLTELogo" height="60"
            width="60">
    </div>
    <div id="loader" style="display: none;">
        <div class="spinner"></div>
    </div>
    <div class="wrapper">

        <!-- Preloader -->


        @include('admin.Layout.header')
        @include('admin.Layout.sidebar')


        @yield('content')


        <!-- REQUIRED SCRIPTS -->
        {{-- @vite(['resources/js/app.js']) --}}
        <!-- jQuery -->
     <!-- jQuery -->
     {{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}
<script src="{{ url('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap4.js"></script> --}}
<script src="{{ url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
{{-- <!-- DataTables  & Plugins --> --}}
<script src="{{ url('admin/js/adminlte.min.js') }}"></script>
        <script src="{{url('admin/js/demo.js')}}"></script>
<script src="{{ url('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
{{-- <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap4.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script> --}}
<script src="{{ url('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
{{-- <script src="{{ url('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script> --}}
{{-- <script src="{{ url('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script> --}}
{{-- <script src="{{ url('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script> --}}
{{-- <script src="{{ url('admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ url('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ url('admin/plugins/pdfmake/vfs_fonts.js') }}"></script> --}}
{{-- <script src="{{ url('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script> --}}
{{-- <script src="{{ url('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script> --}}
<!-- AdminLTE App -->
{{-- <script src="../../dist/js/adminlte.min.js?v=3.2.0"></script> --}}
        <!-- AdminLTE for demo purposes -->

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        {{-- <script src="{{url('admin/js/pages/dashboard2.js')}}"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        {{-- <script src="{{ url('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script> --}}


        <!-- DataTables  & Plugins -->
{{-- <script src=""></script> --}}
        {{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap4.js"></script> --}}
{{--

<script src="{{ url('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>

<script src="{{ url('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

<script src="{{ url('admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ url('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ url('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script> --}}
        <!-- Summernote -->
        <script src="{{ url('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <script src="{{ url('admin/plugins/dropzone/min/dropzone.min.js') }}"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/url-search-params/1.1.0/url-search-params.js"
            integrity="sha512-XITCo00srdVr9XH7ep5JEijPPpLA60TqvvoqLCyQlIdctLUjEsIRCtlgSaoj+RbsF+e/YnkaRTV/7Ei5GvVylg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/url-search-params-polyfill/7.0.1/url-search-params.min.js"></script> --}}
        {{-- <script src= "{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script> --}}

        <script src="{{ url('admin/js/functions.js') }}"></script>
        <script>
            $(function() {
                // Summernote
                $('#summernote').summernote({
                    toolbar: [
                        // [groupName, [list of button]]
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline', 'clear', 'strikethrough', 'superscript',
                            'subscript'
                        ]],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ['view', ['fullscreen', 'help']],
                    ]
                });

                // CodeMirror
                //   CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                //     mode: "htmlmixed",
                //     theme: "monokai"
                //   });
            })
        </script>
        <script>
            // Configure Toastr options globally
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right", // Position of the notification
                "timeOut": "3000" // Duration in milliseconds
            };

            // Get all elements with the class 'disabled-link'
            const disabledLinks = document.getElementsByClassName("disabled-link");

            // Loop through each link and add the event listener to prevent the default behavior
            for (let i = 0; i < disabledLinks.length; i++) {
                disabledLinks[i].addEventListener("click", function(event) {
                    event.preventDefault(); // Prevents the link from navigating
                    // Show a toastr warning
                    toastr.warning("This link is For Super Admin Only.");
                });
            }

            // Get all elements with the class 'later-use-link'
            const laterUseLinks = document.getElementsByClassName("later-use-link");

            // Loop through each link and add the event listener to prevent the default behavior
            for (let i = 0; i < laterUseLinks.length; i++) {
                laterUseLinks[i].addEventListener("click", function(event) {
                    event.preventDefault(); // Prevents the link from navigating
                    // Show a toastr info message
                    toastr.info("This link will be activated Later.");
                });
            }
        </script>
        {{-- <script>
            // DropzoneJS Demo Code Start
            Dropzone.autoDiscover = false

            // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
            var previewNode = document.querySelector("#template")
            previewNode.id = ""
            var previewTemplate = previewNode.parentNode.innerHTML
            previewNode.parentNode.removeChild(previewNode)

            var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
                url: "/target-url", // Set the url
                thumbnailWidth: 80,
                thumbnailHeight: 80,
                parallelUploads: 20,
                previewTemplate: previewTemplate,
                autoQueue: false, // Make sure the files aren't queued until manually added
                previewsContainer: "#previews", // Define the container to display the previews
                clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
            })

            myDropzone.on("addedfile", function(file) {
                // Hookup the start button
                file.previewElement.querySelector(".start").onclick = function() {
                    myDropzone.enqueueFile(file)
                }
            })

            // Update the total progress bar
            myDropzone.on("totaluploadprogress", function(progress) {
                document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
            })

            myDropzone.on("sending", function(file) {
                // Show the total progress bar when upload starts
                document.querySelector("#total-progress").style.opacity = "1"
                // And disable the start button
                file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
            })

            // Hide the total progress bar when nothing's uploading anymore
            myDropzone.on("queuecomplete", function(progress) {
                document.querySelector("#total-progress").style.opacity = "0"
            })

            // Setup the buttons for all transfers
            // The "add files" button doesn't need to be setup because the config
            // `clickable` has already been specified.
            document.querySelector("#actions .start").onclick = function() {
                myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
            }
            document.querySelector("#actions .cancel").onclick = function() {
                myDropzone.removeAllFiles(true)
            }
            // DropzoneJS Demo Code End
        </script> --}}
        @yield('jscript');

        <!-- Custom.Js -->
        {{-- <script src="{{url('admin/js/custom.js')}}"></script> --}}
</body>

</html>