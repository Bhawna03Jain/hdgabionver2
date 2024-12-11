<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManufacturingConfigSeeder extends Seeder
{
    public function run()
    {
        $boqConfigId = 1; // Assuming `boq_configs` table already has an entry with id 1. Adjust as necessary.

        $manufacturingConfigs = [
            [
                'code' => 'C000001',
                'name' => 'Galvanising',
                'cost_per_unit' => 62,
                'cost' => 0,
                'boq_config_id' => $boqConfigId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'C000002',
                'name' => 'Freight',
                'cost_per_unit' => 30,
                'cost' => 0,
                'boq_config_id' => $boqConfigId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'C000003',
                'name' => 'Labour',
                'cost_per_unit' => 10,
                'cost' => 0,
                'boq_config_id' => $boqConfigId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'C000004',
                'name' => 'Factory Rental',
                'cost_per_unit' => 5,
                'cost' => 0,
                'boq_config_id' => $boqConfigId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'C000005',
                'name' => 'Electricity',
                'cost_per_unit' => 5,
                'cost' => 0,
                'boq_config_id' => $boqConfigId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'C000006',
                'name' => 'Miscellaneous',
                'cost_per_unit' => 0,
                'cost' => 0,
                'boq_config_id' => $boqConfigId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('manufacturing_configs')->insert($manufacturingConfigs);
    }
}
