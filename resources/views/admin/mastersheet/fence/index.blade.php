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
                <form action="javascript:;" method="POST" id="boqFenceConfigForm">
                    @csrf

                    <div class="row">
                        <div class="col-12 col-md-9">
                            <p class="text-warning">* Fields whose values are derived from other field value are not
                                permitted to edit.</p>
                            <fieldset>
                                <legend>Material Configurations</legend>
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-bordered">
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

                                                    {{-- <th style="width:70px;">Weight(kg)</th>
                                                <th style="width:70px;">Price</th>
                                                <th style="width:70px;">Specs</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($boqConfig['fenceMaterials'] as $key => $item)
                                                    @php
                                                        // Check if boqfenceconfig exists, otherwise populate blanks
                                                        $materialConfig = $boqfenceconfig
                                                            ? $boqfenceconfig->materialConfigs->firstWhere(
                                                                'item_code',
                                                                $item['code'],
                                                            )
                                                            : null;
                                                        // echo $materialConfig;
                                                        // Format the string directly in the Blade view
                                                        // $item = ucwords(str_replace('_', ' ', $item));
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            <input type="text"
                                                                name="material_configs[{{ $item['code'] }}][article_no]"
                                                                class="form-control"
                                                                value="{{ $materialConfig ? $materialConfig->article_no : $item['article_no'] }}"
                                                                readonly>
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                name="material_configs[{{ $item['code'] }}][hs_code]"
                                                                class="form-control"
                                                                value="{{ $materialConfig ? $materialConfig->hs_code : $item['hs_code'] }}">
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                name="material_configs[{{ $item['code'] }}][item_name]"
                                                                class="form-control" value="{{ $key }}">
                                                        </td>
                                                        <td>
                                                            @if ($item['code'] === 'base_plate_on_c' || $item['code'] === 'channels' || $item['code'] === 'brackets')
                                                                <input type="text"
                                                                    name="material_configs[{{ $item['code'] }}][length]"
                                                                    class="form-control"
                                                                    value="{{ $materialConfig ? $materialConfig->length : $item['length'] }}">
                                                            @else<input type="text"
                                                                    name="material_configs[{{ $item['code'] }}][length]"
                                                                    class="form-control"
                                                                    value="{{ $materialConfig ? $materialConfig->length : $item['length'] }}"
                                                                    readonly>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (
                                                                $item['code'] === 'rods' ||
                                                                    $item['code'] === 'poles_on_c' ||
                                                                    $item['code'] === 'poles_in_c' ||
                                                                    $item['code'] === 'polecovers' ||
                                                                    $item['code'] === 'spacers' ||
                                                                    $item['code'] === 'base_plate_on_c')
                                                                <input type="number" size="4"
                                                                    name="material_configs[{{ $item['code'] }}][no]"
                                                                    class="form-control"
                                                                    value="{{ $materialConfig ? $materialConfig->no : $item['no'] }}">
                                                            @else
                                                                <input type="number" size="4"
                                                                    name="material_configs[{{ $item['code'] }}][no]"
                                                                    class="form-control"
                                                                    value="{{ $materialConfig ? $materialConfig->no : $item['no'] }}"
                                                                    readonly>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (
                                                                $item['code'] === 'rods' ||
                                                                    $item['code'] === 'channels' ||
                                                                    $item['code'] === 'poles_on_c' ||
                                                                    $item['code'] === 'poles_in_c' ||
                                                                    $item['code'] === 'base_plate_on_c' ||
                                                                    $item['code'] === 'brackets' ||
                                                                    $item['code'] === 'spacers')
                                                                <input type="number" step="0.00000001"
                                                                    name="material_configs[{{ $item['code'] }}][weight_per_cm]"
                                                                    class="form-control"
                                                                    value="{{ $materialConfig ? $materialConfig->weight_per_cm : $item['weight_per_cm'] }}">
                                                            @else
                                                                <input type="number" step="0.00000001"
                                                                    name="material_configs[{{ $item['code'] }}][weight_per_cm]"
                                                                    class="form-control"
                                                                    value="{{ $materialConfig ? $materialConfig->weight_per_cm : $item['weight_per_cm'] }}"
                                                                    readonly>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <input type="number" step="0.01"
                                                                name="material_configs[{{ $item['code'] }}][unit_price]"
                                                                class="form-control"
                                                                value="{{ $materialConfig ? $materialConfig->unit_price : $item['unit_price'] }}">
                                                        </td>

                                                        <td>
                                                            <input type="text"
                                                                name="material_configs[{{ $item['code'] }}][specs]"
                                                                class="form-control"
                                                                value="{{ $materialConfig ? $materialConfig->specs : $item['specs'] }}">
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </fieldset>

                            <fieldset>
                                <legend>Add Extra Material</legend>
                                <p class="text-warning">* Price Value will be considered for calculating final price.</p>
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-bordered" id="materialsTable">
                                            <thead>
                                                <tr>
                                                    {{-- <th>Item Code</th> --}}
                                                    <th>Article No</th>
                                                    <th>HS Code</th>
                                                    <th>Item Name</th>
                                                    <th>Length (cm)</th>
                                                    <th>No</th>
                                                    <th>Weight per cm (Kg)</th>
                                                    <th>Unit Price (€)</th>
                                                    <th>Weight (Kg)</th>
                                                    <th>Price (€)</th>
                                                    <th>Specs</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($boqfenceconfig->materialConfigs) && $boqfenceconfig->materialConfigs->isNotEmpty())

                                                @foreach ($boqfenceconfig->materialConfigs as $key => $item)
                                                @php
                                                    // Check if the item code starts with 'misc'
                                                    if (!\Illuminate\Support\Str::startsWith($item['item_code'], 'misc')) {
                                                        continue;
                                                    }

                                                    // Get the specific material configuration based on the item_code
                                                    $materialConfig = $boqfenceconfig->materialConfigs->firstWhere('item_code', $item['item_code']);
                                                @endphp

                                                {{-- Display the filtered material configuration row --}}
                                                <tr data-material-code="{{ $item['item_code'] ?? '' }}">
                                                    <input type="hidden" name="material_configs[{{ $item['item_code'] }}]" class="form-control"
                                                               value="{{ $materialConfig ? $materialConfig->item_code : '' }}">
                                                    <td>

                                                        <input type="text" name="material_configs[{{ $item['item_code'] }}][article_no]" class="form-control"
                                                               value="{{ $materialConfig ? $materialConfig->article_no : '' }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="material_configs[{{ $item['item_code'] }}][hs_code]" class="form-control"
                                                               value="{{ $materialConfig ? $materialConfig->hs_code : '' }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="material_configs[{{ $item['item_code'] }}][item_name]" class="form-control"
                                                               value="{{ $materialConfig ? $materialConfig->item_name : '' }}">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="material_configs[{{ $item['item_code'] }}][length]" class="form-control material-input"
                                                               value="{{ $materialConfig ? $materialConfig->length : '' }}">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="material_configs[{{ $item['item_code'] }}][no]" class="form-control material-input"
                                                               value="{{ $materialConfig ? $materialConfig->no : '' }}">
                                                    </td>
                                                    <td>
                                                        <input type="number" step="0.000001" name="material_configs[{{ $item['item_code'] }}][weight_per_cm]" class="form-control material-input"
                                                               value="{{ $materialConfig ? $materialConfig->weight_per_cm : '' }}">
                                                    </td>
                                                    <td>
                                                        <input type="number" step="0.01" name="material_configs[{{ $item['item_code'] }}][unit_price]" class="form-control material-input"
                                                               value="{{ $materialConfig ? $materialConfig->unit_price : '' }}">
                                                    </td>
                                                    <td>
                                                        <input type="number" step="0.0001" name="material_configs[{{ $item['item_code'] }}][weight_kg]" class="form-control material-input"
                                                               value="{{ $materialConfig ? $materialConfig->weight_kg : '' }}">
                                                    </td>
                                                    <td>
                                                        <input type="number" step="0.01" name="material_configs[{{ $item['item_code'] }}][price]" class="form-control material-input"
                                                               value="{{ $materialConfig ? $materialConfig->price : '' }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="material_configs[{{ $item['item_code'] }}][specs]" class="form-control material-input"
                                                               value="{{ $materialConfig ? $materialConfig->specs : '' }}">
                                                    </td>
                                                    <td>
                                                        <button  style="background-color:transparent; border:none;" type="button" name="material_configs[{{ $item['item_code'] }}][id]"  value="{{ $materialConfig ? $materialConfig->id : '' }}" class="btn btn-danger btn-delete-row"><i class="fas fa-trash text-danger"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @endif

                                            </tbody>
                                        </table>
                                        <p id="invalid_no" style="text-align:center;margin-top:15px; font-weight:700" class="text-danger"></p>
                                        <div class="d-flex justify-content-end w-100">

                                        <button type="button" class="btn btn-primary my-3 mr-3" id="addRowButton">Add Material</button>
                                    </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-12 col-md-3">
                            @php
                                $manufacturing_items = $boqConfig['fenceManufacturing'];
                            @endphp
                            <fieldset>
                                <legend>Manufacturing Cost</legend>
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Name</th>
                                                    <th>Cost per Kg (€)</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($manufacturing_items as $key => $item)
                                                    @php
                                                        // Check if boqfenceconfig exists, otherwise populate blanks
                                                        $manufacturingConfig = $boqfenceconfig ? $boqfenceconfig : null;
                                                        // echo $materialConfig;
                                                        // Format the string directly in the Blade view
                                                        // $item = ucwords(str_replace('_', ' ', $item));
                                                    @endphp

                                                    <tr>

                                                        <td>
                                                            <input type="hidden" name="id" id="id"
                                                                value="{{ $boqfenceconfig ? $boqfenceconfig->id : '' }}"
                                                                required>
                                                            <div class="form-group">

                                                                <input type="text" name="{{ $key }}_code"
                                                                    class="form-control"
                                                                    value="{{ $boqfenceconfig ? $boqfenceconfig->{$key . '_code'} : $item['code'] }}"
                                                                    readonly>
                                                            </div>

                                                        </td>

                                                        <td>

                                                            <div class="form-group">

                                                                <input type="text" name="{{ $key }}_name"
                                                                    class="form-control" value="{{ ucfirst($key) }}"
                                                                    readonly>
                                                            </div>

                                                        </td>
                                                        <td>

                                                            <div class="form-group">

                                                                <input type="text"
                                                                    name="{{ $key }}_cost_per_unit"
                                                                    class="form-control"
                                                                    value="{{ $boqfenceconfig ? $boqfenceconfig->{$key . '_cost_per_unit'} : $item['cost_per_unit'] }}"
                                                                    required>
                                                            </div>

                                                        </td>
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
                                        $taxes_items = $boqConfig['fenceTaxes'];
                                    @endphp
                                    <fieldset>
                                        <legend>Taxes</legend>
                                        <div class="form-group">
                                            <label for="duties_percent">Duties Percent (%)</label>
                                            <input type="number" step="0.01" name="duties_percent"
                                                class="form-control"
                                                value="{{ $boqfenceconfig ? $boqfenceconfig->duties_percent : $taxes_items['duties_percent'] }}"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="vat_perce">VAT Percent (%)</label>
                                            <input type="number" step="0.01" name="vat_percent" class="form-control"
                                                value="{{ $boqfenceconfig ? $boqfenceconfig->vat_percent : $boqConfig['fenceVat']['vat_percent'] }}"
                                                required>
                                        </div>
                                    </fieldset>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-12">
                                    @php
                                        $margin_factor = $boqConfig['fenceMarginFactor'];
                                    @endphp
                                    <fieldset>
                                        <legend>Margin Factor</legend>
                                        <div class="form-group">
                                            <label for="margin_factor">Margin Factor</label>
                                            <input type="number" step="0.01" name="margin_factor"
                                                class="form-control"
                                                value="{{ $boqfenceconfig ? $boqfenceconfig->margin_factor : $margin_factor['factor'] }}"
                                                required>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary"
                                        id="update-boq-fence-config">Update</button>
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
    <script src="{{ asset('admin/js/boq-fence.js') }}"></script>
@endsection
