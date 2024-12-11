<?php

namespace App\Repositories;

use App\Models\BoqConfig;
use App\Models\ManufacturingConfig;
use App\Repositories\Contracts\ManufacturingConfigRepositoryInterface;


class ManufacturingConfigRepository implements ManufacturingConfigRepositoryInterface
{

    public function getByBoqConfigAndId($boqConfigId,$id){

    $config = ManufacturingConfig::withTrashed()
                ->where('boq_config_id', $boqConfigId)
                                 ->where('id', $id)
                                 ->first();
    return $config;
    }
    public function create(array $data)
    {

        return ManufacturingConfig::create($data);
    }

    public function update($id, array $data)
    {

           $manufacturingConfig = ManufacturingConfig::findOrFail($id);

            $manufacturingConfig->update($data);

        return $manufacturingConfig;
    }

    public function delete($id)
    {

        $boqConfig = ManufacturingConfig::findOrFail($id);
        return $boqConfig->delete();
    }
    // public function getBoqWithMaterial()
    // {
    //     $boqConfig = BoqConfig::with('materialConfigs')->first();
    //     return $boqConfig;

    // }
    // public function getBoqWithManufacturing($boqconfigid)
    // {
    //     $boqConfig = BoqConfig::where('id',$boqconfigid)->with('manufacturingConfigs')->first();
    //     return $boqConfig;

    // }
    // public function getBoqWithTaxes()
    // {
    //     $boqConfig = BoqConfig::with('taxesConfigs')->first();
    //     return $boqConfig;

    // }
    public function getIdByType($type)
    {
        return BoqConfig::where('type', $type)->first();
    }
    public function getLastId(){
        $lastId =  ManufacturingConfig::max('id');
        return $lastId;
    }
}