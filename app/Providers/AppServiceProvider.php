<?php

namespace App\Providers;

use App\Models\MaterialConfig;
use App\Repositories\AdminRepository;
use App\Repositories\AttributeRepository;
use App\Repositories\BoqConfigRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\Contracts\AdminRepositoryInterface;
use App\Repositories\Contracts\AttributeRepositoryInterface;
use App\Repositories\Contracts\BoqConfigRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\CountryRepositoryInterface;
use App\Repositories\Contracts\CurrencyRepositoryInterface;
use App\Repositories\Contracts\InventoryConfigRepositoryInterface;
use App\Repositories\Contracts\LocaleRepositoryInterface;
use App\Repositories\Contracts\ManufacturingConfigRepositoryInterface;
use App\Repositories\Contracts\MarginFactorsConfigRepositoryInterface;
use App\Repositories\Contracts\MaterialConfigRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\TaxesConfigRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\CountryRepository;
use App\Repositories\CurrencyRepository;
use App\Repositories\InventoryConfigRepository;
use App\Repositories\LocaleRepository;
use App\Repositories\ManufacturingConfigRepository;
use App\Repositories\MarginFactorsConfigRepository;
use App\Repositories\MaterialConfigRepository;
use App\Repositories\ProductRepository;
use App\Repositories\TaxesConfigRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->bind(AttributeRepositoryInterface::class, AttributeRepository::class);
        $this->app->bind(BoqConfigRepositoryInterface::class, BoqConfigRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(InventoryConfigRepositoryInterface::class, InventoryConfigRepository::class);
        $this->app->bind(LocaleRepositoryInterface::class, LocaleRepository::class);
        $this->app->bind(ManufacturingConfigRepositoryInterface::class, ManufacturingConfigRepository::class);
        $this->app->bind(MarginFactorsConfigRepositoryInterface::class, MarginFactorsConfigRepository::class);
        $this->app->bind(MaterialConfigRepositoryInterface::class, MaterialConfigRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(TaxesConfigRepositoryInterface::class, TaxesConfigRepository::class);
        $this->app->bind(CurrencyRepositoryInterface::class, CurrencyRepository::class);

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
