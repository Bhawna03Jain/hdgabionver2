<?php

namespace App\Repositories;

use App\Models\BoqConfig;
use App\Models\MarginFactorConfig;
use App\Repositories\Contracts\MarginFactorsConfigRepositoryInterface;


class MarginFactorsConfigRepository implements MarginFactorsConfigRepositoryInterface
{

    public function getByBoqConfigAndId($boqConfigId,$id,$data){
// dd($id);
foreach ($data as $code => $item) {
    $config = MarginFactorConfig::withTrashed()
    ->where('boq_config_id', $boqConfigId)
                     ->where('country_id', $id)
                     ->first();
return $config;
}
    // $config = MarginFactorConfig::withTrashed()
    //             ->where('boq_config_id', $boqConfigId)
    //                              ->where('id', $id) ->where('item_code', $code)
    //                              ->first();
    // return $config;
    }
    public function create(array $data)
    {

// $data['common']=0;
// $data['item_code']=strtolower($data['item_name']);

// foreach ($data as $code => $item) {
    // dd($item);
    // $MarginFactorConfig->update($item);
    return MarginFactorConfig::create($data);


    }

    public function update($id, array $data)
    {
$MarginFactorConfig = MarginFactorConfig::findOrFail($id);
// dd($data);
$MarginFactorConfig->update($data);
// dd($MarginFactorConfig);
// foreach ($data as $code => $item) {
//     // dd($code);
//     $MarginFactorConfig->update($item);
// }
// dd($data);
        return $MarginFactorConfig;
    }

    public function delete($id)
    {

        $boqConfig = MarginFactorConfig::findOrFail($id);
        return $boqConfig->delete();
    }
    // public function getBoqWithMarginFactor()
    // {
    //     $boqConfig = BoqConfig::with('MarginFactorConfigs')->first();
    //     return $boqConfig;

    // }
    // public function getBoqWithMarginFactor($boqconfigid)
    // {
    //     $boqConfig = BoqConfig::where('id',$boqconfigid)->with('MarginFactorConfigs')->first();
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
        $lastId =  MarginFactorConfig::max('id');
        return $lastId;
    }
}
