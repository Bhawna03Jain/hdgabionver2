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
        // Start a database transaction to ensure data integrity
        // dd( $boqConfigId);
        DB::beginTransaction();

        try {
            // dd($request->all());
            // $boqConfigId = $request->input('boqconfigid'); // Get boqconfigid

            // Loop through the 'manufacturing' data and update each record
            if ($request->input('manufacturing')) {
                foreach ($request->input('manufacturing') as $key => $data) {
                    // dd($key);
                    $existingRecord = $this->manufacturingConfigRepository->getByBoqConfigAndId($boqConfigId, $key);
                    // dd($existingRecord);
                    if ($existingRecord && $existingRecord->trashed()) {
                        // Restore soft-deleted record
                        $existingRecord->restore();

                        $this->manufacturingConfigRepository->update($key, $data);

                    }
                    // elseif (!$existingRecord) {
                    //     $data['boq_config_id'] = $boqConfigId;

                    //     $this->manufacturingConfigRepository->create($data);

                    // }
                    else {

                        $this->manufacturingConfigRepository->update($key, $data);
                    }


                }
            }
            if ($request->input('extra_manufacturing')) {
                foreach ($request->input('extra_manufacturing') as $key => $data) {
                    // dd($data['code']);
                    $existingRecord = $this->manufacturingConfigRepository->getByBoqConfigAndCode($boqConfigId, $data['code']);

                    // if ($existingRecord && $existingRecord->trashed()) {
                    //     // Restore soft-deleted record
                    //     $existingRecord->restore();

                    //     $this->manufacturingConfigRepository->update($key, $data);

                    // }
                    // else
                    if (!$existingRecord) {
                        $data['boq_config_id'] = $boqConfigId;
                        // dd($data);
                        $this->manufacturingConfigRepository->create($data);
                        // dd($existingRecord);
                    }
                    // else {

                    //     $this->manufacturingConfigRepository->update($key, $data);
                    // }


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

    public function updateOrCreateMaterials($boqtype, $boqConfigId, Request $request)
    {
        // dd($request->all());

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
                    $data['length'] = $item['length'];
                    $data['no'] = $item['no'];
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


break;

                                case 2:
                                    $data['item_code'] = 'top_bottom_rods_width';
                                    $parts = explode('_', $data['item_code']);

                                    // Combine the first two parts with 'And'
                                    if (count($parts) >= 2) {
                                        $sides = ucfirst($parts[0]) . ' And ' . ucfirst($parts[1]);
                                    }
                                    $data['sides'] = $sides;

                                    break;
                                case 3:
                                    $data['item_code'] = 'left_right_rods_height';
                                    $parts = explode('_', $data['item_code']);

                                    // Combine the first two parts with 'And'
                                    if (count($parts) >= 2) {
                                        $sides = ucfirst($parts[0]) . ' And ' . ucfirst($parts[1]);
                                    }
                                    $data['sides'] = $sides;

                                    break;
                                case 4:
                                    $data['item_code'] = 'left_right_rods_width';
                                    $parts = explode('_', $data['item_code']);

                                    // Combine the first two parts with 'And'
                                    if (count($parts) >= 2) {
                                        $sides = ucfirst($parts[0]) . ' And ' . ucfirst($parts[1]);
                                    }
                                    $data['sides'] = $sides;

                                    break;
                                case 5:
                                    $data['item_code'] = 'front_back_rods_height';
                                    $parts = explode('_', $data['item_code']);

                                    // Combine the first two parts with 'And'
                                    if (count($parts) >= 2) {
                                        $sides = ucfirst($parts[0]) . ' And ' . ucfirst($parts[1]);
                                    }
                                    $data['sides'] = $sides;

                                    break;
                                case 6:
                                    $data['item_code'] = 'front_back_rods_length';
                                    $parts = explode('_', $data['item_code']);

                                    // Combine the first two parts with 'And'
                                    if (count($parts) >= 2) {
                                        $sides = ucfirst($parts[0]) . ' And ' . ucfirst($parts[1]);
                                    }
                                    $data['sides'] = $sides;

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
    }    public function updateOrCreateAllTaxes($boqConfigId, Request $request)
    {
        // Start a database transaction to ensure data integrity

        DB::beginTransaction();
        // dd($request->all());
        // try {
        // $boqConfigId = $request->input('boqconfigid'); // Get boqconfigid

        // Loop through the 'manufacturing' data and update each record
        if ($request->input('taxes')) {
            foreach ($request->input('taxes') as $key => $data) {

                // $existingRecord = $this->taxesConfigRepository->getByBoqConfigAndId($boqConfigId, $key);
                $existingRecord = $this->manufacturingConfigRepository->getByBoqConfigAndId($boqConfigId, $key);

                if ($existingRecord && $existingRecord->trashed()) {
                    // Restore soft-deleted record
                    $existingRecord->restore();

                    $this->taxesConfigRepository->update($key, $data);

                }
                // elseif (!$existingRecord) {
                //     $data['boq_config_id'] = $boqConfigId;

                //     $this->taxesConfigRepository->create($data);

                // }
                else {

                    $this->taxesConfigRepository->update($key, $data);
                }


            }
        }
        if ($request->input('extra_taxes')) {
            foreach ($request->input('extra_taxes') as $key => $data) {

                // $existingRecord = $this->taxesConfigRepository->getByBoqConfigAndId($boqConfigId, $key);
                $existingRecord = $this->manufacturingConfigRepository->getByBoqConfigAndCode($boqConfigId, $data['code']);
                // dd($existingRecord);
                // if ($existingRecord && $existingRecord->trashed()) {
                //     // Restore soft-deleted record
                //     $existingRecord->restore();

                //     $this->taxesConfigRepository->update($key, $data);

                // }
                if (!$existingRecord) {
                    $data['boq_config_id'] = $boqConfigId;

                    $this->taxesConfigRepository->create($data);

                }
                // else {

                //     $this->taxesConfigRepository->update($key, $data);
                // }


            }
        }
        // dd("done");
        // Commit the transaction if all updates are successful
        DB::commit();

        return true;
        // }
        // catch (\Exception $e) {
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

            return $this->manufacturingConfigRepository->getCode($request);
        }
        if ($type === "taxes") {
            return $this->taxesConfigRepository->getCode($request);
        }
        if ($type === "materials") {
            return $this->materialConfigRepository->getCode($request);
        }
    }

    public function createSingleBasketBOQPrice($request)
    {
        // $BasketBOQData['material_configs'] = $BasketBOQData1;
        $BasketBOQData['length'] = $request['lengthvalue'];
        $BasketBOQData['height'] = $request['height'];
        $BasketBOQData['depth'] = $request['depth'];
        $BasketBOQData['poles'] = $request['poles'];
        return $this->calculateMaterialCost($BasketBOQData);
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
