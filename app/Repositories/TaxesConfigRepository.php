<?php

namespace App\Repositories;

use App\Models\BoqConfig;
use App\Models\TaxesConfig;
use App\Repositories\Contracts\TaxesConfigRepositoryInterface;


class TaxesConfigRepository implements TaxesConfigRepositoryInterface
{

    public function getByBoqConfigAndId($boqConfigId,$id){

    $config = TaxesConfig::withTrashed()
                ->where('boq_config_id', $boqConfigId)
                                 ->where('id', $id)
                                 ->first();
    return $config;
    }
    public function create(array $data)
    {

        return TaxesConfig::create($data);
    }

    public function update($id, array $data)
    {

           $TaxesConfig = TaxesConfig::findOrFail($id);

            $TaxesConfig->update($data);

        return $TaxesConfig;
    }

    public function delete($id)
    {

        $boqConfig = TaxesConfig::findOrFail($id);
        return $boqConfig->delete();
    }
    // public function getBoqWithMaterial()
    // {
    //     $boqConfig = BoqConfig::with('materialConfigs')->first();
    //     return $boqConfig;

    // }
    // public function getBoqWithTaxes($boqconfigid)
    // {
    //     $boqConfig = BoqConfig::where('id',$boqconfigid)->with('TaxesConfigs')->first();
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
        $lastId =  TaxesConfig::max('id');
        return $lastId;
    }
}
