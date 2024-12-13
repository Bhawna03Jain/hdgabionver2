<?php

namespace App\Repositories;

use App\Models\BoqConfig;
use App\Models\InventoryConfig;
// use App\Models\InventoryConfig;
use App\Repositories\Contracts\InventoryConfigRepositoryInterface;


class InventoryConfigRepository implements InventoryConfigRepositoryInterface
{

    public function getByBoqConfigAndId($boqConfigId,$id,$data){
// dd($data);
foreach ($data as $code => $item) {
    $config = InventoryConfig::withTrashed()
    ->where('boq_config_id', $boqConfigId)
                     ->where('id', $id) ->where('item_code', $code)
                     ->first();
return $config;
}
    // $config = InventoryConfig::withTrashed()
    //             ->where('boq_config_id', $boqConfigId)
    //                              ->where('id', $id) ->where('item_code', $code)
    //                              ->first();
    // return $config;
    }
    public function create(array $data)
    {

$data['common']=0;
$data['item_code']=strtolower($data['item_name']);

// foreach ($data as $code => $item) {
    // dd($item);
    // $InventoryConfig->update($item);
    return InventoryConfig::create($data);


    }

    public function update($id, array $data)
    {

$InventoryConfig = InventoryConfig::findOrFail($id);

foreach ($data as $code => $item) {
    $InventoryConfig->update($item);
}

        return $InventoryConfig;
    }

    public function delete($id)
    {

        $boqConfig = InventoryConfig::findOrFail($id);
        return $boqConfig->delete();
    }
    // public function getBoqWithMaterial()
    // {
    //     $boqConfig = BoqConfig::with('InventoryConfigs')->first();
    //     return $boqConfig;

    // }
    // public function getBoqWithMaterial($boqconfigid)
    // {
    //     $boqConfig = BoqConfig::where('id',$boqconfigid)->with('InventoryConfigs')->first();
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
        $lastId =  InventoryConfig::max('id');
        return $lastId;
    }
}
