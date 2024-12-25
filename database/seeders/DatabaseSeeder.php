<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminsTableSeeder::class);

        $this->call(UsersTableSeeder::class);
        $this->call([
            CategoriesTableSeeder::class,
        ]);
        $this->call(BoqConfigSeeder::class);


        $this->call(CurrencySeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(LocalesSeeder::class);

        $this->call(ProductsTableSeeder::class);
        $this->call(AttributesTableSeeder::class);
        // $this->call(ExchangeRateSeeder::class);
         $this->call(ManufacturingConfigSeeder::class);
        $this->call(TaxesConfigSeeder::class);

        $this->call(MarginFactorsConfigSeeder::class);
            // $this->call(MaterialConfigSeeder::class);
    }
}
