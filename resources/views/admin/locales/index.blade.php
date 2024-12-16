@extends('admin.Layout.layout')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Locales</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Locales</li>
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
                            <!-- Button to trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#createLocaleModal">
                                Create Locale
                            </button>
                            <div class="card-body table-responsive">
                                <table id="locales" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Locale Code</th>
                                            <th>Language</th>
                                            <th>Country</th>
                                            <th>Host Name</th>
                                            <th>Date Format</th>
                                            <th>Currency</th>
                                            <th>Timezone</th>
                                            <th>Direction</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($locales as $locale)
                                            <tr>
                                                <td>{{ $locale->id }}</td>
                                                <td>{{ $locale->locale_code }}</td>
                                                <td>{{ $locale->language }}</td>
                                                <td>{{ $locale->country->name ?? 'N/A' }}</td>
                                                <td>{{ $locale->hostname}}</td>
                                                <td>{{ $locale->date_format }}</td>
                                                <td>{{ $locale->currency->currency_name ?? 'N/A' }}</td>
                                                <td>{{ $locale->timezone }}</td>
                                                <td>{{ $locale->direction }}</td>

                                                <td>
                                                    <a href="javascript:void(0)" class="text-warning edit-locale-btn"
                                                        data-id="{{ $locale->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10">No Locales found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Modal for Creating a Locale -->
                            <div class="modal fade" id="createLocaleModal" tabindex="-1" role="dialog"
                                aria-labelledby="createLocaleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document"> <!-- Set modal size to large -->
                                    <div class="modal-content">
                                        <form id="localeCreateForm" method="POST" action="javascript:void(0);"
                                            enctype="multipart/form-data">@csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="createLocaleModalLabel">Create Locale</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row"> <!-- Start a new row for the grid -->
                                                    <div class="col-md-6"> <!-- First column -->
                                                        <input type="hidden" name="id" id="id">
                                                        <div class="form-group">
                                                            <label for="locale_code">Locale Code</label>
                                                            <input type="text" class="form-control" id="locale_code"
                                                                name="locale_code" readonly>
                                                        </div>
                                                        <p class="reset-locale_code"></p>
                                                        <div class="form-group">
                                                            <label for="country_id">Country</label>
                                                            <select class="form-control" id="country" name="country">
                                                                @foreach ($countries as $country)
                                                                    @php
                                                                        // Only proceed if the country code is valid (and not 'EU')
                                                                        $timezones = '';
                                                                        $timezonesString = '';

                                                                        if ($country->code !== 'EU') {
                                                                            $timezones = \Symfony\Component\Intl\Timezones::forCountryCode(
                                                                                $country->code,
                                                                            );
                                                                            $timezonesString = implode('|', $timezones); // Convert array to string for data attribute
                                                                        } else {
                                                                            // Fallback timezone or handle 'EU' separately
                                                                            $timezone = 'UTC'; // You can define your own default
                                                                            $timezonesString = $timezone;
                                                                        }

                                                                    @endphp
                                                                    <option value="{{ $country->code }}"
                                                                        data-timezones="{{ $timezonesString }}">
                                                                        {{ $country->name }}
                                                                       </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <p class="reset-country"></p>
{{--
                                                        <div class="form-group">
                                                            <label for="date_format">Date Format</label>
                                                            <input type="text" class="form-control" id="date_format"
                                                                name="date_format">
                                                        </div> --}}
                                                        <div class="form-group">
                                                            <label for="date_format">Date Format</label>
                                                            <select class="form-control" id="date_format" name="date_format">
                                                                @foreach ($date_formats as $code=>$date_format)
                                                                {{-- {{ $date_format }} --}}
                                                                    <option value="{{ $code }}" data-code={{ $code }}>
                                                                        {{ $date_format['date_format'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <p class="reset-date_format"></p>
                                                        <div class="form-group">
                                                            <label for="currency_id">Hostname</label>
                                                            <select class="form-control" id="hostname" name="hostname">
                                                                @foreach ($hostnames as $hostname)
                                                                    <option value="{{ $hostname['name'] }}"
                                                                        data-code="{{ $hostname['code'] }}">
                                                                        {{ $hostname['name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <p class="reset-hostname"></p>
                                                        {{-- <div class="form-group">
                                                            <label for="logo">Logo Upload</label>
                                                            <input type="file" class="form-control" id="logo"
                                                                name="logo" accept="image/*">
                                                        </div> --}}
                                                    </div>
                                                    <div class="col-md-6"> <!-- Second column -->

                                                        <div class="form-group">
                                                            <label for="currency_id">Currency</label>
                                                            <select class="form-control" id="currency_id"
                                                                name="currency_id">
                                                                @foreach ($currencies as $currency)
                                                                    <option value="{{ $currency->id }}">
                                                                        {{ $currency->currency_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <p class="reset-currency_id"></p>
                                                        <div class="form-group">
                                                            <label for="currency_id">Language</label>
                                                            <select class="form-control" id="language" name="language">
                                                                @foreach ($languages as $language)
                                                                {{-- {{ $language }} --}}
                                                                    <option value="{{ $language['code'] }}">
                                                                        {{ $language['name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <p class="reset-language"></p>
                                                        <!-- Timezone dropdown -->
                                                        <div class="form-group">
                                                            <label for="timezone">Timezone</label>
                                                            <select class="form-control" id="timezone" name="timezone">
                                                                <!-- Timezones will be dynamically populated here -->
                                                            </select>
                                                        </div>
                                                        <p class="reset-timezone"></p>
                                                        {{-- <div class="form-group">
                                                        <label for="timezone">Timezone</label>
                                                        <input type="text" class="form-control" id="timezone" name="timezone">
                                                    </div> --}}
                                                        <div class="form-group">
                                                            <label for="direction">Text Direction</label>
                                                            <select class="form-control" id="direction" name="direction">
                                                                <option value="ltr">Left to Right</option>
                                                                <option value="rtl">Right to Left</option>
                                                            </select>
                                                        </div>
                                                        <p class="reset-direction"></p>
                                                        {{-- <div class="form-group">
                                                            <label for="favicon">Favicon Upload</label>
                                                            <input type="file" class="form-control" id="favicon"
                                                                name="favicon" accept="image/*">
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary"
                                                    id="save-locale-btn">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('jscript')
<script src="{{ url('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/url-search-params/1.1.0/url-search-params.js" integrity="sha512-XITCo00srdVr9XH7ep5JEijPPpLA60TqvvoqLCyQlIdctLUjEsIRCtlgSaoj+RbsF+e/YnkaRTV/7Ei5GvVylg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // $(function() {
            $("#locales").DataTable();
        // });
        // $(function() {
        //         $("#locales").DataTable({
        //             "responsive": true,
        //             "lengthChange": false,
        //             "autoWidth": false,
        //             "paging": true,

        //             "searching": false,
        //             "ordering": true,
        //             "info": true,

        //             "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        //         }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        //     });
    </script>
      <script src="{{ asset('admin/js/locale.js') }}"></script>
@endsection
