<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarginFactorsConfigSeeder extends Seeder
{
    public function run()
    {
        $boqConfigId = 1; // Assuming `boq_configs` table already has an entry with id 1. Adjust as necessary.

        $marginFactorsConfigs = [
            [
                'margin_factor' => 2.32,
                'discount_per' => 8,
                'country_id' => 1,
                'cost' => 0,
                'boq_config_id' => $boqConfigId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'margin_factor' => 2.32,
                'discount_per' => 8,
                'country_id' => 2,
                'cost' => 0,
                'boq_config_id' => $boqConfigId,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'margin_factor' => 2.32,
                'discount_per' => 8,
                'country_id' => 3,
                'cost' => 0,
                'boq_config_id' => $boqConfigId,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'margin_factor' => 2.32,
                'discount_per' => 8,
                'country_id' => 4,
                'cost' => 0,
                'boq_config_id' => $boqConfigId,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'margin_factor' => 2.32,
                'discount_per' => 8,
                'country_id' => 5,
                'cost' => 0,
                'boq_config_id' => $boqConfigId,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'margin_factor' => 2.32,
                'discount_per' => 8,
                'country_id' => 6,
                'cost' => 0,
                'boq_config_id' => $boqConfigId,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'margin_factor' => 2.32,
                'discount_per' => 8,
                'country_id' => 7,
                'cost' => 0,
                'boq_config_id' => $boqConfigId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'margin_factor' => 2.32,
                'discount_per' => 8,
                'country_id' => 8,
                'cost' => 0,
                'boq_config_id' => $boqConfigId,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        DB::table('margin_factors')->insert($marginFactorsConfigs);
    }
}
