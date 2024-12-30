<?php
namespace App\Services;


use App\Models\BoqConfig;
use App\Repositories\BoqConfigRepository;
use App\Repositories\ManufacturingConfigRepository;
use App\Repositories\MarginFactorsConfigRepository;
use App\Repositories\MaterialConfigRepository;
use App\Repositories\TaxesConfigRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MasterSheetBOQConfigService
{
    protected $boqConfigRepository;
    protected $manufacturingConfigRepository;
    protected $taxesConfigRepository;
    protected $materialConfigRepository;
    protected $marginFactorsConfigRepository;
    protected $productService;

    public function __construct(ProductService $productService, BoqConfigRepository $boqConfigRepository, ManufacturingConfigRepository $manufacturingConfigRepository, TaxesConfigRepository $taxesConfigRepository, MaterialConfigRepository $materialConfigRepository, MarginFactorsConfigRepository $marginFactorsConfigRepository)
    {
        $this->boqConfigRepository = $boqConfigRepository;
        $this->manufacturingConfigRepository = $manufacturingConfigRepository;
        $this->taxesConfigRepository = $taxesConfigRepository;
        $this->materialConfigRepository = $materialConfigRepository;
        $this->marginFactorsConfigRepository = $marginFactorsConfigRepository;
        $this->productService = $productService;
    }
    public function getByBoqId($boqid)
    {
        return $this->boqConfigRepository->find($boqid);
    }
    public function getIdByType($boqtype)
    {
        return $this->boqConfigRepository->getIdByType($boqtype);
    }

    public function updateOrCreateAllManufacturing($boqConfigId, Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
            if ($request->input('manufacturing')) {
                foreach ($request->input('manufacturing') as $key => $data) {
                    // dd($key);
                    $existingRecord = $this->manufacturingConfigRepository->getByBoqConfigAndCode($boqConfigId, $data['code']);
                    if ($existingRecord && $existingRecord->trashed()) {
                        return "trashed";
                    } else {

                        $this->manufacturingConfigRepository->update($key, $data);
                    }
                }
            }
            if ($request->input('extra_manufacturing')) {
                foreach ($request->input('extra_manufacturing') as $key => $data) {
                    $existingRecord = $this->manufacturingConfigRepository->getByBoqConfigAndCode($boqConfigId, $data['code']);
                    if ($existingRecord && $existingRecord->trashed()) {
                        return "trashed";
                    } elseif (!$existingRecord) {
                        $data['boq_config_id'] = $boqConfigId;
                        $this->manufacturingConfigRepository->create($data);
                    }
                }
            }
            // Commit the transaction if all updates are successful
            DB::commit();

            return true;
        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();
            return false;

        }
    }

    // public function updateOrCreateAllMaterials($boqtype, $boqConfigId, Request $request)
    public function updateOrCreateAllMaterials($boqConfigId, Request $request)
    {
        // dd($boqtype);
        // dd($request->all());
// $boqConfigId=$request->boqconfigid;
// dd($boqConfigId);
        // dd($request->input('extra_material_configs'));
        DB::beginTransaction();

        // try {
        // $boqConfigId = $request->input('boqconfigid'); // Get boqconfigid
        //  dd($boqConfigId);
        // dd($request->input('extra_material_configs'));
        // Loop through the 'manufacturing' data and update each record
        if ($request->input('material_configs')) {
            foreach ($request->input('material_configs') as $key => $data) {
                // dd( $data[key($data)]['item_code']);
                $existingRecord = $this->materialConfigRepository->getByBoqConfigAndCode($boqConfigId, key($data));
                // dd($existingRecord);
                if ($existingRecord && $existingRecord->trashed()) {
                    // Restore soft-deleted record
                    $existingRecord->restore();

                    $this->materialConfigRepository->update($key, [$data[key($data)]['specs']]);

                }
                // elseif (!$existingRecord) {
                //     $data['boq_config_id'] = $boqConfigId;

                //     $this->materialConfigRepository->create($data);

                // }
                else {

                    $this->materialConfigRepository->update($key, ['specs' => $data[key($data)]['specs']]);
                }


            }
        }
        if ($request->input('extra_material_configs')) {
            $data = [];
            $boqtype = $this->boqConfigRepository->find($boqConfigId)->type;
            // dd($boqtype);
            // dd($request->input('extra_material_configs'));
            foreach ($request->input('extra_material_configs') as $key => $item) {
                // dd($boqtype);
                if ($boqtype === 'Basket') {
                    $data['product_id'] = $item['product_id'];
                    $product = $this->productService->getproductById($data['product_id']);
                    $code = optional($product->attributes->where('name', 'code')->first())->value ?? null;

                    // $code = $product->attributes->where('name', 'code')->first()->value;
                    // $isexist=$this->materialConfigRepository->getCode($code);
                    // dd($isexist);
                    if ($code) {
                        $data['common'] = 1;
                        $data['weight_kg_formula'] = '{{length*no*weight_per_unit}}';
                    } else {
                        $data['common'] = 0;
                        $data['weight_kg_formula'] = '{{no*unit_price}}';
                    }
                    $data['name'] = $item['item_name'];
                    // $data['length'] = $item['length'];
                    // $data['no'] = $item['no'];
                    $data['specs'] = $item['specs'];
                    if ($code === 'rods') {
                        for ($i = 1; $i <= 6; $i++) {
                            switch ($i) {
                                case 1:

                                    $data['item_code'] = 'top_bottom_rods_length';
                                    $parts = explode('_', $data['item_code']);
                                    // dd($parts);
                                    // Combine the first two parts with 'And'
                                    if (count($parts) >= 2) {
                                        $sides = ucfirst($parts[0]) . ' And ' . ucfirst($parts[1]);
                                    }
                                    $data['sides'] = $sides;
                                    $data['length_formula'] = "{{length}}";
                                    $data['no_formula'] = "{{(width/10+1)*2}}";
                                    break;

                                case 2:
                                    $data['item_code'] = 'top_bottom_rods_width';
                                    $parts = explode('_', $data['item_code']);

                                    // Combine the first two parts with 'And'
                                    if (count($parts) >= 2) {
                                        $sides = ucfirst($parts[0]) . ' And ' . ucfirst($parts[1]);
                                    }
                                    $data['sides'] = $sides;
                                    $data['length_formula'] = "{{width}}";
                                    $data['no_formula'] = "{{(length/10+1)*2}}";

                                    break;
                                case 3:
                                    $data['item_code'] = 'left_right_rods_height';
                                    $parts = explode('_', $data['item_code']);

                                    // Combine the first two parts with 'And'
                                    if (count($parts) >= 2) {
                                        $sides = ucfirst($parts[0]) . ' And ' . ucfirst($parts[1]);
                                    }
                                    $data['sides'] = $sides;
                                    $data['length_formula'] = "{{height}}";
                                    $data['no_formula'] = "{{(width/10+1)*(length>100?3:2)}}";


                                    break;
                                case 4:
                                    $data['item_code'] = 'left_right_rods_width';
                                    $parts = explode('_', $data['item_code']);

                                    // Combine the first two parts with 'And'
                                    if (count($parts) >= 2) {
                                        $sides = ucfirst($parts[0]) . ' And ' . ucfirst($parts[1]);
                                    }
                                    $data['sides'] = $sides;
                                    $data['length_formula'] = "{{width}}";
                                    $data['no_formula'] = "{{((width/maze+1)*2)(length>100?3:2)}}";



                                    break;
                                case 5:
                                    $data['item_code'] = 'front_back_rods_height';
                                    $parts = explode('_', $data['item_code']);

                                    // Combine the first two parts with 'And'
                                    if (count($parts) >= 2) {
                                        $sides = ucfirst($parts[0]) . ' And ' . ucfirst($parts[1]);
                                    }
                                    $data['sides'] = $sides;
                                    $data['length_formula'] = "{{height}}";
                                    $data['no_formula'] = "{{(length/10+1)*2}}";

                                    break;
                                case 6:
                                    $data['item_code'] = 'front_back_rods_length';
                                    $parts = explode('_', $data['item_code']);

                                    // Combine the first two parts with 'And'
                                    if (count($parts) >= 2) {
                                        $sides = ucfirst($parts[0]) . ' And ' . ucfirst($parts[1]);
                                    }
                                    $data['sides'] = $sides;
                                    $data['length_formula'] = "{{length}}";
                                    $data['no_formula'] = "{{(height/maze+1)*2}}";

                                    break;
                            }

                            $data['price_formula'] = '{{unit_price*weight_kg}}';

                            $existingRecord = $this->materialConfigRepository->getByBoqConfigAndCode($boqConfigId, $data);

                            if (!$existingRecord) {
                                $data['boq_config_id'] = $boqConfigId;
                                // dd($data);
                                $this->materialConfigRepository->create($data);

                            }
                        }
                    } elseif ($code === 'spirals') {
                        $data['item_code'] = $code;
                        $data['sides'] = "";
                        $data['weight_kg_formula'] = '{{length*weight_per_unit}}';
                        $data['price_formula'] = '{{unit_price*weight_kg}}';
                        $data['length_formula'] = "{{(4*(length+width+height))}}";
                        $data['no_formula'] = "N/A";
                        $existingRecord = $this->materialConfigRepository->getByBoqConfigAndCode($boqConfigId, $data);

                        if (!$existingRecord) {
                            $data['boq_config_id'] = $boqConfigId;
                            // dd($data);
                            $this->materialConfigRepository->create($data);

                        }
                    } else {
                        $data['item_code'] = $product->name;
                        $data['sides'] = "";
                        $data['weight_kg_formula'] = '';
                        $data['price_formula'] = '{{unit_price*no}}';

                        $existingRecord = $this->materialConfigRepository->getByBoqConfigAndCode($boqConfigId, $data);

                        if (!$existingRecord) {
                            $data['boq_config_id'] = $boqConfigId;
                            // dd($data);
                            $this->materialConfigRepository->create($data);

                        }
                    }

                }
            }
        }

        // }

        // dd("done");
        // Commit the transaction if all updates are successful
        DB::commit();

        return true;
        // } catch (\Exception $e) {
        //     // Rollback the transaction if something goes wrong
        //     DB::rollBack();
        //     return false;

        // }
    }
    public function updateOrCreateAllTaxes($boqConfigId, Request $request)
    {
        // Start a database transaction to ensure data integrity
// dd($request);
        DB::beginTransaction();
        // try {
        if ($request->input('taxes')) {
            foreach ($request->input('taxes') as $key => $data) {
                // dd($key);
                $existingRecord = $this->taxesConfigRepository->getByBoqConfigAndCode($boqConfigId, $data['code']);
                if ($existingRecord && $existingRecord->trashed()) {
                    return "trashed";
                } else {

                    $this->taxesConfigRepository->update($key, $data);
                }
            }
        }
        if ($request->input('extra_taxes')) {
            foreach ($request->input('extra_taxes') as $key => $data) {
                $existingRecord = $this->taxesConfigRepository->getByBoqConfigAndCode($boqConfigId, $data['code']);
                if ($existingRecord && $existingRecord->trashed()) {
                    return "trashed";
                } elseif (!$existingRecord) {
                    $data['boq_config_id'] = $boqConfigId;
                    $this->taxesConfigRepository->create($data);
                }
            }
        }
        // Commit the transaction if all updates are successful
        DB::commit();

        return true;
        // } catch (\Exception $e) {
        //     // Rollback the transaction if something goes wrong
        //     DB::rollBack();
        //     return false;

        // }
    }

    public function updateOrCreateAllMarginFactors($boqConfigId, Request $request)
    {
        // Start a database transaction to ensure data integrity

        DB::beginTransaction();

        try {
            // $boqConfigId = $request->input('boqconfigid'); // Get boqconfigid
// dd($request->all());
            // Loop through the 'manufacturing' data and update each record
            foreach ($request->input('margin_factors') as $key => $data) {

                if ($key == 0) {
                    $this->boqConfigRepository->update($boqConfigId, ['margin_factor' => $data['margin_factor']]);
                } else {
                    $data['country_id'] = $key;
                    $data['boq_config_id'] = $boqConfigId;


                    $existingRecord = $this->marginFactorsConfigRepository->getByBoqConfigAndId($boqConfigId, $key, $data);
                    // dd($existingRecord);
                    if ($existingRecord && $existingRecord->trashed()) {
                        // Restore soft-deleted record
                        $existingRecord->restore();

                        $this->marginFactorsConfigRepository->update($existingRecord->id, $data);

                    } elseif (!$existingRecord) {
                        $data['boq_config_id'] = $boqConfigId;

                        $this->marginFactorsConfigRepository->create($data);

                    } else {
                        // dd($existingRecord->id);
// dd($data);
                        $this->marginFactorsConfigRepository->update($existingRecord->id, $data);

                    }
                }
                // dd($data);
            }

            // Commit the transaction if all updates are successful
            DB::commit();

            return true;
        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();
            return false;

        }
    }

    public function UpdateItem($type, $boqConfigId, Request $request)
    {
        $repositories = [
            'manufacturing' => $this->manufacturingConfigRepository,
            'materials' => $this->materialConfigRepository,
            'taxes' => $this->taxesConfigRepository,
        ];
        if (array_key_exists($type, $repositories)) {
            try {
                // Attempt to delete the item using the appropriate repository
                $item = $repositories[$type]->update($boqConfigId, $request);

                // Return true if the deletion was successful
                return $item ? true : false;
            } catch (\Exception $e) {
                // Log or handle the exception as needed
                return false;
            }
        }

        // Return false if the type is not recognized
        return false;
    }
    public function deleteItem($type, $id)
    {
        // Define a mapping of types to their respective repositories
        $repositories = [
            'manufacturing' => $this->manufacturingConfigRepository,
            'materials' => $this->materialConfigRepository,
            'taxes' => $this->taxesConfigRepository,
        ];

        // Check if the type exists in the repository map
        if (array_key_exists($type, $repositories)) {
            try {
                // Attempt to delete the item using the appropriate repository
                $item = $repositories[$type]->delete($id);

                // Return true if the deletion was successful
                return $item ? true : false;
            } catch (\Exception $e) {
                // Log or handle the exception as needed
                return false;
            }
        }

        // Return false if the type is not recognized
        return false;
    }

    public function getLastId($type)
    {

        if ($type === "manufacturing") {
            return $this->manufacturingConfigRepository->getLastId();
        }
        if ($type === "taxes") {
            return $this->taxesConfigRepository->getLastId();
        }
        if ($type === "materials") {
            return $this->materialConfigRepository->getLastId();
        }
    }
    public function checkCodeExists($type, $request)
    {

        if ($type === "manufacturing") {

            $existingRecord = $this->manufacturingConfigRepository->getCode($request)->first();
            if (!$existingRecord) {
                return false;
            }
            if ($existingRecord && $existingRecord->trashed()) {
                // Restore soft-deleted record
                // $existingRecord->restore();

                // $this->marginFactorsConfigRepository->update($existingRecord->id, $data);
                return "trashed";
            } else {
                return true;
            }

        }
        if ($type === "taxes") {
            // dd($type);
            $existingRecord = $this->taxesConfigRepository->getCode($request)->first();
            // dd($existingRecord);
            if (!$existingRecord) {

                return false;
            }
            if ($existingRecord && $existingRecord->trashed()) {

                // Restore soft-deleted record
                // $existingRecord->restore();

                // $this->marginFactorsConfigRepository->update($existingRecord->id, $data);
                return "trashed";
            } else {

                return true;
            }
            //    $existingRecord= $this->taxesConfigRepository->getCode($request);
            //    if ($existingRecord && $existingRecord->trashed()) {
            //                 // Restore soft-deleted record
            //                 // $existingRecord->restore();

            //                 // $this->marginFactorsConfigRepository->update($existingRecord->id, $data);

            //             }
        }
        if ($type === "materials") {
            //    $existingRecord= $this->materialConfigRepository->getCode($request);
            //    if ($existingRecord && $existingRecord->trashed()) {
            //                 // Restore soft-deleted record
            //                 // $existingRecord->restore();

            //                 // $this->marginFactorsConfigRepository->update($existingRecord->id, $data);

            //             }
        }
    }

    public function createSingleBasketBOQPrice($product, $cat_code)
    {
        // dd($product);
        $BasketBOQData['material_configs'] = [];
        $BasketBOQData['length'] = $product['attributes']['length'];
        $BasketBOQData['width'] = $product['attributes']['width'];
        $BasketBOQData['height'] = $product['attributes']['height'];
        $BasketBOQData['maze'] = $product['attributes']['maze'];
        $boqtype = ucfirst('basket'); // Basket,Fence
        $boqConfig = $this->getIdByType($boqtype);
        // Check if BoQ Config is found, else abort with 404
        if (!$boqConfig) {

            abort(404, 'BOQ Config not found');
        } else {
            $boqid = $boqConfig->id;
        }
        $commonmaterials = $boqConfig->materialConfigs->where('common', '1');
        $extramaterials = $boqConfig->materialConfigs->where('common', '0');

        $BasketBOQData = $this->calculateMaterialCost($BasketBOQData, $product['attributes'], $boqtype, $commonmaterials, $extramaterials, );
        $manufacturing = $boqConfig->manufacturingConfigs;
        $BasketBOQData = $this->calculateManufacturingCost($BasketBOQData, $boqtype, $manufacturing);

        //
        $taxes = $boqConfig->taxesConfigs;
        $BasketBOQData = $this->calculateTaxesCost($BasketBOQData, $boqtype, $taxes);

        $BasketBOQData['exfactory_cost'] = round($BasketBOQData['material_configs']['total_price'] + $BasketBOQData['manufacturing_configs']['total_price'] + $BasketBOQData['taxes_configs']['total_price'], 2);
        // **For All Europe******
        $country_id = 1;
        $BasketBOQData['country_id_' . $country_id]['margin_factors'] = $boqConfig->marginFactorsConfigs->where('country_id', 1)->first()->margin_factor;
        $BasketBOQData['country_id_' . $country_id]['price_without_vat_bruto'] = round(($BasketBOQData['exfactory_cost'] * $BasketBOQData['country_id_' . $country_id]['margin_factors']) / 1.23, 2);
        $BasketBOQData['country_id_' . $country_id]['price_with_vat_netto'] = round(($BasketBOQData['exfactory_cost'] * $BasketBOQData['country_id_' . $country_id]['margin_factors']), 2);
        $BasketBOQData['country_id_' . $country_id]['vat_23'] = round(($BasketBOQData['country_id_' . $country_id]['price_with_vat_netto'] - $BasketBOQData['country_id_' . $country_id]['price_without_vat_bruto']), 2);
        dd($BasketBOQData);
        return $BasketBOQData;

        // $country_margin_factors = $boqConfig->marginFactorsConfigs;
    }

    public function calculateTaxesCost($BasketBOQData, $boqtype, $taxes)
    {
        // dd($BasketBOQData);
        switch ($boqtype) {
            case 'Basket':
                $totalTaxesCost = 0;
                // dd($BasketBOQData['manufacturing_configs']['total_price']);
                $totalCost = $BasketBOQData['material_configs']['total_price'] + $BasketBOQData['manufacturing_configs']['total_price'];
                // Loop through common materials
                foreach ($taxes as $item) {
                    // dd($item);
                    $BasketBOQData['taxes_configs'][$item['id']]['percentage'] = $item['percentage'];
                    $BasketBOQData['taxes_configs'][$item['id']]['cost'] = ($item['percentage'] * $totalCost) / 100;
                    $totalTaxesCost += $BasketBOQData['taxes_configs'][$item['id']]['cost'];
                }
                $BasketBOQData['taxes_configs']['total_price'] = round($totalTaxesCost, 2);
                //   dd($BasketBOQData);
                return $BasketBOQData;
                break;
            case 'Fence':
                break;
        }
   }
   public function calculateManufacturingCost($BasketBOQData, $boqtype, $manufacturing)
    {
        // dd($BasketBOQData);
        switch ($boqtype) {
            case 'Basket':
                $totalManufacturingCost = 0;
                $totalWeight = $BasketBOQData['material_configs']['common']['total_weight_kg'];
                // Loop through common materials
                foreach ($manufacturing as $item) {
                    // dd($item);
                    $BasketBOQData['manufacturing_configs'][$item['id']]['cost_per_unit'] = $item['cost_per_unit'];
                    $BasketBOQData['manufacturing_configs'][$item['id']]['cost'] = $item['cost_per_unit'] * $totalWeight;
                    $totalManufacturingCost += $BasketBOQData['manufacturing_configs'][$item['id']]['cost'];
                }
                $BasketBOQData['manufacturing_configs']['total_price'] = round($totalManufacturingCost, 2);
                //   dd($BasketBOQData);
                return $BasketBOQData;
                break;
            case 'Fence':
                break;
        }
    }
    function evaluateFormula($formula, $variables)
    {
        // Clean the formula by removing placeholders and whitespace
        $formula = trim(str_replace(['{{', '}}'], '', $formula));

        // If formula is not applicable, return default value
        if ($formula === "N/A") {
            return 0;
        }
        // Replace variables in the formula
        foreach ($variables as $key => $value) {
            $formula = str_replace($key, $value, $formula);
        }
        // Safely evaluate the formula
        try {
            return eval ('return ' . $formula . ';');
        } catch (\Throwable $e) {
            return 0; // Handle errors gracefully
        }
    }
    public function calculateMaterialCost($BasketBOQData, $attributes, $boqtype, $commonmaterials, $extramaterials)
    {
        // dd($commonmaterials);
        switch ($boqtype) {
            case 'Basket':
                $totalMaterialCost = 0;
                $totalWeight = 0;
                // Loop through common materials
                foreach ($commonmaterials as $material) {
                    $prodIdKey = 'prod_id_' . $material->id;
                    $variables = [
                        'length' => $attributes['length'],
                        'width' => $attributes['width'],
                        'height' => $attributes['height'],
                        'maze' => ($attributes['maze'] === '10x5' ? 5 : 10),
                        'weight_per_unit' => $material->product->attributes->firstWhere('name', 'weight_per_unit')->value ?? 1,
                        'unit_price' => $material->product->attributes->firstWhere('name', 'unit_price')->value ?? 1,
                    ];
                    // Length
                    $BasketBOQData['material_configs']['common'][$prodIdKey]['length'] = $this->evaluateFormula($material->length_formula, $variables);

                    // No
                    $BasketBOQData['material_configs']['common'][$prodIdKey]['no'] = $this->evaluateFormula($material->no_formula, $variables);

                    // Weight in Kg
                    $variables['length'] = $BasketBOQData['material_configs']['common'][$prodIdKey]['length'] ?? 1;
                    $variables['no'] = $BasketBOQData['material_configs']['common'][$prodIdKey]['no'] ?? 1;
                    $BasketBOQData['material_configs']['common'][$prodIdKey]['weight_kg'] = $this->evaluateFormula($material->weight_kg_formula, $variables);
                    $totalWeight += $BasketBOQData['material_configs']['common'][$prodIdKey]['weight_kg'];

                    // Total Price in Euro
                    $variables['weight_kg'] = $BasketBOQData['material_configs']['common'][$prodIdKey]['weight_kg'] ?? 1;
                    $BasketBOQData['material_configs']['common'][$prodIdKey]['price'] = $this->evaluateFormula($material->price_formula, $variables);
                    $totalMaterialCost += $BasketBOQData['material_configs']['common'][$prodIdKey]['price'];

                    // Additional attributes
                    $BasketBOQData['material_configs']['common'][$prodIdKey]['weight_per_unit'] = $variables['weight_per_unit'];
                    $BasketBOQData['material_configs']['common'][$prodIdKey]['unit_price'] = $variables['unit_price'];
                }
                $BasketBOQData['material_configs']['common']['total_price'] = round($totalMaterialCost, 2);
                $BasketBOQData['material_configs']['common']['total_weight_kg'] = $totalWeight;

                $totalMaterialCost = 0;
                foreach ($extramaterials as $material) {
                    $prodIdKey = 'prod_id_' . $material->id;
                    $variables = [
                        'no' => $material->no,
                        'weight_per_unit' => $material->product->attributes->firstWhere('name', 'weight_per_unit')->value ?? 1,
                        'unit_price' => $material->product->attributes->firstWhere('name', 'unit_price')->value ?? 1,
                    ];
                    // Length

                    // No
                    $BasketBOQData['material_configs']['extra_material'][$prodIdKey]['no'] = $material->no;


                    // Total Price in Euro
                    $variables['weight_kg'] = $BasketBOQData['material_configs']['extra_material'][$prodIdKey]['weight_kg'] ?? 1;
                    $BasketBOQData['material_configs']['extra_material'][$prodIdKey]['price'] = $this->evaluateFormula($material->price_formula, $variables);
                    $totalMaterialCost += $BasketBOQData['material_configs']['extra_material'][$prodIdKey]['price'];

                    // Additional attributes
                    // $BasketBOQData['material_configs']['common'][$prodIdKey]['weight_per_unit'] = $variables['weight_per_unit'];
                    $BasketBOQData['material_configs']['extra_material'][$prodIdKey]['unit_price'] = $variables['unit_price'];
                }
                $BasketBOQData['material_configs']['extra_material']['total_price'] = $totalMaterialCost;
                // $BasketBOQData['material_configs']['common']['total_weight_kg']=$totalWeight;
                // dd($BasketBOQData);
                $BasketBOQData['material_configs']['total_price'] = round($BasketBOQData['material_configs']['common']['total_price'] + $BasketBOQData['material_configs']['extra_material']['total_price'], 2);
                return $BasketBOQData;
                break;
            case 'Fence':
                break;
        }
    }

}
// public function deleteBasketManufacturing( $type,$id)
// {
//     if ($type === "manufacturing") {
//         try {
//             $item = $this->manufacturingConfigRepository->delete($id);
//             return true;
//             // return response()->json(['success' => true, 'message' => 'Item deleted successfully.']);
//         } catch (\Exception $e) {
//             // return response()->json(['success' => false, 'message' => 'Error deleting item.']);

//             return false;
//         }
//     }
// }
// public function deleteBasketMaterial( $type,$id)
// {
//     if ($type === "materials") {
//         try {
//             $item = $this->materialConfigRepository->delete($id);

//             if($item){
//             return true;
//             }
//             else{
//                 return false;
//             }
//             // return response()->json(['success' => true, 'message' => 'Item deleted successfully.']);
//         } catch (\Exception $e) {
//             // return response()->json(['success' => false, 'message' => 'Error deleting item.']);

//             return false;
//         }
//     }
// }
// public function deleteBaskettaxes( $type,$id)
// {
//     if ($type === "taxes") {
//         try {
//             $item = $this->taxesConfigRepository->delete($id);

//             if($item){
//             return true;
//             }
//             else{
//                 return false;
//             }
//             // return response()->json(['success' => true, 'message' => 'Item deleted successfully.']);
//         } catch (\Exception $e) {
//             // return response()->json(['success' => false, 'message' => 'Error deleting item.']);

//             return false;
//         }
//     }
// }
