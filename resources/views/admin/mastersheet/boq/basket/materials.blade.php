@extends('admin.Layout.layout')

@section('content')
    <style>
        #boqbasket fieldset {
            border: 1px solid #ccc;
            padding: 0 8px;
            margin-bottom: 20px;
            border-radius: 5px;

        }

        #boqbasket .form-group {
            margin-bottom: 0.5rem;
        }

        #boqbasket .form-group label,
        #boqbasket th,
        #boqbasket td {
            font-size: 13px;
        }

        #boqbasket legend {
            font-weight: bold;
            width: auto;
            padding: 0rem;
            font-size: 0.9rem;
        }

        #boqbasket .table td,
        #boqbasket .table th {
            padding: 5px 0;
            text-align: center;

        }

        #boqbasket .form-control {
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
    <style>
        #modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            width: 90vw;
            /* Make the modal take 90% of the viewport width */
            max-width: 1200px;
            /* Limit the maximum width */
            height: 80vh;
            /* Make the smodal take 80% of the viewport height */
            transform: translate(-50%, -50%);
            background-color: #343A40;
            /* Dark background for the modal */
            border-radius: 8px;
            /* Add rounded corners */
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1500;
            color: white;
            overflow: hidden;
            /* Prevent overflow from affecting the layout */
        }

        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }



        /* #productTable thead th {
            background-color: #495057;
            color: #fff;
            padding: 10px;
            text-align: left;
            border-bottom: 2px solid #dee2e6;
        } */

        /* #productTable tbody tr, #productTable tbody th:nth-child(even) {
            background-color: #f8f9fa;
        } */

        #productTable tbody tr:hover, #productTable tbody th:hover {
            /* background-color: #e9ecef; */
        }

        /* #productTable td {
            padding: 10px;
            word-wrap: break-word;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        .dataTables_scrollHeadInner {
            width: 100%;
        }

        .dataTables_scrollHeadInner table {
            width: 100%;
        } */

        .modal-footer {
            text-align: right;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            #modal {
                width: 95vw;
                /* Use more width for smaller screens */
                height: 90vh;
                /* Use more height for smaller screens */
                padding: 15px;
            }

            /* #productTable thead {
                display: none;
            }

            #productTable tbody tr, #productTable tbody th {
                display: block;
                margin-bottom: 10px;
            }

            #productTable td,#productTable th {
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-bottom: none;
            }

            #productTable td::before {
                content: attr(data-label);
                flex: 1;
            }

            #productTable td:last-child {
                border-bottom: 1px solid #dee2e6;
            } */
        }
    </style>
    <div class="content-wrapper" id="boqbasket">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5>BOQ Basket-Materials</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">BOQ Basket- Materials 1</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="container mt-5">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Material</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Manufacturing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Taxes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Margin Factors</a>
                        </li>
                    </ul><!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane p-3 active" id="tabs-1" role="tabpanel">
                            <form action="javascript:;" method="POST" id="masterSheetbasketMaterialForm">
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
                                                                <th>Sides</th>
                                                                <th>Item Name</th>
                                                                <th>Length (cm)</th>
                                                                <th>No</th>
                                                                <th>Weight per cm (Kg)</th>
                                                                <th>Unit Price (€)</th>
                                                                <th>Specs</th>
                                                                {{-- <th>Actions</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($commonmaterials as $key => $item)
                                                                <?php
                                                                $code = $item->product->attributes->where('name', 'code')->first()->value;
                                                                // echo $code;
                                                                ?>
                                                                <tr data-id="{{ $item->item_code }}">
                                                                    <input type="hidden" name="boqconfigid" id="boqconfigid"
                                                                        value="{{ $item->boq_config_id ?? '' }}" required>
                                                                    <input type="hidden" name="material_configs[{{ $item->id }}][{{ $item->item_code }}][item_code]"
                                                                        value="{{ $item->item_code }}" required>

                                                                    <!-- Article No -->
                                                                    <td>

                                                                        <textarea name="material_configs[{{ $item->id }}][{{ $item->item_code }}][article_no]"
                                                                            class="form-control" readonly required>{{ $item->product->article_no ?? '' }}</textarea>
                                                                    </td>

                                                                    <!-- HS Code -->
                                                                    <td>
                                                                        <textarea name="material_configs[{{ $item->id }}][{{ $item->item_code }}][hs_code]"
                                                                            class="form-control" readonly>{{ $item->product->hs_code ?? '' }}</textarea>
                                                                    </td>
                                                                    <!-- Sides -->
                                                                    <td>

                                                                        <textarea name="material_configs[{{ $item->id }}][{{ $item->item_code }}][sides]"
                                                                            class="form-control" readonly>{{ $item->sides ?? '' }}</textarea>
                                                                    </td>
                                                                    <!-- Item Name -->
                                                                    <td>
                                                                        <textarea name="material_configs[{{ $item->id }}][{{ $item->item_code }}][item_name]"
                                                                            class="form-control" readonly required>{{ $item->product->name ?? '' }}</textarea>
                                                                    </td>

                                                                    <!-- Length -->
                                                                    <td>
                                                                        @if (in_array($item->item_code, ['base_plate_on_c', 'channels', 'brackets']))
                                                                            <input type="text"
                                                                                name="material_configs[{{ $item->id }}][{{ $item->item_code }}][length]"
                                                                                class="form-control"
                                                                                value="{{ $item->length ?? '' }}" readonly required>
                                                                        @else
                                                                            <input type="text"
                                                                                name="material_configs[{{ $item->id }}][{{ $item->item_code }}][length]"
                                                                                class="form-control" value="{{ $item->length ?? '' }}"
                                                                                readonly>
                                                                        @endif
                                                                    </td>


                                                                    <!-- Number -->

                                                                    <td>
                                                                        <?php
                                                                        // $code=$item->product->attributes->where('name','code')->first()->value;
                                                                        // echo $code;
                                                                        ?>
                                                                        <input type="number" size="4"
                                                                            name="material_configs[{{ $item->id }}][{{ $item->item_code }}][no]"
                                                                            class="form-control {{ in_array($code, ['rods', 'spirals']) ? 'readonly' : '' }}"
                                                                            value="{{ $item->no ? $item->no : '' }}"

                                                                            readonly >
                                                                    </td>

                                                                    <!-- Weight per cm -->
                                                                    <td>
                                                                        <?php
                                                                        $weight_per_unit = $item->product->attributes->where('name', 'weight_per_unit')->first()->value;
                                                                        // echo $code;
                                                                        ?>
                                                                        <input type="number" step="0.00000001"
                                                                            name="material_configs[{{ $item->id }}][{{ $item->item_code }}][weight_per_unit]"
                                                                            class="form-control"
                                                                            value="{{ $weight_per_unit ?? '' }}"
                                                                            {{ in_array($code, ['rods']) ? 'required' : '' }} readonly>
                                                                    </td>

                                                                    <!-- Unit Price -->
                                                                    <td>
                                                                        <?php
                                                                        $unit_price = optional($item->product?->attributes->where('name', 'unit_price')->first())->value ?? null;
                                                                        ?>

                                                                        <input type="number" step="0.01"
                                                                            name="material_configs[{{ $item->id }}][{{ $item->item_code }}][unit_price]"
                                                                            class="form-control"
                                                                            value="{{ $unit_price ?? '' }}" readonly>
                                                                    </td>


                                                                    <td>
                                                                        <?php
                                                                        // $specs = optional($item->product?->attributes->where('name', 'short_desc')->first())->value ?? null;
                                                                        ?>

                                                                        <textarea name="material_configs[{{ $item->id }}][{{ $item->item_code }}][specs]"
                                                                            class="form-control editable-field" readonly>{{ $item->specs ?? '' }}</textarea>
                                                                    </td>

                                                                    <!-- Actions -->
                                                                    {{-- <td>
                                                                        <button type="button"
                                                                            class="btn btn-danger delete-basket-Material-Button m-3"
                                                                            data-id="{{ $item->id }}">
                                                                            Delete
                                                                        </button>
                                                                    </td> --}}
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>


                                        </fieldset>


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
                                                                    <input type="hidden" name="boqconfigid" id="boqconfigid"
                                                                        value="{{ $item->boq_config_id ?? '' }}" required>
                                                                    <input type="hidden" name="item_code" id="item_code"
                                                                        value="{{ $item->item_code ?? '' }}" required>

                                                                    <!-- Article No -->
                                                                    <td>
                                                                        <textarea name="material_configs[{{ $item->id }}][{{ $item->item_code }}][article_no]"
                                                                            class="form-control editable-field" readonly required>{{ $item->product->article_no ?? '' }}</textarea>
                                                                    </td>

                                                                    <!-- HS Code -->
                                                                    <td>
                                                                        <textarea name="material_configs[{{ $item->id }}][{{ $item->item_code }}][hs_code]"
                                                                            class="form-control editable-field" readonly>{{ $item->product->hs_code ?? '' }}</textarea>
                                                                    </td>

                                                                    <!-- Item Name -->
                                                                    <td>
                                                                        <textarea name="material_configs[{{ $item->id }}][{{ $item->item_code }}][item_name]"
                                                                            class="form-control editable-field" readonly required>{{ $item->product->name ?? '' }}</textarea>
                                                                    </td>

                                                                    <!-- Length -->

                                                                    <td>
                                                                        <?php
                                                                         $length = optional($item->product?->attributes->where('name', 'length')->first())->value ?? "";

                                                                        ?>

                                                                            <input type="text"
                                                                                name="material_configs[{{ $item->id }}][{{ $item->item_code }}][length]"
                                                                                class="form-control" value="{{ $length ?? '' }}"
                                                                                readonly>

                                                                    </td>


                                                                    <!-- Number -->
                                                                    <td>
                                                                        <?php
                                                                         $no = optional($item->product?->attributes->where('name', 'no')->first())->value ?? "";

                                                                        ?>
                                                                        <input type="number" size="4"
                                                                            name="material_configs[{{ $item->id }}][{{ $item->item_code }}][no]"
                                                                            class="form-control"
                                                                            value="{{ $no ??'' }}"

                                                                            readonly >
                                                                    </td>

                                                                    <!-- Weight per cm -->
                                                                    <td>
                                                                        <?php
                                                                        $weight_per_unit = optional($item->product?->attributes->where('name', 'weight_per_unit')->first())->value ?? "";
                                                                        // $weight_per_unit = $item->product->attributes->where('name', 'weight_per_unit')->first()->value;
                                                                        // echo $code;
                                                                        ?>
                                                                        <input type="number" step="0.00000001"
                                                                            name="material_configs[{{ $item->id }}][{{ $item->item_code }}][weight_per_unit]"
                                                                            class="form-control"
                                                                            value="{{ $weight_per_unit ?? '' }}"
                                                                            readonly>
                                                                    </td>

                                                                    <!-- Unit Price -->
                                                                    <td>
                                                                        <?php
                                                                        $unit_price = optional($item->product?->attributes->where('name', 'unit_price')->first())->value ?? null;
                                                                        ?>

                                                                        <input type="number" step="0.01"
                                                                            name="material_configs[{{ $item->id }}][{{ $item->item_code }}][unit_price]"
                                                                            class="form-control"
                                                                            value="{{ $unit_price ?? '' }}" readonly>
                                                                    </td>
                                                                    {{-- <td>

                                                                        <input type="number" step="0.01"
                                                                            name="material_configs[{{ $item->id }}][{{ $item->item_code }}][unit_price]"
                                                                            class="form-control editable-field"
                                                                            value="{{ $unit_price ?? '' }}" readonly>
                                                                    </td> --}}

                                                                    <!-- Specs -->
                                                                    <td>
                                                                        <?php
                                                                        // $specs = $item->product->attributes->where('name', 'short_desc')->first()->value;
                                                                        // echo $code;
                                                                        ?>
                                                                        <textarea name="material_configs[{{ $item->id }}][{{ $item->item_code }}][specs]"
                                                                            class="form-control editable-field" readonly>{{ $item->specs ?? '' }}</textarea>
                                                                    </td>

                                                                    <!-- Actions -->
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-danger delete-basket-Material-Button m-3"
                                                                            data-id="{{ $item->id }}">
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
                                                    id="edit-basket-Material-Button">Edit</button>
                                                <button type="submit" class="btn btn-primary"
                                                    id="update-basket-Material-Button">Update</button>
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
                                                                <th>ID</th>
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
                            <div id="overlay"></div>
                            <div id="modal">
                                {{-- <h2>Select a Product</h2> --}}
                                <form id="productForm">

                                    <fieldset>
                                        <legend>Select Material</legend>
                                        <div class="card">
                                            <div class="card-body">
                                                <table id="productTable" class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Select</th>
                                                            <th>Product Id</th>
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
                                                        @foreach ($allmaterials as $material)
                                                            <tr>
                                                                <td data-label="Select"><input type="radio" name="productSelect"
                                                                        value="{{ $material->id }}"></td>
                                                                <td data-label="id">{{ $material->id }}</td>
                                                                <td data-label="article_no">{{ $material->article_no }}</td>
                                                                <td data-label="hs_code">{{ $material->hs_code }}</td>

                                                                <td data-label="name">{{ $material->name }}</td>
                                                                <td data-label="length">
                                                                    {{ $material->attributes->where('name', 'length')->pluck('value')->first() }}
                                                                </td>
                                                                <td data-label="no">
                                                                    {{ $material->attributes->where('name', 'no')->pluck('value')->first() }}
                                                                </td>

                                                                <td data-label="weight_per_unit">
                                                                    {{ $material->attributes->where('name', 'weight_per_unit')->pluck('value')->first() }}
                                                                </td>
                                                                <td data-label="unit_price">
                                                                    {{ $material->attributes->where('name', 'unit_price')->pluck('value')->first() }}
                                                                </td>
                                                                <td data-label="short_desc">
                                                                    {{ $material->attributes->where('name', 'short_desc')->pluck('value')->first() }}
                                                                </td>



                                                            </tr>
                                                        @endforeach
                                                        <!-- Dynamic rows will be populated here -->
                                                    </tbody>
                                                </table>
                                                <div class="modal-footer">
                                                    <button type="button" id="okButton">OK</button>
                                                    <button type="button" id="cancelButton">Cancel</button>
                                                </div>
                                                {{-- <table class="table table-bordered" id="productTable">
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
                                                                    <button type="button" class="btn btn-danger delete-basket-Material-Button m-3" data-id="{{ $item->id }}">
                                                                        Delete
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table> --}}

                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane p-3" id="tabs-2" role="tabpanel">
                            <form action="javascript:;" method="POST" id="masterSheetManufacturingForm">
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
                                            <p id="invalid_no" class="invalid_no" style="display:none"></p>
                                            <div class="card">
                                                <div class="card-body table-responsive p-0">
                                                    <table class="table table-bordered" id="manufacturing">
                                                        <thead>
                                                            <tr>
                                                                <th>Code</th>
                                                                <th>Name</th>
                                                                <th>Cost per Kg (€) </th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @foreach ($manufacturing as $key => $item)
                                                                <tr data-id="{{ $item->id }}">

                                                                    <td>
                                                                        <input type="hidden" name="boqconfigid" id="boqconfigid"
                                                                            value="{{ $item ? $item->boq_config_id : '' }}">
                                                                        {{-- <input type="hidden" name="id" id="id"
                                                                            value="{{ $item ? $item->id : '' }}" required> --}}
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                name="manufacturing[{{ strtolower($item->id) }}][code]"
                                                                                class="form-control manufacturing-input"
                                                                                value="{{ $item ? $item->code : '' }}"
                                                                                id="manufacturing_code_{{ $item->id }}" required readonly>
                                                                        </div>

                                                                    </td>

                                                                    <td>

                                                                        <div class="form-group">

                                                                            <input type="text"
                                                                                name="manufacturing[{{ strtolower($item->id) }}][name]"
                                                                                class="form-control manufacturing-input"
                                                                                value="{{ ucfirst($item->name) }}" required readonly>
                                                                        </div>
                                                                    </td>
                                                                    <td>

                                                                        <div class="form-group">

                                                                            <input type="number"
                                                                                name="manufacturing[{{ strtolower($item->id) }}][cost_per_unit]"
                                                                                class="form-control manufacturing-input"
                                                                                value="{{ $item ? $item->cost_per_unit : '' }}" required
                                                                                readonly>

                                                                        </div>

                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-danger delete-Manufacturing-Button" id=""  data-id="{{ $item->id }}">    Delete</button>
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
                                                    id="edit-All-Manufacturing-Button">Edit</button>
                                                <button type="submit" class="btn btn-primary"
                                                    id="update-All-Manufacturing-Button">Update</button>
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
                        <div class="tab-pane p-3" id="tabs-3" role="tabpanel">
                            <p>Third Panel</p>
                        </div>
                    </div>
                </div>


                {{-- <div id="modal">
                    <h2>Enter or Select a Value</h2>
                    <form id="lengthForm">
                        <label for="anyValue">Enter Any Value:</label>
                        <input type="text" id="anyValue" placeholder="Enter text or leave blank" />

                        <span>or</span>

                        <label for="predefinedLength">Choose a Value:</label>
                        <select id="predefinedLength">
                            <option value="">-- Select a Value --</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="150">150</option>
                        </select>

                        <span>or</span>

                        <label for="formulaSelect">Apply Formula:</label>
                        <select id="formulaSelect">
                            <option value="">-- Select a Formula --</option>
                            <option value="sum">Sum of Row</option>
                            <option value="average">Average of Row</option>
                        </select>

                        <div class="modal-footer">
                            <button type="button" id="okButton">OK</button>
                            <button type="button" id="cancelButton">Cancel</button>
                        </div>
                    </form>
                </div> --}}
            </div>
        </section>
    </div>
@endsection

@section('jscript')
 {{-- *******************Material********************** --}}

    <script>
        $("#materials").DataTable({
            "lengthChange": true,
            "autoWidth": true,
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            //  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
        //  .buttons().container().appendTo('#materials_wrapper .col-md-6:eq(0)');
    </script>
    <script>
        $("#materialTable").DataTable({
            "lengthChange": true,
            "autoWidth": true,
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            //  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
        //  .buttons().container().appendTo('#materialTable_wrapper .col-md-6:eq(0)');
    </script>
    <script>
        $("#extramaterials").DataTable({
            "lengthChange": true,
            "autoWidth": true,
            "paging": false,
            "searching": true,
            "ordering": true,
            "info": true,
            //  scrollX: true,
            //  scrollY: 200,
            //  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
        //  .buttons().container().appendTo('#extramaterials_wrapper .col-md-6:eq(0)');
    </script>
    <script>
        $("#productTable").DataTable({
            // "lengthChange": true,
            "autoWidth": false,
            // "paging": false,
            "searching": true,
            // "ordering": true,
            // "info": false,
            //  scrollX: true,
            // "scrollY": '200px',
    // "scrollX": true,  // Enables horizontal scrolling
    // "scrollCollapse": true,  // Collapse the header when scrolling vertically
    // "responsive": false
            //  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
        //  .buttons().container().appendTo('#extramaterials_wrapper .col-md-6:eq(0)');
    </script>
<script src="{{ asset('admin/js/mastersheet-boq-basket-material.js') }}"></script>

    {{-- *******************manufacturing ********************** --}}
    <script>
        $("#manufacturing").DataTable({
                         "lengthChange": true,
                         "autoWidth": true,
                         "paging": true,
                         "searching": true,
                         "ordering": true,
                         "info": true,
                         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                     }).buttons().container().appendTo('#manufacturing_wrapper .col-md-6:eq(0)');

      </script>
      <script>
        $("#manufacturingTable").DataTable({
                         "lengthChange": true,
                         "autoWidth": true,
                         "paging": true,
                         "searching": true,
                         "ordering": true,
                         "info": true,
                        //  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                     });
                    //  .buttons().container().appendTo('#manufacturingTable_wrapper .col-md-6:eq(0)');

      </script>
        <!-- DataTables & Plugins -->
        <script src="{{ asset('admin/js/mastersheet-boq-manufacturing.js') }}"></script>

    {{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const table = document.getElementById('materialTable');
        const modal = document.getElementById('modal');
        const overlay = document.getElementById('overlay');
        const anyValueInput = document.getElementById('anyValue');
        const predefinedLengthSelect = document.getElementById('predefinedLength');
        const formulaSelect = document.getElementById('formulaSelect');
        const okButton = document.getElementById('okButton');
        const cancelButton = document.getElementById('cancelButton');
        let currentCell = null;

        // Function to open the modal
        function openModal(cell) {
            currentCell = cell;
            anyValueInput.value = cell.dataset.value;
            predefinedLengthSelect.value = '';
            formulaSelect.value = '';
            modal.style.display = 'block';
            overlay.style.display = 'block';
        }

        // Function to close the modal
        function closeModal() {
            modal.style.display = 'none';
            overlay.style.display = 'none';
            currentCell = null;
        }

        // Handle table cell click
        table.addEventListener('click', function (e) {
            const target = e.target;
            if (target.tagName === 'TD' && target.dataset.value !== undefined) {
                openModal(target);
            }
        });

        // Handle OK button click
        okButton.addEventListener('click', function () {
            const value = anyValueInput.value || predefinedLengthSelect.value;
            const formula = formulaSelect.value;
            if (currentCell) {
                if (formula) {
                    const rowCells = Array.from(currentCell.parentElement.children).filter(cell => cell.dataset.value);
                    if (formula === 'sum') {
                        const sum = rowCells.reduce((acc, cell) => acc + (parseFloat(cell.dataset.value) || 0), 0);
                        currentCell.dataset.value = sum;
                        currentCell.textContent = sum;
                    } else if (formula === 'average') {
                        const values = rowCells.map(cell => parseFloat(cell.dataset.value) || 0);
                        const average = values.reduce((acc, val) => acc + val, 0) / values.length;
                        currentCell.dataset.value = average.toFixed(2);
                        currentCell.textContent = average.toFixed(2);
                    }
                } else {
                    currentCell.dataset.value = value;
                    currentCell.textContent = value || 'Click to Set';
                }
            }
            closeModal();
        });

        // Handle Cancel button click
        cancelButton.addEventListener('click', closeModal);

        // Close modal when clicking on the overlay
        overlay.addEventListener('click', closeModal);
    });
</script> --}}

    <!-- DataTables & Plugins -->
    @endsection
