<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
// use App\Services\MasterSheetBOQBasketService;
use App\Services\CountryService;
use App\Services\MasterSheetBOQConfigService;
use App\Services\MasterSheetBOQService; // Ensure this service exists and is correctly implemented
use App\Services\ProductService;
use Illuminate\Http\Request;
use Validator;

class BOQConfigController extends Controller
{
    // protected $MasterSheetBOQFenceService;
    // protected $MasterSheetBOQBasketService;
    protected $MasterSheetBOQConfigService;
    protected $countryService;
    protected $productService;
    protected $categoryService;

    public function __construct(CategoryService $categoryService, ProductService $productService, MasterSheetBOQConfigService $MasterSheetBOQConfigService, CountryService $countryService)
    {
        // $this->MasterSheetBOQFenceService = $MasterSheetBOQFenceService;
        // $this->MasterSheetBOQBasketService = $MasterSheetBOQBasketService;
        $this->MasterSheetBOQConfigService = $MasterSheetBOQConfigService;
        $this->countryService = $countryService;
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    // ****************************Fences*******************************
    public function BOQConfig($boqtype = "", $type = "")
    {
        // dd($type);
        $boqtype = ucfirst($boqtype); // Basket,Fence
        $boqConfig = $this->MasterSheetBOQConfigService->getIdByType($boqtype);

        // Check if BoQ Config is found, else abort with 404
        if (!$boqConfig) {

            abort(404, 'BOQ Config not found');
        } else {
            $boqid = $boqConfig->id;
        }
        $commonmaterials = $boqConfig->materialConfigs->where('common', '1');
        $extramaterials = $boqConfig->materialConfigs->where('common', '0');
        $manufacturing = $boqConfig->manufacturingConfigs;
        $taxes = $boqConfig->taxesConfigs;
        $country_margin_factors = $boqConfig->marginFactorsConfigs;
        $cat_codes = ['parts', 'others']; // Define an array of category codes
        $allmaterials = $this->productService->getProductsWithAttributesByCategoryCodes($cat_codes);

        if ($boqtype === 'Fence') {
            return view('admin.mastersheet.boq.fence.all', compact('boqConfig', 'allmaterials', 'taxes', 'commonmaterials', 'extramaterials', 'manufacturing', 'country_margin_factors'));

            // return view('admin.mastersheet.boq.fence.index', compact('boqConfig', 'taxes', 'commonmaterials', 'extramaterials', 'manufacturing', 'country_margin_factors'));
        } elseif ($boqtype === 'Basket') {
            //  $cat_codes = ['parts', 'others']; // Define an array of category codes
            // $allmaterials = $this->productService->getProductsWithAttributesByCategoryCodes($cat_codes);
            return view('admin.mastersheet.boq.basket.all', compact('boqConfig', 'allmaterials', 'taxes', 'commonmaterials', 'extramaterials', 'manufacturing', 'country_margin_factors'));
            // return view('admin.mastersheet.boq.basket.boq', compact('boqConfig','allmaterials', 'taxes', 'commonmaterials', 'extramaterials', 'manufacturing', 'basic_margin_factor', 'country_margin_factors'));
        }
        // dd($boqid);

        //         switch ($type) {
//             case 'materials':
//                 $commonmaterials = $boqConfig->materialConfigs->where('common', '1');
//                 $extramaterials = $boqConfig->materialConfigs->where('common', '0');
//                 $cat_codes = ['parts', 'others']; // Define an array of category codes
//                 $allmaterials = $this->productService->getProductsWithAttributesByCategoryCodes($cat_codes);
//                  if ($boqtype === 'Basket') {
//                     return view('admin.mastersheet.boq.basket.materials', compact('boqConfig', 'commonmaterials', 'extramaterials', 'allmaterials'));
//                 }
//                 if ($boqtype === 'Fence') {
//                     return view('admin.mastersheet.boq.fence.materials', compact('boqConfig', 'commonmaterials', 'extramaterials'));
//                 }
//                 break;

        //             case 'manufacturing':
//                 $manufacturing = $boqConfig->manufacturingConfigs;
//                 if ($boqtype === 'All') {
//                     return view('admin.mastersheet.boq.all.manufacturing', compact('boqConfig', 'manufacturing'));
//                 }

        //                 break;
//             case 'taxes':
//                 $taxes = $boqConfig->taxesConfigs;
//                 if ($boqtype === 'All') {
//                     return view('admin.mastersheet.boq.all.taxes', compact('boqConfig', 'taxes'));
//                 }
//                 // else {
//                 //     return view('admin.mastersheet.boq.basket.taxes', compact('boqConfig', 'taxes'));
//                 // }
//                 break;
//             case 'margin-factors':

        //                 $basic_margin_factor = $boqConfig->margin_factor;
//                 $country_margin_factors = $boqConfig->marginFactorsConfigs;
//                 // dd($country_margin_factors[0]);
//                 $countries = $this->countryService->getAllCountries();

        //                 if ($boqtype === 'All') {

        //                     return view('admin.mastersheet.boq.all.marginfactors', compact('boqConfig', 'basic_margin_factor', 'country_margin_factors', 'countries'));
//                 }
//                 // else {
//                 //     return view('admin.mastersheet.boq.basket.marginfactors', compact('boqConfig', 'basic_margin_factor', 'country_margin_factors', 'countries'));
//                 // }
//                 break;
//             case '':
//                 $commonmaterials = $boqConfig->materialConfigs->where('common', '1');
//                 $extramaterials = $boqConfig->materialConfigs->where('common', '0');
//                 $manufacturing = $boqConfig->manufacturingConfigs;
//                 $taxes = $boqConfig->taxesConfigs;
//                 $country_margin_factors = $boqConfig->marginFactorsConfigs;
//                  if ($boqtype === 'Fence') {

        //                     return view('admin.mastersheet.boq.fence.index', compact('boqConfig', 'taxes', 'commonmaterials', 'extramaterials', 'manufacturing', 'country_margin_factors'));
//                 } elseif ($boqtype === 'Basket') {
//                      $cat_codes = ['parts', 'others']; // Define an array of category codes
//                     $allmaterials = $this->productService->getProductsWithAttributesByCategoryCodes($cat_codes);
//  return view('admin.mastersheet.boq.basket.all', compact('boqConfig', 'allmaterials', 'taxes', 'commonmaterials', 'extramaterials', 'manufacturing', 'country_margin_factors'));
//                     // return view('admin.mastersheet.boq.basket.boq', compact('boqConfig','allmaterials', 'taxes', 'commonmaterials', 'extramaterials', 'manufacturing', 'basic_margin_factor', 'country_margin_factors'));
//                 }
//                 break;
//             default:
//                 abort(404, 'Invalid BOQ type.');
//         }
        // Handle different views based on the $type parameter
        // switch ($type) {
        //     case 'materials':
        //         $commonmaterials = $boqConfig->materialConfigs->where('common', '1');
        //         $extramaterials = $boqConfig->materialConfigs->where('common', '0');
        //         if ($boqtype === 'Fence') {
        //             return view('admin.mastersheet.boq.fence.materials', compact('boqConfig', 'commonmaterials', 'extramaterials'));
        //         } else {
        //             return view('admin.mastersheet.boq.basket.materials', compact('boqConfig', 'commonmaterials', 'extramaterials'));

        //         }
        //     case 'manufacturing':
        //         $manufacturing = $boqConfig->manufacturingConfigs;
        //         if ($boqtype === 'Fence') {

        //             return view('admin.mastersheet.boq.fence.manufacturing', compact('boqConfig', 'manufacturing'));
        //         } else {
        //             // dd("basket");
        //             return view('admin.mastersheet.boq.basket.manufacturing', compact('boqConfig', 'manufacturing'));
        //         }

        //     case 'taxes':
        //         $taxes = $boqConfig->taxesConfigs;
        //         if ($boqtype === 'Fence') {
        //             return view('admin.mastersheet.boq.fence.taxes', compact('boqConfig', 'taxes'));
        //         } else {
        //             return view('admin.mastersheet.boq.basket.taxes', compact('boqConfig', 'taxes'));
        //         }
        //     case 'margin-factors':
        //         $basic_margin_factor = $boqConfig->margin_factor;
        //         $country_margin_factors = $boqConfig->marginFactorsConfigs;
        //         // dd($country_margin_factors[0]);
        //         $countries = $this->countryService->getAllCountries();
        //         if ($boqtype === 'Fence') {

        //             return view('admin.mastersheet.boq.fence.marginfactors', compact('boqConfig', 'basic_margin_factor', 'country_margin_factors', 'countries'));
        //         } else {
        //             return view('admin.mastersheet.boq.basket.marginfactors', compact('boqConfig', 'basic_margin_factor', 'country_margin_factors', 'countries'));
        //         }
        //     case '':
        //         $commonmaterials = $boqConfig->materialConfigs->where('common', '1');
        //         $extramaterials = $boqConfig->materialConfigs->where('common', '0');
        //         $manufacturing = $boqConfig->manufacturingConfigs;
        //         $taxes = $boqConfig->taxesConfigs;
        //         $basic_margin_factor = $boqConfig->margin_factor;
        //         $country_margin_factors = $boqConfig->marginFactorsConfigs;
        //         // $countries = $this->countryService->getAllCountries();
        //         if ($boqtype === 'Fence') {

        //             return view('admin.mastersheet.boq.fence.index', compact('boqConfig', 'taxes', 'commonmaterials', 'extramaterials', 'manufacturing', 'basic_margin_factor', 'country_margin_factors'));
        //         } else {
        //             return view('admin.mastersheet.boq.basket.index', compact('boqConfig', 'taxes', 'commonmaterials', 'extramaterials', 'manufacturing', 'basic_margin_factor', 'country_margin_factors'));
        //         }
        //     default:
        //         abort(404, 'Invalid BOQ type.');
        // }
    }

    public function storeOrUpdateConfig($boqtype = "", $type = "", Request $request)
    {
        // dd($type);
// dd($request->all());
// dd($boqtype);
        // $boqtype = ucfirst($boqtype); // Basket,Fence
        // $boqConfig = $this->MasterSheetBOQConfigService->getIdByType($boqtype);
// dd($boqConfig);
        $boqConfig = $this->MasterSheetBOQConfigService->getByBoqId($request->boqconfigid);
        // dd($boqConfig->type);
        // Check if BoQ Config is found, else abort with 404
        if (!$boqConfig) {
            abort(404, 'BOQ Config not found');
        } else {
            $boqid = $request->boqconfigid;
        }
        $validationRules = [
            'materials' => [
                // 'boqconfigid' => 'required|exists:boq_configs,id',
            ],
            'manufacturing' => [
                // 'boqconfigid' => 'required|exists:boq_configs,id',
                'manufacturing.*.code' => 'required|string',
                'manufacturing.*.name' => 'required|string',
                'manufacturing.*.cost_per_unit' => 'required',
            ],
            'taxes' => [
                // 'boqconfigid' => 'required|exists:boq_configs,id',
                'taxes.*.code' => 'required|string',
                'taxes.*.name' => 'required|string',
                'taxes.*.percentage' => 'required',
            ],
            'margin_factors' => [
                // 'boqconfigid' => 'required|exists:boq_configs,id',
                'margin_factors.*.country_name' => 'required',
                'margin_factors.*.margin_factor' => 'required',
            ],
        ];

        $customMessages = [
            // 'boqconfigid.required' => 'There is No data to update',
            // 'boqconfigid.exists' => 'The selected BoQ Config ID does not exist',
            'manufacturing.*.code.required' => 'Code is required for each manufacturing item',
            'manufacturing.*.name.required' => 'Name is required for each manufacturing item',
            'manufacturing.*.cost_per_unit.required' => 'Cost per unit is required for each manufacturing item',
            // 'manufacturing.*.cost_per_unit.numeric' => 'Cost per unit must be a valid number',
            'taxes.*.code.required' => 'Code is required for each taxes item',
            'taxes.*.name.required' => 'Name is required for each taxes item',
            'taxes.*.percentage.required' => 'Percentage is required for each taxes item',
            // 'taxes.*.percentage.numeric' => 'Percentage must be a valid number',

            'margin_factors.boqconfigid.required' => 'The BOQ Config ID for margin factors is required.',
            'margin_factors.boqconfigid.exists' => 'The selected BOQ Config ID for margin factors does not exist.',
            'margin_factors.*.country_id.required' => 'The country ID is required for each margin factor.',
            'margin_factors.*.margin_factor.required' => 'The margin factor is required for each country.',

        ];

        // If $type is empty, merge all validation rules into one
        if (empty($type)) {
            $combinedRules = array_merge(
                $validationRules['materials'],
                $validationRules['manufacturing'],
                $validationRules['taxes'],
                $validationRules['margin_factors']
            );
            $validator = Validator::make($request->all(), $combinedRules, $customMessages);
        } elseif (array_key_exists($type, $validationRules)) {
            // Run validation for the specified type
            $validator = Validator::make($request->all(), $validationRules[$type], $customMessages);
        } else {
            // Invalid $type
            return response()->json([
                'status' => 'false',
                'type' => 'error',
                'errors' => ['Invalid BOQ type.'],
            ], 400);
        }

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'false',
                'type' => 'error',
                'errors' => $validator->messages(),
            ]);
        }

        // try {
        if (!empty($type)) {
            if ($type === 'margin_factors') {

                $method = 'updateOrCreateAll' . str_replace(' ', '', ucwords(str_replace('_', ' ', $type)));

                $this->MasterSheetBOQConfigService->$method($boqid, $request);

                return response()->json([
                    'status' => 'success',
                    'type' => 'success',
                    'message' => empty($type) ? "/admin/mastersheet/boq/{$boqtype}" : "/admin/mastersheet/boq/{$boqtype}/margin-factors",
                ], 200);
            } else if ($type === 'materials') {
                // dd($request->all());
                $method = 'updateOrCreate' . ucfirst($type);
                $this->MasterSheetBOQConfigService->$method($boqtype, $boqid, $request);
                return response()->json([
                    'status' => 'success',
                    'type' => 'success',
                    'message' => empty($type) ? "/admin/mastersheet/boq/{$boqtype}" : "/admin/mastersheet/boq/{$boqtype}/{$type}",
                ], 200);
            } else {
                // dd($boqConfig->id);
                $method = 'updateOrCreateAll' . ucfirst($type);
                $this->MasterSheetBOQConfigService->$method($boqid, $request);
                return response()->json([
                    'status' => 'success',
                    'type' => 'success',
                    'message' => empty($type) ? "/admin/mastersheet/boq/{$boqtype}" : "/admin/mastersheet/boq/" . strtolower($boqConfig->type),

                ], 200);
            }

        } else {
            // Call all methods if $type is empty

            $this->MasterSheetBOQConfigService->updateOrCreateMaterials($request);

            $this->MasterSheetBOQConfigService->updateOrCreateManufacturing($request);

            $this->MasterSheetBOQConfigService->updateOrCreateTaxes($request);

            $this->MasterSheetBOQConfigService->updateOrCreateMarginfactors($request);
        }

        // } catch (\Exception $e) {
        //     \Log::error("Fence configuration update error: " . $e->getMessage());
        //     return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
        // }
    }

    public function deleteConfig($boqtype = "", $type = "", $id, Request $request)
    {

        // $validTypes = ['materials', 'manufacturing', 'taxes'];

        // // Check if the given type is valid
        // if (in_array($type, $validTypes)) {
        try {
            dd($request->all());
            $result = $this->MasterSheetBOQConfigService->deleteItem($type, $id);
            // Define a valid types array or mapping to avoid multiple elseif checks
            dd($result);
            //         // Call the service to delete the item
            //         $result = $this->MasterSheetBOQConfigService->deleteFenceItem($type, $id);

            //         // Check if deletion was successful and return appropriate response
            if ($result) {
                return response()->json([
                    'status' => 'success',
                    'type' => 'success',
                    'message' => '/admin/mastersheet/boq/fence/' . $type,  // Use dynamic URL based on type
                ]);
            } else {
                return response()->json(['error' => 'Something went wrong during deletion.'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
        }


        // Return error response if the type is invalid
        return response()->json(['error' => 'Invalid type provided.'], 400);
    }


    public function getLastId($boqtype = "", $type = "")
    {
        // dd($type);
        if ($type === "materials") {
            // return view('admin.mastersheet.fence.materials'); // View for materials
            $lastId = $this->MasterSheetBOQConfigService->getLastId($type);// Replace 'manufacturings' with your table name

            return response()->json(['lastId' => $lastId]);
        } elseif ($type === "manufacturing") {
            $lastId = $this->MasterSheetBOQConfigService->getLastId($type);// Replace 'manufacturings' with your table name

            return response()->json(['lastId' => $lastId]);
        } elseif ($type === "taxes") {
            $lastId = $this->MasterSheetBOQConfigService->getLastId($type);// Replace 'manufacturings' with your table name

            return response()->json(['lastId' => $lastId]);
        }
    }
    public function checkCodeExists($boqtype = "", $type, Request $request)
    {

        // $code = $request->code;
        $exists = $this->MasterSheetBOQConfigService->checkCodeExists($type, $request);
        // $exists = Manufacturing::where('code', $code)->exists();
        return response()->json(['exists' => $exists]);
    }


}
