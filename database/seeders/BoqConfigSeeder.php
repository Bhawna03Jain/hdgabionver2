<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoqConfigSeeder extends Seeder
{
    public function run()
    {
        $boqConfigs = [
            [
                'type' => 'Fence',
                'margin_factor' => 1.25,
                'json_format' => json_encode([
                    "material_configs" => [
                        "rods" => [
                            "article_no" => "1000001",
                            "hs_code" => null,
                            "item_name" => "Rods",
                            "length" => null,
                            "no" => "100",
                            "weight_per_cm" => "0.000986",
                            "unit_price" => "1",
                            "specs" => "Wire round 4mm",
                            "price" => 0
                        ],
                        "channels" => [
                            "article_no" => "1000002",
                            "hs_code" => null,
                            "item_name" => "Channels",
                            "length" => "255",
                            "no" => null,
                            "weight_per_cm" => "0.004706",
                            "unit_price" => "1",
                            "specs" => "U Channel 2mm",
                            "price" => 0
                        ],
                        "poles_on_c" => [
                            "article_no" => "1000003",
                            "hs_code" => null,
                            "item_name" => "Poles (On C)",
                            "length" => null,
                            "no" => "2",
                            "weight_per_cm" => "0.030144",
                            "unit_price" => "1",
                            "specs" => "Sq Pipe 2mm 40x60x1600",
                            "price" => 0
                        ],
                        "base_plate_on_c" => [
                            "article_no" => "1000004",
                            "hs_code" => null,
                            "item_name" => "Base Plate (On C)",
                            "length" => "100x80x0.6",
                            "no" => "2",
                            "weight_per_cm" => "0.19",
                            "unit_price" => "1",
                            "specs" => "6mm",
                            "price" => 0
                        ],
                        "poles_in_c" => [
                            "article_no" => "1000005",
                            "hs_code" => null,
                            "item_name" => "Poles (In C)",
                            "length" => null,
                            "no" => "2",
                            "weight_per_cm" => "0.030144",
                            "unit_price" => "1",
                            "specs" => "Sq Pipe 2mm 40x60x2100",
                            "price" => 0
                        ],
                        "polecovers" => [
                            "article_no" => "1000006",
                            "hs_code" => null,
                            "item_name" => "Polecovers",
                            "length" => null,
                            "no" => "2",
                            "weight_per_cm" => null,
                            "unit_price" => "0.25",
                            "specs" => null,
                            "price" => 0
                        ],
                        "brackets" => [
                            "article_no" => "1000007",
                            "hs_code" => null,
                            "item_name" => "Brackets",
                            "length" => "22x4",
                            "no" => null,
                            "weight_per_cm" => "0.14",
                            "unit_price" => "1",
                            "specs" => "2mm",
                            "price" => 0
                        ],
                        "spacers" => [
                            "article_no" => "1000008",
                            "hs_code" => null,
                            "item_name" => "Spacers",
                            "length" => null,
                            "no" => "32",
                            "weight_per_cm" => "0.004706",
                            "unit_price" => "1",
                            "specs" => "2mm",
                            "price" => 0
                        ],
                        "carriage_bolts_and_nuts_M6x25" => [
                            "article_no" => "1000009",
                            "hs_code" => null,
                            "item_name" => "Carriage Bolts and Nuts M6 x 25",
                            "length" => null,
                            "no" => null,
                            "weight_per_cm" => null,
                            "unit_price" => "0.02",
                            "specs" => null,
                            "price" => 0
                        ],
                        "bolts_for_brackets_M6x30" => [
                            "article_no" => "1000010",
                            "hs_code" => null,
                            "item_name" => "Bolts for Brackets M6 x 30",
                            "length" => null,
                            "no" => null,
                            "weight_per_cm" => null,
                            "unit_price" => "0.02",
                            "specs" => null,
                            "price" => 0
                        ]
                    ],
                    "manufacturing_config" => [
                        "galvanising" => [
                            "code" => "C000001",
                            "cost_per_unit" => "0.62",
                            "cost" => 0
                        ],
                        "freight" => [
                            "code" => "C000002",
                            "cost_per_unit" => "0.3",
                            "cost" => 0
                        ],
                        "labour" => [
                            "code" => "C000003",
                            "cost_per_unit" => "0.1",
                            "cost" => 0
                        ],
                        "factory_rental" => [
                            "code" => "C000004",
                            "cost_per_unit" => "0.05",
                            "cost" => 0
                        ],
                        "electricity" => [
                            "code" => "C000005",
                            "cost_per_unit" => "0.05",
                            "cost" => 0
                        ],
                        "misc" => [
                            "code" => "C000006",
                            "cost_per_unit" => "0",
                            "cost" => 0
                        ]
                    ],
                    "taxes" => [
                        "duties" => [
                            "percentage" => "0",
                            "cost" => 0
                        ]
                    ],
                    "fenceVat" => [
                        "vat" => [
                            "percentage" => "23",
                            "cost" => 0
                        ]
                    ],
                    "total_weight_kg" => 0,
                    "total_material_cost" => 0,
                    "total_manufacturing_cost" => 0,
                    "total_taxes" => 0,
                    "vat_cost" => 0,
                    "ex_factory_cost" => 0,
                    "margin_factor" => "2.32",
                    "price_without_vat_sp" => 0,
                    "price_with_vat" => 0,
                    "shipping_charge" => 0,
                    "coupon_amount" => 0,
                    "grand_total" => 0
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Basket',
                'margin_factor' => 1.25,
                'json_format' => json_encode([
                    "material_configs" => [
                        "rods" => [
                            "article_no" => "1000001",
                            "hs_code" => null,
                            "item_name" => "Rods",
                            "length" => null,
                            "no" => "100",
                            "weight_per_cm" => "0.000986",
                            "unit_price" => "1",
                            "specs" => "Wire round 4mm",
                            "price" => 0
                        ],
                        "channels" => [
                            "article_no" => "1000002",
                            "hs_code" => null,
                            "item_name" => "Channels",
                            "length" => "255",
                            "no" => null,
                            "weight_per_cm" => "0.004706",
                            "unit_price" => "1",
                            "specs" => "U Channel 2mm",
                            "price" => 0
                        ],
                        "poles_on_c" => [
                            "article_no" => "1000003",
                            "hs_code" => null,
                            "item_name" => "Poles (On C)",
                            "length" => null,
                            "no" => "2",
                            "weight_per_cm" => "0.030144",
                            "unit_price" => "1",
                            "specs" => "Sq Pipe 2mm 40x60x1600",
                            "price" => 0
                        ],
                        "base_plate_on_c" => [
                            "article_no" => "1000004",
                            "hs_code" => null,
                            "item_name" => "Base Plate (On C)",
                            "length" => "100x80x0.6",
                            "no" => "2",
                            "weight_per_cm" => "0.19",
                            "unit_price" => "1",
                            "specs" => "6mm",
                            "price" => 0
                        ],
                        "poles_in_c" => [
                            "article_no" => "1000005",
                            "hs_code" => null,
                            "item_name" => "Poles (In C)",
                            "length" => null,
                            "no" => "2",
                            "weight_per_cm" => "0.030144",
                            "unit_price" => "1",
                            "specs" => "Sq Pipe 2mm 40x60x2100",
                            "price" => 0
                        ],
                        "polecovers" => [
                            "article_no" => "1000006",
                            "hs_code" => null,
                            "item_name" => "Polecovers",
                            "length" => null,
                            "no" => "2",
                            "weight_per_cm" => null,
                            "unit_price" => "0.25",
                            "specs" => null,
                            "price" => 0
                        ],
                        "brackets" => [
                            "article_no" => "1000007",
                            "hs_code" => null,
                            "item_name" => "Brackets",
                            "length" => "22x4",
                            "no" => null,
                            "weight_per_cm" => "0.14",
                            "unit_price" => "1",
                            "specs" => "2mm",
                            "price" => 0
                        ],
                        "spacers" => [
                            "article_no" => "1000008",
                            "hs_code" => null,
                            "item_name" => "Spacers",
                            "length" => null,
                            "no" => "32",
                            "weight_per_cm" => "0.004706",
                            "unit_price" => "1",
                            "specs" => "2mm",
                            "price" => 0
                        ],
                        "carriage_bolts_and_nuts_M6x25" => [
                            "article_no" => "1000009",
                            "hs_code" => null,
                            "item_name" => "Carriage Bolts and Nuts M6 x 25",
                            "length" => null,
                            "no" => null,
                            "weight_per_cm" => null,
                            "unit_price" => "0.02",
                            "specs" => null,
                            "price" => 0
                        ],
                        "bolts_for_brackets_M6x30" => [
                            "article_no" => "1000010",
                            "hs_code" => null,
                            "item_name" => "Bolts for Brackets M6 x 30",
                            "length" => null,
                            "no" => null,
                            "weight_per_cm" => null,
                            "unit_price" => "0.02",
                            "specs" => null,
                            "price" => 0
                        ]
                    ],
                    "manufacturing_config" => [
                        "galvanising" => [
                            "code" => "C000001",
                            "cost_per_unit" => "0.62",
                            "cost" => 0
                        ],
                        "freight" => [
                            "code" => "C000002",
                            "cost_per_unit" => "0.3",
                            "cost" => 0
                        ],
                        "labour" => [
                            "code" => "C000003",
                            "cost_per_unit" => "0.1",
                            "cost" => 0
                        ],
                        "factory_rental" => [
                            "code" => "C000004",
                            "cost_per_unit" => "0.05",
                            "cost" => 0
                        ],
                        "electricity" => [
                            "code" => "C000005",
                            "cost_per_unit" => "0.05",
                            "cost" => 0
                        ],
                        "misc" => [
                            "code" => "C000006",
                            "cost_per_unit" => "0",
                            "cost" => 0
                        ]
                    ],
                    "taxes" => [
                        "duties" => [
                            "percentage" => "0",
                            "cost" => 0
                        ]
                    ],
                    "fenceVat" => [
                        "vat" => [
                            "percentage" => "23",
                            "cost" => 0
                        ]
                    ],
                    "total_weight_kg" => 0,
                    "total_material_cost" => 0,
                    "total_manufacturing_cost" => 0,
                    "total_taxes" => 0,
                    "vat_cost" => 0,
                    "ex_factory_cost" => 0,
                    "margin_factor" => "2.32",
                    "price_without_vat_sp" => 0,
                    "price_with_vat" => 0,
                    "shipping_charge" => 0,
                    "coupon_amount" => 0,
                    "grand_total" => 0
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Fence Parts',
                'margin_factor' => 1.20,
                'json_format' => json_encode([
                    "materials" => [
                        "Hinges",
                        "Handles",
                        "Bolts"
                    ],
                    "specifications" => [
                        "height" => "variable",
                        "width" => "customizable"
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Basket Parts',
                'margin_factor' => 1.20,
                'json_format' => json_encode([
                    "materials" => [
                        "Hinges",
                        "Handles",
                        "Bolts"
                    ],
                    "specifications" => [
                        "height" => "variable",
                        "width" => "customizable"
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'All',
                'margin_factor' => 1.20,
                'json_format' => json_encode([
                    "materials" => [
                        "Hinges",
                        "Handles",
                        "Bolts"
                    ],
                    "specifications" => [
                        "height" => "variable",
                        "width" => "customizable"
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('boq_configs')->insert($boqConfigs);
    }
}
