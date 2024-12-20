<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxesConfigSeeder extends Seeder
{
    public function run()
    {

        $taxesConfigs = [
            [
                'code' => 'T000001',
                'name' => 'Duties',
                'percentage' => 5, // Example percentage
                'cost' => 0,
                'boq_config_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'T000002',
                'name' => 'VAT',
                'percentage' => 23, // Example percentage
                'cost' => 0,
                'boq_config_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'T000003',
                'name' => 'Service Tax',
                'percentage' => 18, // Example percentage
                'cost' => 0,
                'boq_config_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ]
            // Add more tax configurations as needed
        ];

        DB::table('taxes_configs')->insert($taxesConfigs);
    }
}
