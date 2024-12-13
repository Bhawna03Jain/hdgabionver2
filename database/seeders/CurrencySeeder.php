<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    // php artisan db:seed --class=CurrencySeeder
    DB::table('currencies')->insert([
        [
            'currency_code' => 'CZK',
            'currency_name' => 'Czech Koruna',
            'currency_symbol' => 'Kč',
            'is_base_currency' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],
        [
            'currency_code' => 'PLN',
            'currency_name' => 'Polish Zloty',
            'currency_symbol' => 'zł',
            'is_base_currency' => false,
              'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        ],
        [
            'currency_code' => 'EUR',
            'currency_name' => 'Euro',
            'currency_symbol' => '€',
            'is_base_currency' => true, // Set EUR as base currency if needed
              'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        ],
    ]);
}

}
