@extends('admin.Layout.layout')

@section('content')
    <style>
        #boqfence fieldset {
            border: 1px solid #ccc;
            padding: 0 8px;
            margin-bottom: 20px;
            border-radius: 5px;

        }

        #boqfence .form-group {
            margin-bottom: 0.5rem;
        }

        #boqfence .form-group label,
        #boqfence th,
        #boqfence td {
            font-size: 13px;
        }

        #boqfence legend {
            font-weight: bold;
            width: auto;
            padding: 0rem;
            font-size: 0.9rem;
        }

        #boqfence .table td,
        #boqfence .table th {
            padding: 5px 0;
            text-align: center;

        }

        #boqfence .form-control {
            padding: 0;
            text-align: center;
            font-size: 13px;
            height: calc(1.65rem + 2px);
            border: none;
        }

        /* input:-internal-autofill-selected {
            background-color: transparent !important;
        } */
    </style>

    <div class="content-wrapper" id="boqfence">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5>BOQ Fences Configurations- 2.5m Length</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">BOQ Fences Configurations-2.5m length</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <form action="javascript:;" method="POST" id="masterSheetFenceManufacturingForm">
                    @csrf

                    <div class="row">
                        <div class="col-12 ">
                            <p class="text-warning">* Fields whose values are derived from other field value are not
                                permitted to edit.</p>

                        </div>

                        <div class="col-12">
                            @php

                            @endphp
                            <fieldset>
                                <legend>Manufacturing Cost</legend>
                                <p id="invalid_no" style="display:none"></p>
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-bordered" id="materials">
                                            <thead>
                                                <tr>
                                                    <th>Article No</th>
                                                    <th>HS Code</th>
                                                    <th>Item Name</th>
                                                    <th>Length (cm)</th>
                                                    <th>No</th>
                                                    <th>Weight per cm (Kg)</th>
                                                    <th>Unit Price (€)</th>
                                                    <th>Specs</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($materials as $key => $item)
                                                    <tr data-id="{{ $item->id }}">

                                                        <td>
                                                            <input type="hidden" name="boqconfigid" id="boqconfigid"
                                                                value="{{ $item ? $item->boq_config_id : '' }}" required>
                                                            {{-- <input type="hidden" name="id" id="id"
                                                                value="{{ $item ? $item->id : '' }}" required> --}}
                                                            <div class="form-group">
                                                                <input type="text"
                                                                    name="manufacturing[{{ strtolower($item->id) }}][code]"
                                                                    class="form-control manufacturing-input"
                                                                    value="{{ $item ? $item->code : '' }}"
                                                                    id="manufacturing_code_{{ $item->id }}" readonly>
                                                            </div>

                                                        </td>

                                                        <td>

                                                            <div class="form-group">

                                                                <input type="text"
                                                                    name="manufacturing[{{ strtolower($item->id) }}][name]"
                                                                    class="form-control manufacturing-input"
                                                                    value="{{ ucfirst($item->name) }}" readonly>
                                                            </div>
                                                        </td>
                                                        <td>

                                                            <div class="form-group">

                                                                <input type="text"
                                                                    name="manufacturing[{{ strtolower($item->id) }}][cost_per_unit]"
                                                                    class="form-control manufacturing-input"
                                                                    value="{{ $item ? $item->cost_per_unit : '' }}" required
                                                                    readonly>

                                                            </div>

                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger delete-Fence-Manufacturing-Button" id=""  data-id="{{ $item->id }}">    Delete</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </fieldset>


                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="button" class="btn btn-warning"
                                        id="edit-Fence-Manufacturing-Button">Edit</button>
                                    <button type="submit" class="btn btn-primary"
                                        id="update-Fence-Manufacturing-Button">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary" id="addRowButton">Add Row</button>
                            <fieldset>
                                <legend>Add Manufacturing </legend>
                                <p id="invalid_no" style="display:none"></p>
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-bordered" id="manufacturingTable">
                                            <thead>
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Name</th>
                                                    <th>Cost per Unit</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Existing rows go here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@section('jscript')
    <!-- DataTables & Plugins -->
    <script src="{{ asset('admin/js/mastersheet-fence-manufacturing.js') }}"></script>
@endsection
