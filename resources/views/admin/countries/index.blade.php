@extends('admin.Layout.layout')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Countries</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Countries</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            {{-- <div class="card-header d-flex">
                            <a href="{{ route('countries.create') }}" class="btn btn-primary" style="margin-left: auto;">Create Country</a>
                        </div> --}}
                            <!-- Button to trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#createCountryModal">
                                Create Country
                            </button>
                            <div class="card-body table-responsive">
                                <table id="countries" class="table table-bordered table-striped  text-center">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Country Code</th>
                                            <th>Country Name</th>
                                            {{-- <th>Created At</th>
                                            <th>Updated At</th> --}}
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($countries as $country)
                                            <tr>
                                                <td>{{ $country->id }}</td>
                                                <td>{{ $country->code }}</td>
                                                <td>{{ $country->name }}</td>
                                                {{-- <td>{{ $country->created_at->format('F j, Y') }}</td>
                                                <td>{{ $country->updated_at->format('F j, Y') }}</td> --}}
                                                {{-- <td> --}}
                                                    {{-- <a href="{{ route('countries.edit', $country->id) }}" class="text-warning"><i class="fas fa-edit"></i></a> --}}
                                                    {{-- <a href="javascript:void(0)" class="confirmDelete text-danger" record="countries" recordid="{{ $country->id }}">
                                                    <i class="fas fa-trash ml-2"></i>
                                                </a> --}}
                                                    {{-- <a href="javascript:void(0)" class="text-warning edit-country-btn"
                                                        data-id="{{ $country->id }}"><i class="fas fa-edit"></i></a> --}}

                                                {{-- </td> --}}
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">No Country found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- Modal for Creating a Country -->
                            <div class="modal fade" id="createCountryModal" tabindex="-1" role="dialog"
                                aria-labelledby="createCountryModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form id="countryCreateForm" method="POST" action="javascript:void(0);">@csrf
                                            @method('POST')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="createCountryModalLabel">Country</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Country Code Input -->
                                                <input type="hidden" name="id" id="id">
                                                <div class="form-group">
                                                    <label for="country">Select Country</label>
                                                    <select class="form-control" id="country_name" name="country_name">
                                                        <option value="">Select a country</option>
                                                        @foreach ($countries_intl as $code => $name)
                                                        @php
                                                            // Only proceed if the country code is valid (and not 'EU')
                                                            $timezones = '';
                                                            $timezonesString = '';

                                                            if ($code !== 'EU') {
                                                                $timezones = \Symfony\Component\Intl\Timezones::forCountryCode(
                                                                    $code,
                                                                );
                                                                $timezonesString = implode('|', $timezones); // Convert array to string for data attribute
                                                            } else {
                                                                // Fallback timezone or handle 'EU' separately
                                                                $timezone = 'UTC'; // You can define your own default
                                                                $timezonesString = $timezone;
                                                            }

                                                        @endphp
                                                        <option value="{{ $name }}" data-code="{{ $code }}"
                                                            data-timezones="{{ $timezonesString }}">
                                                            {{ $name }}
                                                           </option>
                                                    @endforeach
                                                        {{-- @foreach ($countries_intl as $code => $name) --}}
                                                            {{-- <option value="{{ $name }}" data-code="{{ $code }}">{{ $name }}</option>
                                                        @endforeach --}}
                                                    </select>
                                                    <span class="text-danger update-code"></span>
                                                    <p class="reset-country_name"></p>
                                                </div>
                                                <p class="reset-code"></p>
                                                <!-- Country Name Input -->
                                                <div class="form-group">
                                                    <label for="name">Country Code</label>
                                                    <input type="text" class="form-control" id="country_code" name="country_code"
                                                        placeholder="Enter country Code" readonly>
                                                    <span class="text-danger update-name"></span>
                                                </div>
                                                <p class="reset-country_code"></p>
                                                <input type="hidden" name="timezone" id="timezone">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" id="">Save</button>
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
    {{-- @include('admin.Layout.footer') --}}
@endsection
@section('jscript')
    <script src="{{ url('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/url-search-params-polyfill/7.0.1/url-search-params.min.js"></script>


    <script>
        $(function() {
            $("#countries").DataTable({

            });
        });
    </script>
    <script src="{{ asset('admin/js/country.js') }}"></script>
@endsection
