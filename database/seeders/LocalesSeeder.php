<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locales')->insert([

            [
                'locale_code' => 'EU_en',
                'language' => 'en',
                'country_id' => 1, // Example country ID, adjust as necessary
                'date_format' => 'd/m/Y',
                'time_format' => 'H:i',
                'currency_id' => 3, // Example currency ID, adjust as necessary
                'timezone' => 'UTC',
                'direction' => 'ltr',
                'hostname' => '127.0.0.1:8000',
                'logo' => 'logo.png',
                'favicon' => 'favicon.ico',
            ],

        ]);
    }
}
