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
            /* height: calc(1.65rem + 2px); */
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
                        <h5>BOQ Fences-Materials</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">BOQ Fences- Materials</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <form action="javascript:;" method="POST" id="masterSheetFenceMaterialForm">
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
                                <legend>Material Cost</legend>
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
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($commonmaterials as $key => $item)
                                                <tr data-id="{{ $item->id }}">
                                                    <input type="hidden" name="boqconfigid" id="boqconfigid" value="{{ $item->boq_config_id ?? '' }}" required>
                                                    <input type="hidden" name="item_code" id="item_code" value="{{ $item->item_code ?? '' }}" required>

                                                    <!-- Article No -->
                                                    <td>
                                                        <textarea name="material_configs[{{ $item->id }}][{{ $item->item_code }}][article_no]"
                                                                  class="form-control editable-field" readonly
                                                                 required >{{ $item->article_no ?? '' }}</textarea>
                                                    </td>

                                                    <!-- HS Code -->
                                                    <td>
                                                        <textarea name="material_configs[{{ $item->id }}][{{ $item->item_code }}][hs_code]"
                                                                  class="form-control editable-field" readonly>{{ $item->hs_code ?? '' }}</textarea>
                                                    </td>

                                                    <!-- Item Name -->
                                                    <td>
                                                        <textarea name="material_configs[{{ $item->id }}][{{ $item->item_code }}][item_name]"
                                                                  class="form-control editable-field" readonly required >{{ $item->item_name ?? '' }}</textarea>
                                                    </td>

                                                    <!-- Length -->
                                                    <td>
                                                        @if (in_array($item->item_code, ['base_plate_on_c', 'channels', 'brackets']))
                                                            <input type="text" name="material_configs[{{ $item->id }}][{{ $item->item_code }}][length]"
                                                                   class="form-control editable-field" value="{{ $item->length ?? '' }}" readonly required >
                                                        @else
                                                            <input type="text" name="material_configs[{{ $item->id }}][{{ $item->item_code }}][length]"
                                                                   class="form-control" value="{{ $item->length ?? '' }}" readonly>
                                                        @endif
                                                    </td>


                                                    <!-- Number -->

                                                    <td>

                                                        <input type="number" size="4" name="material_configs[{{ $item->id }}][{{ $item->item_code }}][no]"
                                                               class="form-control {{ in_array($item->item_code, ['rods', 'poles_on_c', 'poles_in_c', 'polecovers', 'spacers', 'base_plate_on_c']) ? 'editable-field' : 'readonly' }}"
                                                               value="{{ $item->no ?$item->no: '' }}"
                                                               {{ in_array($item->item_code, ['rods', 'poles_on_c', 'poles_in_c', 'polecovers', 'spacers', 'base_plate_on_c']) ? '' : 'readonly' }} readonly  {{ in_array($item->item_code, ['rods', 'poles_on_c', 'poles_in_c', 'polecovers', 'spacers', 'base_plate_on_c']) ? 'required' : '' }}>
                                                    </td>

                                                    <!-- Weight per cm -->
                                                    <td>
                                                        <input type="number" step="0.00000001"
                                                               name="material_configs[{{ $item->id }}][{{ $item->item_code }}][weight_per_cm]"
                                                               class="form-control editable-field"
                                                               value="{{ $item->weight_per_cm ?? '' }}"
                                                               {{ in_array($item->item_code, ['rods', 'channels', 'poles_on_c', 'poles_in_c', 'base_plate_on_c', 'brackets', 'spacers']) ? '' : 'readonly' }}  {{ in_array($item->item_code, ['rods', 'channels', 'poles_on_c', 'poles_in_c', 'base_plate_on_c', 'brackets', 'spacers']) ? 'required' : '' }} readonly>
                                                    </td>

                                                    <!-- Unit Price -->
                                                    <td>
                                                        <input type="number" step="0.01"
                                                               name="material_configs[{{ $item->id }}][{{ $item->item_code }}][unit_price]"
                                                               class="form-control editable-field" value="{{ $item->unit_price ?? '' }}" readonly >
                                                    </td>

                                                    <!-- Specs -->
                                                    <td>
                                                        <textarea name="material_configs[{{ $item->id }}][{{ $item->item_code }}][specs]"
                                                                  class="form-control editable-field" readonly>{{ $item->specs ?? '' }}</textarea>
                                                    </td>

                                                    <!-- Actions -->
                                                    <td>
                                                        <button type="button" class="btn btn-danger delete-Fence-Material-Button m-3" data-id="{{ $item->id }}">
                                                            Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>


                            </fieldset>

{{--
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="button" class="btn btn-warning"
                                        id="edit-Fence-Material-Button">Edit</button>
                                    <button type="submit" class="btn btn-primary"
                                        id="update-Fence-Material-Button">Update</button>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 ">
                            <p class="text-warning">* Fields whose values are derived from other field value are not
                                permitted to edit.</p>

                        </div>

                        <div class="col-12">
                            @php

                            @endphp
                            <fieldset>
                                <legend>Extra Material</legend>
                                <p id="invalid_no" style="display:none"></p>
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-bordered" id="extramaterials">
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
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($extramaterials as $key => $item)
                                                <tr data-id="{{ $item->id }}">
                                                    <input type="hidden" name="boqconfigid" id="boqconfigid" value="{{ $item->boq_config_id ?? '' }}" required>
                                                    <input type="hidden" name="item_code" id="item_code" value="{{ $item->item_code ?? '' }}" required>

                                                    <!-- Article No -->
                                                    <td>
                                                        <textarea name="material_configs[{{ $item->id }}][{{ $item->item_code }}][article_no]"
                                                                  class="form-control editable-field" readonly
                                                                 required >{{ $item->article_no ?? '' }}</textarea>
                                                    </td>

                                                    <!-- HS Code -->
                                                    <td>
                                                        <textarea name="material_configs[{{ $item->id }}][{{ $item->item_code }}][hs_code]"
                                                                  class="form-control editable-field" readonly>{{ $item->hs_code ?? '' }}</textarea>
                                                    </td>

                                                    <!-- Item Name -->
                                                    <td>
                                                        <textarea name="material_configs[{{ $item->id }}][{{ $item->item_code }}][item_name]"
                                                                  class="form-control editable-field" readonly required >{{ $item->item_name ?? '' }}</textarea>
                                                    </td>

                                                    <!-- Length -->
                                                    <td>

                                                            <input type="text" name="material_configs[{{ $item->id }}][{{ $item->item_code }}][length]"
                                                                   class="form-control" value="{{ $item->length ?? '' }}" readonly>

                                                    </td>


                                                    <!-- Number -->

                                                    <td>

                                                        <input type="number" size="4" name="material_configs[{{ $item->id }}][{{ $item->item_code }}][no]"
                                                               class="form-control {{ in_array($item->item_code, ['rods', 'poles_on_c', 'poles_in_c', 'polecovers', 'spacers', 'base_plate_on_c']) ? 'editable-field' : 'readonly' }}"
                                                               value="{{ $item->no ?$item->no: '' }}" readonly
                                                              >
                                                    </td>

                                                    <!-- Weight per cm -->
                                                    <td>
                                                        <input type="number" step="0.00000001"
                                                               name="material_configs[{{ $item->id }}][{{ $item->item_code }}][weight_per_cm]"
                                                               class="form-control editable-field"
                                                               value="{{ $item->weight_per_cm ?? '' }}"
                                                              readonly>
                                                    </td>

                                                    <!-- Unit Price -->
                                                    <td>
                                                        <input type="number" step="0.01"
                                                               name="material_configs[{{ $item->id }}][{{ $item->item_code }}][unit_price]"
                                                               class="form-control editable-field" value="{{ $item->unit_price ?? '' }}" readonly >
                                                    </td>

                                                    <!-- Specs -->
                                                    <td>
                                                        <textarea name="material_configs[{{ $item->id }}][{{ $item->item_code }}][specs]"
                                                                  class="form-control editable-field" readonly>{{ $item->specs ?? '' }}</textarea>
                                                    </td>

                                                    <!-- Actions -->
                                                    <td>
                                                        <button type="button" class="btn btn-danger delete-Fence-Material-Button m-3" data-id="{{ $item->id }}">
                                                            Delete
                                                        </button>
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
                                        id="edit-Fence-Material-Button">Edit</button>
                                    <button type="submit" class="btn btn-primary"
                                        id="update-Fence-Material-Button">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary" id="addRowButton">Add Row</button>
                            <fieldset>
                                <legend>Add Materials </legend>
                                <p id="invalid_no" style="display:none"></p>
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-bordered" id="materialTable">
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
                                                    <th>Actions</th>
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
    <script src="{{ asset('admin/js/mastersheet-boq-fence-material.js') }}"></script>
@endsection
