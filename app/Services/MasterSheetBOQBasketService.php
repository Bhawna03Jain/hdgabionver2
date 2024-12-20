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


class MasterSheetBOQBasketService
{
    protected $boqConfigRepository;
    protected $manufacturingConfigRepository;
    protected $taxesConfigRepository;
    protected $materialConfigRepository;
    protected $marginFactorsConfigRepository;

    public function __construct(BoqConfigRepository $boqConfigRepository, ManufacturingConfigRepository $manufacturingConfigRepository, TaxesConfigRepository $taxesConfigRepository, MaterialConfigRepository $materialConfigRepository, MarginFactorsConfigRepository $marginFactorsConfigRepository)
    {
        $this->boqConfigRepository = $boqConfigRepository;
        $this->manufacturingConfigRepository = $manufacturingConfigRepository;
        $this->taxesConfigRepository = $taxesConfigRepository;
        $this->materialConfigRepository = $materialConfigRepository;
        $this->marginFactorsConfigRepository = $marginFactorsConfigRepository;
    }

    // public function getIdByType()
    // {
    //     return $this->boqConfigRepository->getIdByType('Basket');
    // }

    public function updateOrCreateBasketManufacturing(Request $request)
    {
        // Start a database transaction to ensure data integrity
        // dd($request->all());
        DB::beginTransaction();

        try {
            $boqConfigId = $request->input('boqconfigid'); // Get boqconfigid

            // Loop through the 'manufacturing' data and update each record
            foreach ($request->input('manufacturing') as $key => $data) {
                // dd($key);
                $existingRecord = $this->manufacturingConfigRepository->getByBoqConfigAndId($boqConfigId, $key);

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

                    $this->manufacturingConfigRepository->create($data);

                }
                // else {

                //     $this->manufacturingConfigRepository->update($key, $data);
                // }


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

    public function updateOrCreateBasketMaterials(Request $request)
    {
        DB::beginTransaction();

        try {
        $boqConfigId = $request->input('boqconfigid'); // Get boqconfigid
        // dd($request->input('material_configs'));
        // Loop through the 'manufacturing' data and update each record
        foreach ($request->input('material_configs') as $key => $data) {

            $existingRecord = $this->materialConfigRepository->getByBoqConfigAndId($boqConfigId, $key, $data);

            if ($existingRecord && $existingRecord->trashed()) {
                // Restore soft-deleted record
                $existingRecord->restore();

                $this->materialConfigRepository->update($key, $data);

            }
            // elseif (!$existingRecord) {
            //     $data['boq_config_id'] = $boqConfigId;

            //     $this->materialConfigRepository->create($data);

            // }
            else {

                $this->materialConfigRepository->update($key, $data);
            }


        }
        foreach ($request->input('extra_material_configs') as $key => $data) {

            // dd($data);
            $existingRecord = $this->materialConfigRepository->getByBoqConfigAndCode($boqConfigId, $data['code']);

            // if ($existingRecord && $existingRecord->trashed()) {
            //     // Restore soft-deleted record
            //     $existingRecord->restore();

            //     $this->materialConfigRepository->update($key, $data);

            // } else
            if (!$existingRecord) {
                $data['boq_config_id'] = $boqConfigId;

                $this->materialConfigRepository->create($data);

            }
            // else {

            //     $this->materialConfigRepository->update($key, $data);
            // }


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


    public function updateOrCreateBasketTaxes(Request $request)
    {
        // Start a database transaction to ensure data integrity

        DB::beginTransaction();

        try {
            $boqConfigId = $request->input('boqconfigid'); // Get boqconfigid

            // Loop through the 'manufacturing' data and update each record
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
            foreach ($request->input('taxes') as $key => $data) {

                // $existingRecord = $this->taxesConfigRepository->getByBoqConfigAndId($boqConfigId, $key);
                $existingRecord = $this->manufacturingConfigRepository->getByBoqConfigAndCode($boqConfigId, $data['code']);

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

            // Commit the transaction if all updates are successful
            DB::commit();

            return true;
        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();
            return false;

        }
    }

    public function updateOrCreateBasketMarginFactors(Request $request)
    {
        // Start a database transaction to ensure data integrity

        // DB::beginTransaction();

        // try {
            $boqConfigId = $request->input('boqconfigid'); // Get boqconfigid

            // Loop through the 'manufacturing' data and update each record
            foreach ($request->input('margin_factors') as $key => $data) {

                if ($key == 0) {
                    $this->boqConfigRepository->update($boqConfigId, ['margin_factor' => $data['margin_factor']]);
                } else {
$data['country_id']=$key;
$data['boq_config_id']=$boqConfigId;


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


    public function deleteBasketItem($type, $id)
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

    public function getSingleBasketBOQPrice($request, $BasketBOQData1)
    {
        $BasketBOQData['material_configs'] = $BasketBOQData1;
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
