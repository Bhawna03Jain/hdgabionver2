<?php

namespace App\Repositories;

use App\Models\BoqConfig;
use App\Repositories\Contracts\BoqConfigRepositoryInterface;

class BoqConfigRepository implements BoqConfigRepositoryInterface
{
    // public function getAll()
    // {
    //     return BoqConfig::all();
    // }

    public function find($id)
    {
        return BoqConfig::findOrFail($id);
    }

    // public function create(array $data)
    // {
    //     return BoqConfig::create($data);
    // }

    public function update($id, array $data)
    {

           $boqConfig = BoqConfig::findOrFail($id);

            $boqConfig->update($data);

        return $boqConfig;
    }

    // public function delete($id)
    // {
    //     $boqConfig = BoqConfig::findOrFail($id);
    //     return $boqConfig->delete();
    // }
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

}
