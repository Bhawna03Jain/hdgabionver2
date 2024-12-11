<?php
namespace App\Services;


use App\Models\BoqConfig;
use App\Repositories\BoqConfigRepository;
use App\Repositories\ManufacturingConfigRepository;
use App\Repositories\TaxesConfigRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MasterSheetFenceService
{
    protected $boqConfigRepository;
    protected $manufacturingConfigRepository;
    protected $taxesConfigRepository;




    public function __construct(BoqConfigRepository $boqConfigRepository, ManufacturingConfigRepository $manufacturingConfigRepository, TaxesConfigRepository $taxesConfigRepository)
    {
        $this->boqConfigRepository = $boqConfigRepository;
        $this->manufacturingConfigRepository = $manufacturingConfigRepository;
        $this->taxesConfigRepository = $taxesConfigRepository;


    }

    public function getIdByType()
    {
        return $this->boqConfigRepository->getIdByType('Fence');
    }

    public function updateOrCreateFenceManufacturing(Request $request)
    {
        // Start a database transaction to ensure data integrity

        DB::beginTransaction();

        try {
            $boqConfigId = $request->input('boqconfigid'); // Get boqconfigid

            // Loop through the 'manufacturing' data and update each record
            foreach ($request->input('manufacturing') as $key => $data) {

                $existingRecord = $this->manufacturingConfigRepository->getByBoqConfigAndId($boqConfigId, $key);

                if ($existingRecord && $existingRecord->trashed()) {
                    // Restore soft-deleted record
                    $existingRecord->restore();

                    $this->manufacturingConfigRepository->update($key, $data);

                } elseif (!$existingRecord) {
                    $data['boq_config_id'] = $boqConfigId;

                    $this->manufacturingConfigRepository->create($data);

                } else {

                    $this->manufacturingConfigRepository->update($key, $data);
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
    public function updateOrCreateFenceTaxes(Request $request)
    {
        // Start a database transaction to ensure data integrity

        DB::beginTransaction();

        try {
            $boqConfigId = $request->input('boqconfigid'); // Get boqconfigid

            // Loop through the 'manufacturing' data and update each record
            foreach ($request->input('taxes') as $key => $data) {

                $existingRecord = $this->taxesConfigRepository->getByBoqConfigAndId($boqConfigId, $key);

                if ($existingRecord && $existingRecord->trashed()) {
                    // Restore soft-deleted record
                    $existingRecord->restore();

                    $this->taxesConfigRepository->update($key, $data);

                } elseif (!$existingRecord) {
                    $data['boq_config_id'] = $boqConfigId;

                    $this->taxesConfigRepository->create($data);

                } else {

                    $this->taxesConfigRepository->update($key, $data);
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
    public function deleteFenceManufacturing( $type,$id)
    {
        if ($type === "manufacturing") {
            try {
                $item = $this->manufacturingConfigRepository->delete($id);
                return true;
                // return response()->json(['success' => true, 'message' => 'Item deleted successfully.']);
            } catch (\Exception $e) {
                // return response()->json(['success' => false, 'message' => 'Error deleting item.']);

                return false;
            }
        }
    }
    public function getLastId($type)
    {
        if ($type === "manufacturing") {
            return $this->manufacturingConfigRepository->getLastId();
        }
        if ($type === "taxes") {
            return $this->taxesConfigRepository->getLastId();
        }
    }
}
