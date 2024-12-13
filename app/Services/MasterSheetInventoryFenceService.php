<?php
namespace App\Services;



use App\Repositories\BoqConfigRepository;

use App\Repositories\InventoryConfigRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MasterSheetInventoryFenceService
{
    protected $boqConfigRepository;
    protected $inventoryConfigRepository;
    public function __construct(BoqConfigRepository $boqConfigRepository, InventoryConfigRepository $inventoryConfigRepository)
    {
        $this->boqConfigRepository = $boqConfigRepository;
        $this->inventoryConfigRepository = $inventoryConfigRepository;
    }

    public function getIdByType()
    {
        return $this->boqConfigRepository->getIdByType('Fence');
    }

    public function updateOrCreateFenceInventory(Request $request)
    {
        DB::beginTransaction();

        try {
            $boqConfigId = $request->input('boqconfigid'); // Get boqconfigid
            // dd($request->input('inventory_configs'));
            // Loop through the 'manufacturing' data and update each record
            foreach ($request->input('inventory_configs') as $key => $data) {

                $existingRecord = $this->inventoryConfigRepository->getByBoqConfigAndId($boqConfigId, $key, $data);

                if ($existingRecord && $existingRecord->trashed()) {
                    // Restore soft-deleted record
                    $existingRecord->restore();

                    $this->inventoryConfigRepository->update($key, $data);

                } elseif (!$existingRecord) {
                    $data['boq_config_id'] = $boqConfigId;

                    $this->inventoryConfigRepository->create($data);

                } else {

                    $this->inventoryConfigRepository->update($key, $data);
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


    public function deleteFenceItem($type, $id)
    {
        // Define a mapping of types to their respective repositories
        $repositories = [

            'inventory' => $this->inventoryConfigRepository,

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

        return $this->inventoryConfigRepository->getLastId();

    }
}
