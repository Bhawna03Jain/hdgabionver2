@extends('admin.Layout.layout')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Currencies</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Currencies</li>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createCurrencyModal">
                            Create Currency
                        </button>
                        <div class="card-body table-responsive">
                            <table id="currencies" class="table table-bordered table-striped  text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Currency Code</th>
                                        <th>Currency Name</th>
                                        <th>Currency Symbol</th>
                                        <th>Base Currency</th>
                                        {{-- <th>Created At</th>
                                        <th>Updated At</th> --}}
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($currencies as $currency)
                                        <tr>
                                            <td>{{ $currency->id }}</td>
                                            <td>{{ $currency->currency_code }}</td>
                                            <td>{{ $currency->currency_name }}</td>
                                            <td>{{ $currency->currency_symbol ?? '-' }}</td>
                                            <td>{{ $currency->is_base_currency ? 'Yes' : 'No' }}</td>
                                            {{-- <td>{{ $currency->created_at->format('F j, Y') }}</td>
                                            <td>{{ $currency->updated_at->format('F j, Y') }}</td> --}}

                                            {{-- *************No need to edit (Only Add New Currebncy)************ --}}
                                            {{-- <td>
                                                <a href="javascript:void(0)" class="text-warning edit-currency-btn" data-id="{{ $currency->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td> --}}
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8">No Currency found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- Modal for Creating a Currency -->
                        <div class="modal fade" id="createCurrencyModal" tabindex="-1" role="dialog" aria-labelledby="createCurrencyModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form id="currencyCreateForm" method="POST" action="javascript:void(0);">@csrf
                                        @method('POST')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="createCurrencyModalLabel">Currency</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id" id="id">
                                            <div class="form-group">
                                                <label for="currency_code">Currency Code</label>
                                                <select class="form-control" id="currency_code" name="currency_code" onchange="updateCurrencyCode()">
                                                    <option value="">Select a currency</option>
                                                    @foreach ($currencies_intl as $code => $name)
                                                        <option value="{{ $code }}" data-name="{{ $name }}" data-symbol="{{ Symfony\Component\Intl\Currencies::getSymbol($code) }}">{{ $code }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger reset-currency_code"></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="currency_name">Currency Name</label>
                                                <input type="text" class="form-control" id="currency_name" name="currency_name" placeholder="Enter currency name" readonly>
                                                <span class="text-danger update-currency_name"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="currency_symbol">Currency Symbol</label>
                                                <input type="text" class="form-control" id="currency_symbol" name="currency_symbol" placeholder="Enter currency symbol (optional)" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="base_currency">Base Currency</label>
                                                <input type="text" class="form-control" id="base_currency" value="{{ $basecurrency->currency_name }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="is_base_currency">Is Base Currency</label>
                                                <input type="checkbox" id="is_base_currency" name="is_base_currency" disabled>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" id="save-currency-btn">Save</button>
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
    {{-- <script src="{{ url('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script> --}}
    {{-- <script src="{{ url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script> --}}
    {{-- <script src="{{ url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/url-search-params/1.1.0/url-search-params.js" integrity="sha512-XITCo00srdVr9XH7ep5JEijPPpLA60TqvvoqLCyQlIdctLUjEsIRCtlgSaoj+RbsF+e/YnkaRTV/7Ei5GvVylg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script>
        $(function() {
            $("#currencies").DataTable();
        });
    </script>
    <script src="{{ asset('admin/js/currency.js') }}"></script>
@endsection
