<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // php artisan db:seed --class=CountrySeeder

        DB::table('countries')->insert([
            [
                'code' => 'EU',
                'name' => 'European Union',
                'timezone' => 'UTC', // Adjust as necessary
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => 'ES',
                'name' => 'Spain',
                'timezone' => 'Europe/Madrid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => 'PL',
                'name' => 'Poland',
                'timezone' => 'Europe/Warsaw',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => 'DE',
                'name' => 'Germany',
                'timezone' => 'Europe/Berlin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => 'NL',
                'name' => 'Netherlands',
                'timezone' => 'Europe/Amsterdam',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => 'SK',
                'name' => 'Slovakia',
                'timezone' => 'Europe/Bratislava',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => 'FR',
                'name' => 'France',
                'timezone' => 'Europe/Paris',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'code' => 'CZ',
                'name' => 'Czech Republic',
                'timezone' => 'Europe/Prague',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
