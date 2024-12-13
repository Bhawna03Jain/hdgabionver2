<?php

namespace App\Http\Controllers;

use App\Services\CountryService;
use Illuminate\Http\Request;
use App\Services\MasterSheetBOQFenceService; // Ensure this service exists and is correctly implemented
use Validator;
class BOQConfigController extends Controller
{
    protected $MasterSheetBOQFenceService;
    protected $countryService;

    public function __construct(MasterSheetBOQFenceService $MasterSheetBOQFenceService, CountryService $countryService)
    {
        $this->MasterSheetBOQFenceService = $MasterSheetBOQFenceService;
        $this->countryService = $countryService;
    }
    public function BOQFencesConfig($type = "")
    {
        // Fetch BoQ Config based on type 'Fence'
        $boqConfig = $this->MasterSheetBOQFenceService->getIdByType('Fence');

        // Check if BoQ Config is found, else abort with 404
        if (!$boqConfig) {
            abort(404, 'BOQ Config not found');
        }
        // Handle different views based on the $type parameter
        switch ($type) {
            case 'materials':
                $commonmaterials = $boqConfig->materialConfigs->where('common', '1');
                $extramaterials = $boqConfig->materialConfigs->where('common', '0');
                return view('admin.mastersheet.boq.fence.materials', compact('boqConfig', 'commonmaterials', 'extramaterials'));

            case 'manufacturing':
                $manufacturing = $boqConfig->manufacturingConfigs;
                return view('admin.mastersheet.boq.fence.manufacturing', compact('boqConfig', 'manufacturing'));

            case 'taxes':
                $taxes = $boqConfig->taxesConfigs;
                return view('admin.mastersheet.boq.fence.taxes', compact('boqConfig', 'taxes'));
            case 'margin-factors':
                $basic_margin_factor = $boqConfig->margin_factor;
                $country_margin_factors = $boqConfig->marginFactorsConfigs;
                $countries = $this->countryService->getAllCountries();
                return view('admin.mastersheet.boq.fence.marginfactors', compact('boqConfig', 'basic_margin_factor', 'country_margin_factors', 'countries'));

            case '':
                $commonmaterials = $boqConfig->materialConfigs->where('common', '1');
                $extramaterials = $boqConfig->materialConfigs->where('common', '0');
                $manufacturing = $boqConfig->manufacturingConfigs;
                $taxes = $boqConfig->taxesConfigs;
                $basic_margin_factor = $boqConfig->margin_factor;
                $country_margin_factors = $boqConfig->marginFactorsConfigs;
                // $countries = $this->countryService->getAllCountries();
                return view('admin.mastersheet.boq.fence.index', compact('boqConfig', 'taxes', 'commonmaterials', 'extramaterials', 'manufacturing', 'basic_margin_factor', 'country_margin_factors'));

            default:
                abort(404, 'Invalid BOQ type.');
        }
    }

    public function storeOrUpdateFenceConfig(Request $request, $type = "")
    {

        // Define the validation rules and custom messages for each type
        $validationRules = [
            'materials' => [
                'boqconfigid' => 'required|exists:boq_configs,id',
            ],
            'manufacturing' => [
                'boqconfigid' => 'required|exists:boq_configs,id',
                'manufacturing.*.code' => 'required|string',
                'manufacturing.*.name' => 'required|string',
                'manufacturing.*.cost_per_unit' => 'required|numeric',
            ],
            'taxes' => [
                'boqconfigid' => 'required|exists:boq_configs,id',
                'taxes.*.code' => 'required|string',
                'taxes.*.name' => 'required|string',
                'taxes.*.percentage' => 'required|numeric',
            ],
            'margin_factors' => [
                'boqconfigid' => 'required|exists:boq_configs,id',
                'margin_factors.*.country_id' => 'required',
                'margin_factors.*.margin_factor' => 'required',
            ],
        ];

        $customMessages = [
            'boqconfigid.required' => 'BoQ Config ID is required',
            'boqconfigid.exists' => 'The selected BoQ Config ID does not exist',
            'manufacturing.*.code.required' => 'Code is required for each manufacturing item',
            'manufacturing.*.name.required' => 'Name is required for each manufacturing item',
            'manufacturing.*.cost_per_unit.required' => 'Cost per unit is required for each manufacturing item',
            'manufacturing.*.cost_per_unit.numeric' => 'Cost per unit must be a valid number',
            'taxes.*.code.required' => 'Code is required for each taxes item',
            'taxes.*.name.required' => 'Name is required for each taxes item',
            'taxes.*.percentage.required' => 'Percentage is required for each taxes item',
            'taxes.*.percentage.numeric' => 'Percentage must be a valid number',

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

        try {
            if (empty($type)) {
                // Call all methods if $type is empty

                $this->MasterSheetBOQFenceService->updateOrCreateFenceMaterials($request);

                $this->MasterSheetBOQFenceService->updateOrCreateFenceManufacturing($request);

                $this->MasterSheetBOQFenceService->updateOrCreateFenceTaxes($request);

                $this->MasterSheetBOQFenceService->updateOrCreateFenceMarginfactors($request);
            } else {
                if ($type === 'margin_factors') {

                    $method = 'updateOrCreateFence' . str_replace(' ', '', ucwords(str_replace('_', ' ', $type)));

                    $this->MasterSheetBOQFenceService->$method($request);

                    return response()->json([
                        'status' => 'success',
                        'type' => 'success',
                        'message' => empty($type) ? '/admin/mastersheet/boq/fence' : "/admin/mastersheet/boq/fence/margin-factors",
                    ], 200);
                } else {
                    $method = 'updateOrCreateFence' . ucfirst($type);
                    $this->MasterSheetBOQFenceService->$method($request);
                    return response()->json([
                        'status' => 'success',
                        'type' => 'success',
                        'message' => empty($type) ? '/admin/mastersheet/boq/fence' : "/admin/mastersheet/boq/fence/{$type}",
                    ], 200);
                }
            }

        } catch (\Exception $e) {
            \Log::error("Fence configuration update error: " . $e->getMessage());
            return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
        }
    }

    public function deleteFenceConfig($type = "", $id)
    {
        // Define a valid types array or mapping to avoid multiple elseif checks
        $validTypes = ['materials', 'manufacturing', 'taxes'];

        // Check if the given type is valid
        if (in_array($type, $validTypes)) {
            try {
                // Call the service to delete the item
                $result = $this->MasterSheetBOQFenceService->deleteFenceItem($type, $id);

                // Check if deletion was successful and return appropriate response
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
        }

        // Return error response if the type is invalid
        return response()->json(['error' => 'Invalid type provided.'], 400);
    }

    // public function deleteFenceConfig($type = "", $id)
    // {

    //     if ($type === "materials") {

    //         $result = $this->MasterSheetBOQFenceService->deleteFenceItem($type, $id);
    //         if ($result) {
    //             return response()->json([
    //                 'status' => 'success',
    //                 'type' => 'success',
    //                 'message' => '/admin/mastersheet/boq/fence/materials',
    //             ]);

    //         } else {
    //             return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
    //         }
    //         // return view('admin.mastersheet.fence.materials'); // View for materials
    //     } elseif ($type === "manufacturing") {
    //         $result = $this->MasterSheetBOQFenceService->deleteFenceItem($type, $id);
    //         if ($result) {
    //             return response()->json([
    //                 'status' => 'success',
    //                 'type' => 'success',
    //                 'message' => '/admin/mastersheet/boq/fence/manufacturing',
    //             ]);

    //         } else {
    //             return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
    //         }
    //     }elseif ($type === "taxes") {
    //         $result = $this->MasterSheetBOQFenceService->deleteFenceItem($type, $id);
    //         if ($result) {
    //             return response()->json([
    //                 'status' => 'success',
    //                 'type' => 'success',
    //                 'message' => '/admin/mastersheet/boq/fence/taxes',
    //             ]);

    //         } else {
    //             return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
    //         }
    //     }
    // }
    public function getLastId($type = "")
    {
        if ($type === "materials") {
            // return view('admin.mastersheet.fence.materials'); // View for materials
            $lastId = $this->MasterSheetBOQFenceService->getLastId($type);// Replace 'manufacturings' with your table name

            return response()->json(['lastId' => $lastId]);
        } elseif ($type === "manufacturing") {
            $lastId = $this->MasterSheetBOQFenceService->getLastId($type);// Replace 'manufacturings' with your table name

            return response()->json(['lastId' => $lastId]);
        } elseif ($type === "taxes") {
            $lastId = $this->MasterSheetBOQFenceService->getLastId($type);// Replace 'manufacturings' with your table name

            return response()->json(['lastId' => $lastId]);
        }
    }
    public function checkCodeExists($type, Request $request)
    {

        // $code = $request->code;
        $exists = $this->MasterSheetBOQFenceService->checkCodeExists($type, $request);
        // $exists = Manufacturing::where('code', $code)->exists();
        return response()->json(['exists' => $exists]);
    }

}
