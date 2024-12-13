<?php
namespace App\Services;

use App\Repositories\LocaleRepository;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Currencies;
class LocaleService
{
    protected $localeRepository;

    public function __construct(LocaleRepository $localeRepository)
    {
        $this->localeRepository = $localeRepository;
    }

    // Get all locales
    public function getAllLocales()
    {
        return $this->localeRepository->getAll();
    }

    // Find locale by ID
    public function getLocaleById($id)
    {
        return $this->localeRepository->findById($id);
    }

    // Create a new locale
    public function createLocale($data)
    {
        return $this->localeRepository->create($data);
    }

    // Update an existing locale
    public function updateLocale($data)
    {
        return $this->localeRepository->update($data);
    }

    // Delete a locale
    public function deleteLocale($id)
    {
        return $this->localeRepository->delete($id);
    }
    public function getAllIntlCountries()
    {
        return $countries_intl = Countries::getNames();

    }
    public function getAllIntlCurrencies()
    {
        return $currencies_intl = Currencies::getNames();

    }
    public function getLanguages()
    {
        // return $currencies_intl = Currencies::getNames();

    }

    public function getLocaleIDByHostName($hostname)
    {
        $data = $this->localeRepository->findByHostName($hostname);

        if ($data) {
            return $data->id;
        } else {
            return false;
        }

    }
    public function getHostname()
    {
        return $_SERVER['SERVER_NAME'];
    }
    public function getCountryByCountryID($countryid)
    {
        return $this->localeRepository->getCountryByCountryID($countryid);
    }
}
