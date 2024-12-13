<?php

namespace App\Repositories;

use App\Models\BoqConfig;
use App\Models\MaterialConfig;
use App\Repositories\Contracts\MaterialConfigRepositoryInterface;


class MaterialConfigRepository implements MaterialConfigRepositoryInterface
{

    public function getByBoqConfigAndId($boqConfigId,$id,$data){
// dd($data);
foreach ($data as $code => $item) {
    $config = MaterialConfig::withTrashed()
    ->where('boq_config_id', $boqConfigId)
                     ->where('id', $id) ->where('item_code', $code)
                     ->first();
return $config;
}
    // $config = MaterialConfig::withTrashed()
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
    // $materialConfig->update($item);
    return MaterialConfig::create($data);


    }

    public function update($id, array $data)
    {

$materialConfig = MaterialConfig::findOrFail($id);

foreach ($data as $code => $item) {
    $materialConfig->update($item);
}

        return $materialConfig;
    }

    public function delete($id)
    {

        $boqConfig = MaterialConfig::findOrFail($id);
        return $boqConfig->delete();
    }
    // public function getBoqWithMaterial()
    // {
    //     $boqConfig = BoqConfig::with('materialConfigs')->first();
    //     return $boqConfig;

    // }
    // public function getBoqWithMaterial($boqconfigid)
    // {
    //     $boqConfig = BoqConfig::where('id',$boqconfigid)->with('materialConfigs')->first();
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
        $lastId =  MaterialConfig::max('id');
        return $lastId;
    }
    public function getCode($code){
        $code = MaterialConfig::where('item_code', $code)->exists();
        return $code;
    }
}
