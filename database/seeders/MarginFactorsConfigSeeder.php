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
                'country_id' => 1,
                'cost' => 0,
                'boq_config_id' => $boqConfigId,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        DB::table('margin_factors')->insert($marginFactorsConfigs);
    }
}
