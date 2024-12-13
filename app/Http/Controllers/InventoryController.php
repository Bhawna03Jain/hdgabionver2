<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\MasterSheetInventoryFenceService; // Ensure this service exists and is correctly implemented
use Validator;
class InventoryController extends Controller
{
    protected $MasterSheetInventoryFenceService;


    public function __construct(MasterSheetInventoryFenceService $MasterSheetInventoryFenceService)
    {
        $this->MasterSheetInventoryFenceService = $MasterSheetInventoryFenceService;

    }
    public function InventoryFencesConfig()
    {
        // Fetch BoQ Config based on type 'Fence'
        $boqConfig = $this->MasterSheetInventoryFenceService->getIdByType('Fence');

        // Check if BoQ Config is found, else abort with 404
        if (!$boqConfig) {
            abort(404, 'BOQ Config not found');
        }

        // Prepare common variables
        $commonmaterials = $boqConfig->materialConfigs->where('common', '1');
        $extramaterials = $boqConfig->materialConfigs->where('common', '0');
        return view('admin.mastersheet.inventory.fence.index', compact('boqConfig', 'commonmaterials', 'extramaterials'));




    }

    public function storeOrUpdateFenceConfig(Request $request )
    {

        // Define the validation rules and custom messages for each type
        $validationRules = [
            'materials' => [
                'boqconfigid' => 'required|exists:boq_configs,id',
            ],
            // 'manufacturing' => [
            //     'boqconfigid' => 'required|exists:boq_configs,id',
            //     'manufacturing.*.code' => 'required|string',
            //     'manufacturing.*.name' => 'required|string',
            //     'manufacturing.*.cost_per_unit' => 'required|numeric',
            // ],
            // 'taxes' => [
            //     'boqconfigid' => 'required|exists:boq_configs,id',
            //     'taxes.*.code' => 'required|string',
            //     'taxes.*.name' => 'required|string',
            //     'taxes.*.percentage' => 'required|numeric',
            // ],
            // 'margin_factors' => [
            //     'boqconfigid' => 'required|exists:boq_configs,id',
            //     'margin_factors.*.country_id' => 'required',
            //     'margin_factors.*.margin_factor' => 'required',
            // ],
        ];

        $customMessages = [
            'boqconfigid.required' => 'BoQ Config ID is required',
            'boqconfigid.exists' => 'The selected BoQ Config ID does not exist',
            // 'manufacturing.*.code.required' => 'Code is required for each manufacturing item',
            // 'manufacturing.*.name.required' => 'Name is required for each manufacturing item',
            // 'manufacturing.*.cost_per_unit.required' => 'Cost per unit is required for each manufacturing item',
            // 'manufacturing.*.cost_per_unit.numeric' => 'Cost per unit must be a valid number',
            // 'taxes.*.code.required' => 'Code is required for each taxes item',
            // 'taxes.*.name.required' => 'Name is required for each taxes item',
            // 'taxes.*.percentage.required' => 'Percentage is required for each taxes item',
            // 'taxes.*.percentage.numeric' => 'Percentage must be a valid number',

            // 'margin_factors.boqconfigid.required' => 'The BOQ Config ID for margin factors is required.',
            // 'margin_factors.boqconfigid.exists' => 'The selected BOQ Config ID for margin factors does not exist.',
            // 'margin_factors.*.country_id.required' => 'The country ID is required for each margin factor.',
            // 'margin_factors.*.margin_factor.required' => 'The margin factor is required for each country.',

        ];

        // If $type is empty, merge all validation rules into one
        if (empty($type)) {
            $combinedRules = array_merge(
                $validationRules['materials'],
                // $validationRules['manufacturing'],
                // $validationRules['taxes'],
                // $validationRules['margin_factors']
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
            $this->MasterSheetInventoryFenceService->updateOrCreateFenceMaterials($request);


        } catch (\Exception $e) {
            \Log::error("Fence configuration update error: " . $e->getMessage());
            return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
        }
    }


    public function deleteFenceConfig($id)
    {
        // Define a valid types array or mapping to avoid multiple elseif checks
        $validTypes = ['materials'];

        // Check if the given type is valid
        if (in_array($type, $validTypes)) {
            try {
                // Call the service to delete the item
                $result = $this->MasterSheetInventoryFenceService->deleteFenceItem($id);

                // Check if deletion was successful and return appropriate response
                if ($result) {
                    return response()->json([
                        'status' => 'success',
                        'type' => 'success',
                        'message' => '/admin/mastersheet/boq/fence',  // Use dynamic URL based on type
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

    public function getLastId()
    {
        // if ($type === "materials") {
            // return view('admin.mastersheet.fence.materials'); // View for materials
            $lastId = $this->MasterSheetInventoryFenceService->getLastId($type);// Replace 'manufacturings' with your table name

            return response()->json(['lastId' => $lastId]);
        // } elseif ($type === "manufacturing") {
        //     $lastId = $this->MasterSheetInventoryFenceService->getLastId($type);// Replace 'manufacturings' with your table name

        //     return response()->json(['lastId' => $lastId]);
        // } elseif ($type === "taxes") {
        //     $lastId = $this->MasterSheetInventoryFenceService->getLastId($type);// Replace 'manufacturings' with your table name

        //     return response()->json(['lastId' => $lastId]);
        // }
    }

}
