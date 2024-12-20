@extends('admin.Layout.layout')

@section('content')
    <style>
        #boqallmarginfactors fieldset {
            border: 1px solid #ccc;
            padding: 0 8px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        #boqallmarginfactors .form-group {
            margin-bottom: 0.5rem;
        }

        #boqallmarginfactors .form-group label,
        #boqallmarginfactors th,
        #boqallmarginfactors td {
            font-size: 13px;
        }

        #boqallmarginfactors legend {
            font-weight: bold;
            width: auto;
            padding: 0rem;
            font-size: 0.9rem;
        }

        #boqallmarginfactors .table td,
        #boqallmarginfactors .table th {
            padding: 5px 0;
            text-align: center;
        }

        #boqallmarginfactors .form-control {
            padding: 0;
            text-align: center;
            font-size: 13px;
            height: calc(1.65rem + 2px);
            border: none;
        }
    </style>

    <div class="content-wrapper" id="boqallmarginfactors">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5>All Margin Factor Configurations</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Margin Factor Configurations</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <form action="javascript:;" method="POST" id="masterSheetAllMarginFactorsForm">
                    @csrf

                    <div class="row">
                        <div class="col-12">
                            <p class="text-warning">* Fields whose values are derived from other field values are not
                                permitted to edit.</p>
                        </div>

                        <div class="col-12">
                            {{-- <fieldset>
                                <legend>Basic Margin Factor</legend>
                                <p id="invalid_no" style="display:none"></p>
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-bordered" id="margin_factors">
                                            <thead>
                                                <tr>
                                                    <th>Country</th>
                                                    <th>Margin Factor</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <input type="hidden" name="boqconfigid" id="boqconfigid"
                                                        value="{{ $boqConfig->id ?? '' }}">

                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" name="margin_factors[0][country_name]"
                                                                class="form-control margin-factor-input" value="Europe"
                                                                required readonly>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" name="margin_factors[0][margin_factor]"
                                                                class="form-control editable-field margin-factor-input"
                                                                value="{{ $country_margin_factors[0]->margin_factor }}"
                                                                required readonly>
                                                        </div>
                                                    </td>


                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </fieldset> --}}
                            <fieldset>
                                <legend>Country Based Margin Factors</legend>
                                <p id="invalid_no" style="display:none"></p>
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-bordered" id="margin_factors">
                                            <thead>
                                                <tr>
                                                    <th>Country</th>
                                                    <th>Margin Factor</th>
                                                    <th>Discount Percentage</th>
                                                    {{-- <th>Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>

                                                {{-- @forelse ($country_margin_factors as $key => $item) --}}
                                                @forelse ($countries as $key => $item)
                                                {{-- {{ $item->marginFactors}} --}}
                                                    <input type="hidden"
                                                        name="margin_factors[{{ strtolower($item->id) }}][id]"
                                                        id="id"
                                                        value="{{ $item->marginFactors ? $item->marginFactors->id : '' }}">
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="text"
                                                                    name="margin_factors[{{ strtolower($item->id) }}][country_name]"
                                                                    class="form-control margin-factor-input"
                                                                    value=" {{ $item->name }}" required readonly>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number"
                                                                    name="margin_factors[{{ strtolower($item->id) }}][margin_factor]"
                                                                    class="form-control margin-factor-input editable-field"
                                                                    value="{{ $item->marginFactors ? $item->marginFactors->margin_factor : '' }}"
                                                                    required readonly>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number"
                                                                    name="margin_factors[{{ strtolower($item->id) }}][discount_per]"
                                                                    class="form-control editable-field margin-factor-input"
                                                                    value="{{ $item->marginFactors ? $item->marginFactors->discount_per : '' }}"
                                                                    required readonly>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    {{-- {{-- <tr data-id="{{ $item->id }}"> --}}

                                                    {{-- <td>
                                                            <div class="form-group">
                                                                <select name="margin_factors[{{ strtolower($item->country->code) }}][country_id]" class="form-control" readonly>
                                                                    @foreach ($countries as $country)
                                                                        <option value="{{ $country->id }}" {{ $country->id == $item->country_id ? 'selected' : '' }} disabled>
                                                                            {{ $country->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </td> --}}

                                                    {{-- <td>
                                                            <div class="form-group">
                                                                <input type="text" name="margin_factors[{{ strtolower($item->country->code) }}][margin_factor]" class="form-control margin-factor-input"
                                                                    value=" {{ $item->country->name }}" required readonly>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" name="margin_factors[{{ strtolower($item->country->code) }}][margin_factor]" class="form-control margin-factor-input"
                                                                    value="{{ $item->margin_factor }}" required readonly>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="number" name="margin_factors[{{ strtolower($item->country->code) }}][margin_factor]" class="form-control margin-factor-input"
                                                                    value="{{ $item->discount_per }}" required readonly>
                                                            </div>
                                                        </td> --}}
                                                    </tr>
                                                    {{-- <td>
                                                            <button type="button" class="btn btn-danger delete-margin-factor-button" data-id="{{ $item->id }}">
                                                                Delete
                                                            </button>
                                                        </td> --}}
                                                    {{-- <tr>
                                                            <td colspan="3">For Future Use</td>
                                                        </tr> --}}
                                                    {{-- </tr>  --}}
                                                @empty
                                                    <tr>
                                                        <td colspan="3">No quote found.</td>
                                                    </tr>
                                                @endforelse

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="button" class="btn btn-warning"
                                        id="edit-margin-factor-button">Edit</button>
                                    <button type="submit" class="btn btn-primary"
                                        id="update-margin-factor-button">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- ===================Added In Future For Discount Margin Mased on Country============== --}}
                    {{-- <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary" id="add-row-margin-factor-button">Add Row</button>
                            <fieldset>
                                <legend>Add Margin Factor</legend>
                                <p id="invalid_no" style="display:none"></p>
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-bordered" id="new-margin-factor-table">
                                            <thead>
                                                <tr>
                                                    <th>Country</th>
                                                    <th>Margin Factor (%)</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Existing rows will go here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div> --}}

                    {{-- ===================End Added In Future For Discount Margin Mased on Country==============  --}}

                </form>
            </div>
        </section>
    </div>
@endsection

@section('jscript')
    <!-- DataTables & Plugins -->
    <script src="{{ asset('admin/js/mastersheet-boq-all-marginfactors.js') }}"></script>
@endsection
