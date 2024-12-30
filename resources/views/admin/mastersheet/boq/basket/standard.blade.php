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
    </style>

    <div class="content-wrapper" id="boqbasket">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5>BOQ baskets Configurations- 2.5m Length</h5>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">BOQ baskets Configurations-2.5m length</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <form action="javascript:;" method="POST" id="masterSheetbasketConfigForm">
                    @csrf

                    <div class="row">
                        <div class="col-12 col-md-9">
                            <p class="text-warning">* Fields whose values are derived from other field value are not
                                permitted to edit.</p>
                            <fieldset>
                                <legend>Material Configurations</legend>
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
                                                    <th>Total Weight(kg)</th>
                                                    <th>Total Price(€)</th>
                                                    <th>Specs</th>
                                                    {{-- <th>Actions</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($commonmaterials as $key => $item)
                                                    <tr data-id="{{ $item->id }}">
                                                        <input type="hidden" name="boqconfigid" id="boqconfigid"
                                                            value="{{ $item->boq_config_id ?? '' }}" required>
                                                        <input type="hidden" name="item_code" id="item_code"
                                                            value="{{ $item->item_code ?? '' }}" required>

                                                        <!-- Article No -->
                                                        <td>
                                                            <textarea name="material_configs[{{ $item->id }}][{{ $item->item_code }}][article_no]" class="form-control" readonly
                                                                required rows="3">{{ $item->product->article_no ?? '' }}</textarea>
                                                        </td>

                                                        <!-- HS Code -->
                                                        <td>
                                                            <textarea rows="3" name="material_configs[{{ $item->id }}][{{ $item->item_code }}][hs_code]"
                                                                class="form-control" readonly>{{ $item->product->hs_code ?? '' }}</textarea>
                                                        </td>

                                                        <!-- Item Name -->
                                                        <td>
                                                            <textarea rows="3" name="material_configs[{{ $item->id }}][{{ $item->item_code }}][item_name]"
                                                                class="form-control" readonly required>{{ $item->product->name ?? '' }}</textarea>
                                                        </td>

                                                        <!-- Length -->
                                                        <td>
                                                            <input type="text"
                                                                name="material_configs[{{ $item->id }}][{{ $item->item_code }}][length_formula]"
                                                                class="form-control"
                                                                value="{{ $item->length_formula ?? '' }}" readonly
                                                                required>
                                                            {{-- @if (in_array($item->item_code, ['base_plate_on_c', 'channels', 'brackets']))
                                                                <input type="text"
                                                                    name="material_configs[{{ $item->id }}][{{ $item->item_code }}][length]"
                                                                    class="form-control editable-field"
                                                                    value="{{ $item->length ?? '' }}" readonly required>
                                                            @else
                                                                <input type="text"
                                                                    name="material_configs[{{ $item->id }}][{{ $item->item_code }}][length]"
                                                                    class="form-control" value="{{ $item->length ?? '' }}"
                                                                    readonly>
                                                            @endif --}}
                                                        </td>


                                                        <!-- Number -->

                                                        <td>
                                                            <textarea  name="material_configs[{{ $item->id }}][{{ $item->item_code }}][no_formula]"
                                                                class="form-control"
                                                                readonly>{{ $item->no_formula ?? '' }}</textarea>
                                                            {{-- <input type="text"
                                                                name="material_configs[{{ $item->id }}][{{ $item->item_code }}][no_formula]"
                                                                class="form-control" value="{{ $item->no_formula ?? '' }}"
                                                                readonly required> --}}
                                                            {{--
                                                            <input type="number" size="4"
                                                                name="material_configs[{{ $item->id }}][{{ $item->item_code }}][no]"
                                                                class="form-control {{ in_array($item->item_code, ['rods', 'poles_on_c', 'poles_in_c', 'polecovers', 'spacers', 'base_plate_on_c']) ? 'editable-field' : 'readonly' }}"
                                                                value="{{ $item->no ? $item->no : '' }}"
                                                                {{ in_array($item->item_code, ['rods', 'poles_on_c', 'poles_in_c', 'polecovers', 'spacers', 'base_plate_on_c']) ? '' : 'readonly' }}
                                                                readonly
                                                                {{ in_array($item->item_code, ['rods', 'poles_on_c', 'poles_in_c', 'polecovers', 'spacers', 'base_plate_on_c']) ? 'required' : '' }}> --}}
                                                        </td>

                                                        <!-- Weight per cm -->
                                                        <td>
                                                            <input type="number" step="0.00000001"
                                                                name="material_configs[{{ $item->id }}][{{ $item->item_code }}][weight_per_unit]"
                                                                class="form-control"
                                                                value="{{ $item->product->attributes->firstwhere('name', 'weight_per_unit')->value ?? '' }}"
                                                                {{ in_array($item->item_code, ['rods', 'channels', 'poles_on_c', 'poles_in_c', 'base_plate_on_c', 'brackets', 'spacers']) ? '' : 'readonly' }}
                                                                {{ in_array($item->item_code, ['rods', 'channels', 'poles_on_c', 'poles_in_c', 'base_plate_on_c', 'brackets', 'spacers']) ? 'required' : '' }}
                                                                readonly>
                                                        </td>

                                                        <!-- Unit Price -->
                                                        <td>
                                                            <input type="number" step="0.01"
                                                                name="material_configs[{{ $item->id }}][{{ $item->item_code }}][unit_price]"
                                                                class="form-control editable-field"
                                                                value="{{ $item->product->attributes->firstwhere('name', 'unit_price')->value ?? '' }}"
                                                                readonly>
                                                        </td>
                                                        <!-- Weight Per Kg -->
                                                        <td>
                                                            {{-- <input type="text" step="0.01"
        name="material_configs[{{ $item->id }}][{{ $item->item_code }}][weight_kg_formula]"
        class="form-control"
        value="{{ $item->weight_kg_formula ?? '' }}" readonly> --}}
                                                            <textarea rows="3" name="material_configs[{{ $item->id }}][{{ $item->item_code }}][weight_kg_formula]"
                                                                class="form-control" readonly>{{ $item->weight_kg_formula ?? '' }}</textarea>
                                                        </td>
                                                        <!-- Total Price -->
                                                        <td>
                                                            <textarea rows="3" name="material_configs[{{ $item->id }}][{{ $item->item_code }}][no_formula]"
                                                                class="form-control" readonly>{{ $item->no_formula ?? '' }}</textarea>
                                                            {{-- <input type="text" step="0.01"
        name="material_configs[{{ $item->id }}][{{ $item->item_code }}][price_formula]"
        class="form-control"
        value="{{ $item->price_formula ?? '' }}" readonly> --}}
                                                        </td>
                                                        <!-- Specs -->
                                                        <td>
                                                            <textarea rows="3" name="material_configs[{{ $item->id }}][{{ $item->item_code }}][specs]"
                                                                class="form-control editable-field" readonly>{{ $item->specs ?? '' }}</textarea>
                                                        </td>

                                                        <!-- Actions -->
                                                        {{-- <td>
                                                        <button type="button" class="btn btn-danger delete-basket-Material-Button m-3" data-id="{{ $item->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </fieldset>
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
                                                    <th>Total Weight(kg)</th>
                                                    <th>Total Price(€)</th>
                                                    <th>Specs</th>
                                                    {{-- <th>Actions</th> --}}
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
                                                            <textarea rows="3" name="material_configs[{{ $item->id }}][{{ $item->item_code }}][article_no]"
                                                                class="form-control " readonly required>{{ $item->product->article_no ?? '' }}</textarea>
                                                        </td>

                                                        <!-- HS Code -->
                                                        <td>
                                                            <textarea rows="3" name="material_configs[{{ $item->id }}][{{ $item->item_code }}][hs_code]"
                                                                class="form-control " readonly>{{ $item->product->hs_code ?? '' }}</textarea>
                                                        </td>

                                                        <!-- Item Name -->
                                                        <td>
                                                            <textarea rows="3" name="material_configs[{{ $item->id }}][{{ $item->item_code }}][item_name]"
                                                                class="form-control" readonly required>{{ $item->product->name ?? '' }}</textarea>
                                                        </td>

                                                        <!-- Length -->
                                                        <td>

                                                            <input type="text"
                                                                name="material_configs[{{ $item->id }}][{{ $item->item_code }}][length]"
                                                                class="form-control editable-field"
                                                                value="{{ $item->length ?? '' }}" readonly>

                                                        </td>


                                                        <!-- Number -->

                                                        <td>

                                                            <input type="number" size="4"
                                                                name="material_configs[{{ $item->id }}][{{ $item->item_code }}][no]"
                                                                class="form-control  editable-field"
                                                                value="{{ $item->no ? $item->no : '' }}" readonly>
                                                        </td>

                                                        <!-- Weight per cm -->
                                                        <td>
                                                            <input type="number" step="0.00000001"
                                                                name="material_configs[{{ $item->id }}][{{ $item->item_code }}][weight_per_unit]"
                                                                class="form-control editable-field"
                                                                value="{{ $item->product->attributes->firstwhere('name', 'weight_per_unit')->value ?? '' }}"
                                                                readonly>
                                                        </td>

                                                        <!-- Unit Price -->
                                                        <td>
                                                            <input type="number" step="0.01"
                                                                name="material_configs[{{ $item->id }}][{{ $item->item_code }}][unit_price]"
                                                                class="form-control"
                                                                value="{{ $item->product->attributes->firstwhere('name', 'unit_price')->value ?? '' }}"
                                                                readonly>
                                                        </td>
                                                        <!-- Weight Per Kg -->
                                                        <td>
                                                            <input type="number" step="0.01"
                                                                name="material_configs[{{ $item->id }}][{{ $item->item_code }}][weight_kg_formula]"
                                                                class="form-control"
                                                                value="{{ $item->weight_kg_formula ?? '' }}" readonly>
                                                        </td>
                                                        <!-- Total Price -->
                                                        <td>
                                                            <input type="number" step="0.01"
                                                                name="material_configs[{{ $item->id }}][{{ $item->item_code }}][price_formula]"
                                                                class="form-control"
                                                                value="{{ $item->price_formula ?? '' }}" readonly>
                                                        </td>
                                                        <!-- Specs -->
                                                        <td>
                                                            <textarea rows="3" name="material_configs[{{ $item->id }}][{{ $item->item_code }}][specs]"
                                                                class="form-control editable-field" readonly>{{ $item->specs ?? '' }}</textarea>
                                                        </td>

                                                        <!-- Actions -->
                                                        {{-- <td>
                                                        <button type="button" class="btn btn-danger delete-basket-Material-Button m-3" data-id="{{ $item->id }}">
                                                            <i class="fas fa-trash"></i>
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

                        <div class="col-12 col-md-3">
                            @php
                                $manufacturing_items = $boqConfig['basketManufacturing'];
                            @endphp
                            <fieldset>
                                <legend>Manufacturing Cost</legend>
                                <p id="invalid_no" style="display:none"></p>
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-bordered" id="manufacturing">
                                            <thead>
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Name</th>
                                                    <th>Cost per Unit (€) </th>
                                                    {{-- <th>Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($manufacturing as $key => $item)
                                                    <tr data-id="{{ $item->id }}">

                                                        <td>
                                                            <input type="hidden" name="boqconfigid" id="boqconfigid"
                                                                value="{{ $item ? $item->boq_config_id : '' }}" required>
                                                            {{-- <input type="hidden" name="id" id="id"
                                                                value="{{ $item ? $item->id : '' }}" required> --}}
                                                            <div class="form-group">
                                                                <input type="text"
                                                                    name="manufacturing[{{ strtolower($item->id) }}][code]"
                                                                    class="form-control  editable-field manufacturing-input"
                                                                    value="{{ $item ? $item->code : '' }}"
                                                                    id="manufacturing_code_{{ $item->id }}" readonly>
                                                            </div>

                                                        </td>

                                                        <td>

                                                            <div class="form-group">

                                                                <textarea rows="1" name="manufacturing[{{ strtolower($item->id) }}][name]"
                                                                    class="form-control editable-field manufacturing-input" readonly>{{ ucfirst($item->name) }}</textarea>

                                                            </div>
                                                        </td>
                                                        <td>

                                                            <div class="form-group">

                                                                <input type="number"
                                                                    name="manufacturing[{{ strtolower($item->id) }}][cost_per_unit]"
                                                                    class="form-control  editable-field manufacturing-input"
                                                                    value="{{ $item ? $item->cost_per_unit : '' }}"
                                                                    required readonly>

                                                            </div>

                                                        </td>
                                                        {{-- <td>
                                                            <button type="button" class="btn btn-danger delete-basket-Manufacturing-Button" id=""  data-id="{{ $item->id }}"><i class="fas fa-trash"></i></button>
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </fieldset>
                            <div class="row">
                                <div class="col-12">
                                    @php
                                        $taxes_items = $boqConfig['basketTaxes'];
                                    @endphp
                                    <fieldset>
                                        <legend>Taxes Cost</legend>
                                        <p id="invalid_no" style="display:none"></p>
                                        <div class="card">
                                            <div class="card-body table-responsive p-0">
                                                <table class="table table-bordered" id="taxes">
                                                    <thead>
                                                        <tr>
                                                            <th>Code</th>
                                                            <th>Name</th>
                                                            <th>Percentage (%) </th>
                                                            {{-- <th>Action</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($taxes as $key => $item)
                                                            <tr data-id="{{ $item->id }}">

                                                                <td>
                                                                    <input type="hidden" name="boqconfigid"
                                                                        id="boqconfigid"
                                                                        value="{{ $item ? $item->boq_config_id : '' }}"
                                                                        required>
                                                                    {{-- <input type="hidden" name="id" id="id"
                                                                    value="{{ $item ? $item->id : '' }}" required> --}}
                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                            name="taxes[{{ strtolower($item->id) }}][code]"
                                                                            class="form-control  editable-field taxes-input"
                                                                            value="{{ $item ? $item->code : '' }}"
                                                                            id="taxes_code_{{ $item->id }}" readonly>
                                                                    </div>

                                                                </td>

                                                                <td>
                                                                    <div class="form-group">
                                                                        <textarea rows="1" name="taxes[{{ strtolower($item->id) }}][name]"
                                                                            class="form-control editable-field taxes-input" readonly>{{ ucfirst($item->name) }}</textarea>
                                                                    </div>
                                                                </td>


                                                                <td>

                                                                    <div class="form-group">

                                                                        <input type="number"
                                                                            name="taxes[{{ strtolower($item->id) }}][percentage]"
                                                                            class="form-control  editable-field taxes-input"
                                                                            value="{{ $item ? $item->percentage : '' }}"
                                                                            required readonly>

                                                                    </div>

                                                                </td>
                                                                {{-- <td>
                                                                <button type="button" class="btn btn-danger delete-basket-taxes-Button" id=""  data-id="{{ $item->id }}"><i class="fas fa-trash"></i></button>
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
                                <div class="col-12">
                                    @php
                                        $taxes_items = $boqConfig['basketTaxes'];
                                    @endphp
                                    <fieldset>
                                        <legend>Margin factor Cost</legend>
                                        <p id="invalid_no" style="display:none"></p>
                                        <div class="card">

                                            <div class="card-body table-responsive p-0">
                                                <table class="table table-bordered" id="taxes">
                                                    <thead>
                                                        <tr>
                                                            <th>Country</th>

                                                            <th>Margin factor</th>
                                                            <th>Discount Percentage</th>
                                                            {{-- <th>Action</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <input type="hidden" name="boqconfigid" id="boqconfigid"
                                                                value="{{ $boqConfig->id }}">

                                                            {{-- <td>
                                                                <div class="form-group">
                                                                    <input type="text" name="margin_factors[0][country_id]" class="form-control margin-factor-input" value="Europe" required="" readonly="" fdprocessedid="tb415f">
                                                                </div>
                                                            </td> --}}

                                                            {{-- <td>
                                                                <div class="form-group">
                                                                    <input type="number" name="margin_factors[0][margin_factor]" class="form-control editable-field margin-factor-input" value="{{ $country_margin_factors->margin_factor }}" required="" readonly="" fdprocessedid="iru7md">
                                                                </div>
                                                            </td> --}}



                                                        </tr>

                                                        @forelse ($country_margin_factors as $key => $item)
                                                            <tr data-id="{{ $item->id }}">

                                                                <td>
                                                                    <input type="hidden" name="boqconfigid"
                                                                        id="boqconfigid"
                                                                        value="{{ $item ? $item->boq_config_id : '' }}"
                                                                        required>

                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                            name="margin_factor[{{ strtolower($item->id) }}][country_id]"
                                                                            class="form-control margin_factor-input"
                                                                            value="{{ $item ? $item->country_id : '' }}"
                                                                            id="margin_factor_country_id_{{ $item->id }}"
                                                                            readonly>
                                                                    </div>

                                                                </td>

                                                                <td>
                                                                    <div class="form-group">
                                                                        <textarea rows="1" name="margin_factor[{{ strtolower($item->id) }}][margin_factor]"
                                                                            class="form-control editable-field margin_factor-input" readonly>{{ ucfirst($item->margin_factor) }}</textarea>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <textarea rows="1" name="margin_factor[{{ strtolower($item->id) }}][discount_per]"
                                                                            class="form-control editable-field margin_factor-input" readonly>{{ ucfirst($item->discount_per) }}</textarea>
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="2">No data Available</td>
                                                            </tr>
                                                        @endforelse


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                    </fieldset>

                                </div>

                            </div>
                            {{-- <div class="row">

                                <div class="col-12">
                                    @php
                                        $margin_factor = $boqConfig['basketMarginFactor'];
                                    @endphp
                                    <fieldset>
                                        <legend>Margin Factor</legend>
                                        <div class="form-group">
                                            <label for="margin_factor">Margin Factor</label>
                                            <input type="number" step="0.01" name="margin_factor"
                                                class="form-control"
                                                value="{{ $boqbasketconfig ? $boqbasketconfig->margin_factor : $margin_factor['factor'] }}"
                                                required>
                                        </div>
                                    </fieldset>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-12 text-center">
                                    <a href="/admin/mastersheet/boq/{{ $boqtype }}" target="_blank" class="btn btn-warning" id="edit-basket-standard-Button">Edit</a>
                                    {{-- <button type="submit" class="btn btn-primary"
                                        id="update-basket-standard-Button">Update</button> --}}
                                </div>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
@section('jscript')
    <!-- DataTables & Plugins -->
    <script>
        $("#materials").DataTable({
            "lengthChange": true,
            "autoWidth": true,
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,

            responsive: false,
            "buttons": ["pdf", "colvis"]
            //  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#materials_wrapper .col-md-6:eq(0)');
    </script>
    {{-- <script src="{{ asset('admin/js/mastersheet-boq-basket.js') }}"></script> --}}
@endsection
