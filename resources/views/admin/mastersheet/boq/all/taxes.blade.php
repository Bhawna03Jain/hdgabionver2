@extends('admin.Layout.layout')

@section('content')
    <style>
        #boqalltaxes fieldset {
            border: 1px solid #ccc;
            padding: 0 8px;
            margin-bottom: 20px;
            border-radius: 5px;

        }

        #boqalltaxes .form-group {
            margin-bottom: 0.5rem;
        }

        #boqalltaxes .form-group label,
        #boqalltaxes th,
        #boqalltaxes td {
            font-size: 13px;
        }

        #boqalltaxes legend {
            font-weight: bold;
            width: auto;
            padding: 0rem;
            font-size: 0.9rem;
        }

        #boqalltaxes .table td,
        #boqalltaxes .table th {
            padding: 5px 0;
            text-align: center;

        }

        #boqalltaxes .form-control {
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

    <div class="content-wrapper" id="boqalltaxes">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5>Taxes Configurations</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Taxes Configurations</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <form action="javascript:;" method="POST" id="masterSheetAllTaxesForm">
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
                                {{-- <legend>Taxes Cost</legend> --}}
                                <p id="invalid_no" style="display:none"></p>
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-bordered" id="taxes">
                                            <thead>
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Name</th>
                                                    <th>Percentage (%) </th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($taxes as $key => $item)
                                                    <tr data-id="{{ $item->id }}">

                                                        <td>
                                                            <input type="hidden" name="boqconfigid" id="boqconfigid"
                                                                value="{{ $item ? $item->boq_config_id : '' }}" required>
                                                            {{-- <input type="hidden" name="id" id="id"
                                                                value="{{ $item ? $item->id : '' }}" required> --}}
                                                            <div class="form-group">
                                                                <input type="text"
                                                                    name="taxes[{{ strtolower($item->id) }}][code]"
                                                                    class="form-control taxes-input editable-field"
                                                                    value="{{ $item ? $item->code : '' }}"
                                                                    id="taxes_code_{{ $item->id }}" readonly>
                                                            </div>

                                                        </td>

                                                        <td>

                                                            <div class="form-group">

                                                                <input type="text"
                                                                    name="taxes[{{ strtolower($item->id) }}][name]"
                                                                    class="form-control taxes-input editable-field"
                                                                    value="{{ ucfirst($item->name) }}" readonly>
                                                            </div>

                                                        </td>

                                                        <td>

                                                            <div class="form-group">

                                                                <input type="number"
                                                                    name="taxes[{{ strtolower($item->id) }}][percentage]"
                                                                    class="form-control taxes-input editable-field"
                                                                    value="{{ $item ? $item->percentage : '' }}" required
                                                                    readonly>

                                                            </div>

                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger delete-All-taxes-Button" id=""  data-id="{{ $item->id }}">    Delete</button>
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
                                        id="edit-all-taxes-Button">Edit</button>
                                    <button type="submit" class="btn btn-primary"
                                        id="update-all-taxes-Button">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary" id="addRowButton">Add Row</button>
                            <fieldset>
                                <legend>Add taxes </legend>
                                <p id="invalid_no" style="display:none"></p>
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-bordered" id="taxesTable">
                                            <thead>
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Name</th>
                                                    <th>Percentage (%)</th>
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
<script>
    $("#taxes").DataTable({
                     "lengthChange": true,
                     "autoWidth": true,
                     "paging": true,
                     "searching": true,
                     "ordering": true,
                     "info": true,
                     "buttons": ["excel", "pdf", "colvis"]
                    //  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                 }).buttons().container().appendTo('#taxes_wrapper .col-md-6:eq(0)');

  </script>
  <script>
    $("#taxesTable").DataTable({
                     "lengthChange": true,
                     "autoWidth": true,
                     "paging": true,
                     "searching": true,
                     "ordering": true,
                     "info": true,
                    //  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                 });
                //  .buttons().container().appendTo('#taxesTable_wrapper .col-md-6:eq(0)');

  </script>
    <!-- DataTables & Plugins -->
    <script src="{{ asset('admin/js/mastersheet-boq-all-taxes.js') }}"></script>
@endsection
