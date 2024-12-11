<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MasterSheetFenceService; // Ensure this service exists and is correctly implemented
use Validator;
class BOQConfigController extends Controller
{
    protected $masterSheetFenceService;

    public function __construct(MasterSheetFenceService $masterSheetFenceService)
    {
        $this->masterSheetFenceService = $masterSheetFenceService;
    }

    public function BOQFencesConfig($type = "")
    {
        if ($type === "materials") {
            $boqConfig = $this->masterSheetFenceService->getIdByType('Fence'); // Assuming 'Fence' as the type for BOQ config
            if (!$boqConfig) {
                abort(404, 'BOQ Config not found');
            }
            $materials = $boqConfig->materialConfigs;
            return view('admin.mastersheet.fence.materials', compact('boqConfig', 'materials'));

        } elseif ($type === "manufacturing") {
            $boqConfig = $this->masterSheetFenceService->getIdByType('Fence'); // Assuming 'Fence' as the type for BOQ config
            if (!$boqConfig) {
                abort(404, 'BOQ Config not found');
            }
            $manufacturing = $boqConfig->manufacturingConfigs;
            return view('admin.mastersheet.fence.manufacturing', compact('boqConfig', 'manufacturing'));
        } elseif ($type === "taxes") {

            $boqConfig = $this->masterSheetFenceService->getIdByType('Fence'); // Assuming 'Fence' as the type for BOQ config
            if (!$boqConfig) {
                abort(404, 'BOQ Config not found');
            }
            $taxes = $boqConfig->taxesConfigs;
            return view('admin.mastersheet.fence.taxes', compact('boqConfig', 'taxes'));


        } elseif ($type === "") {
            return view('admin.mastersheet.fence.index'); // Default view for fences
        } else {
            abort(404, 'Invalid BOQ type.'); // Invalid type handling
        }
    }
    public function storeOrUpdateFenceConfig(Request $request, $type = "")
    {

        if ($type === "materials") {
            // return view('admin.mastersheet.fence.materials'); // View for materials
        } elseif ($type === "manufacturing") {
            $data = $request->all(); // Get all request data

            // Define validation rules
            $rules = [
                'boqconfigid' => 'required|exists:boq_configs,id', // Ensure boqconfigid is provided and exists

                'manufacturing.*.code' => 'required|string', // Validate code field is required and is a string
                'manufacturing.*.name' => 'required|string', // Validate name field is required and is a string
                'manufacturing.*.cost_per_unit' => 'required', // Validate cost_per_unit is required and an integer
            ];

            // Custom error messages
            $customMessages = [
                'boqconfigid.required' => 'BoQ Config ID is required',
                'boqconfigid.exists' => 'The selected BoQ Config ID does not exist',
                'manufacturing.*.code.required' => 'Code is required for each manufacturing item',
                'manufacturing.*.name.required' => 'Name is required for each manufacturing item',
                'manufacturing.*.cost_per_unit.required' => 'Cost per unit is required for each manufacturing item',
                // 'manufacturing.*.cost_per_unit.integer' => 'Cost per unit must be a valid integer',
            ];

            // Run validation
            $validator = Validator::make($data, $rules, $customMessages);

            // Check if validation fails
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'false',
                    'type' => 'error',
                    'errors' => $validator->messages(),
                ]);
            }
            $result = $this->masterSheetFenceService->updateOrCreateFenceManufacturing($request);
            if ($result) {
                return response()->json([
                    'status' => 'success',
                    'type' => 'success',
                    'message' => '/admin/mastersheet/fence/manufacturing'
                ], 200);

            } else {
                return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
            }

        } elseif ($type === "taxes") {
            $data = $request->all(); // Get all request data

            // Define validation rules
            $rules = [
                'boqconfigid' => 'required|exists:boq_configs,id', // Ensure boqconfigid is provided and exists

                'taxes.*.code' => 'required|string', // Validate code field is required and is a string
                'taxes.*.name' => 'required|string', // Validate name field is required and is a string
                'taxes.*.percentage' => 'required', // Validate percentage is required and an integer
            ];

            // Custom error messages
            $customMessages = [
                'boqconfigid.required' => 'BoQ Config ID is required',
                'boqconfigid.exists' => 'The selected BoQ Config ID does not exist',
                'taxes.*.code.required' => 'Code is required for each taxes item',
                'taxes.*.name.required' => 'Name is required for each taxes item',
                'taxes.*.percentage.required' => 'Percentage is required for each taxes item',
                // 'manufacturing.*.percentage.integer' => 'Cost per unit must be a valid integer',
            ];

            // Run validation
            $validator = Validator::make($data, $rules, $customMessages);

            // Check if validation fails
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'false',
                    'type' => 'error',
                    'errors' => $validator->messages(),
                ]);
            }
            $result = $this->masterSheetFenceService->updateOrCreateFenceTaxes($request);
            if ($result) {
                return response()->json([
                    'status' => 'success',
                    'type' => 'success',
                    'message' => '/admin/mastersheet/fence/taxes',
                ], 200);

            } else {
                return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
            }

        } elseif ($type === "") {

        } else {
            abort(404, 'Invalid BOQ type.'); // Invalid type handling
        }

    }
    public function deleteFenceConfig($type = "", $id)
    {
        if ($type === "materials") {
            // return view('admin.mastersheet.fence.materials'); // View for materials
        } elseif ($type === "manufacturing") {
            $result = $this->masterSheetFenceService->deleteFenceManufacturing($id, $type);
            if ($result) {
                return response()->json([
                    'status' => 'success',
                    'type' => 'success',
                    'message' => '/admin/mastersheet/fence/manufacturing',
                ]);

            } else {
                return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
            }
        }
    }
    public function getLastId($type = "")
    {
        if ($type === "materials") {
            // return view('admin.mastersheet.fence.materials'); // View for materials
        } elseif ($type === "manufacturing") {
            $lastId = $this->masterSheetFenceService->getLastId($type);// Replace 'manufacturings' with your table name

            return response()->json(['lastId' => $lastId]);
        }elseif ($type === "taxes") {
            $lastId = $this->masterSheetFenceService->getLastId($type);// Replace 'manufacturings' with your table name

            return response()->json(['lastId' => $lastId]);
        }
    }

}
