<?php

namespace App\Providers;

use App\Repositories\AdminRepository;
use App\Repositories\BoqConfigRepository;
use App\Repositories\Contracts\AdminRepositoryInterface;
use App\Repositories\Contracts\BoqConfigRepositoryInterface;
use App\Repositories\Contracts\CountryRepositoryInterface;
use App\Repositories\Contracts\CurrencyRepositoryInterface;
use App\Repositories\Contracts\InventoryConfigRepositoryInterface;
use App\Repositories\Contracts\LocaleRepositoryInterface;
use App\Repositories\Contracts\ManufacturingConfigRepositoryInterface;
use App\Repositories\Contracts\MarginFactorsConfigRepositoryInterface;
use App\Repositories\Contracts\TaxesConfigRepositoryInterface;
use App\Repositories\CountryRepository;
use App\Repositories\CurrencyRepository;
use App\Repositories\InventoryConfigRepository;
use App\Repositories\LocaleRepository;
use App\Repositories\ManufacturingConfigRepository;
use App\Repositories\MarginFactorsConfigRepository;
use App\Repositories\TaxesConfigRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->bind(ManufacturingConfigRepositoryInterface::class, ManufacturingConfigRepository::class);
        $this->app->bind(TaxesConfigRepositoryInterface::class, TaxesConfigRepository::class);
        $this->app->bind(BoqConfigRepositoryInterface::class, BoqConfigRepository::class);
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(LocaleRepositoryInterface::class, LocaleRepository::class);
        $this->app->bind(CurrencyRepositoryInterface::class, CurrencyRepository::class);
        $this->app->bind(MarginFactorsConfigRepositoryInterface::class, MarginFactorsConfigRepository::class);
        $this->app->bind(InventoryConfigRepositoryInterface::class, InventoryConfigRepository::class);

        // $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
