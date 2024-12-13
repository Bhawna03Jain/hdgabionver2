<?php
namespace App\Services;

use App\Repositories\Contracts\CountryRepositoryInterface;


class CountryService
{
    protected $countryRepository;

    public function __construct(CountryRepositoryInterface $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function getAllCountries()
    {
        return $this->countryRepository->getAll();
    }

    public function getCountryById($id)
    {
        return $this->countryRepository->findById($id);
    }

    public function createCountry($data)
    {
        return $this->countryRepository->create($data);
    }

    public function updateCountry($data)
    {
        return $this->countryRepository->update($data);
    }

    public function deleteCountry($id)
    {
        return $this->countryRepository->delete($id);
    }
    public function getCountryIdByCode($code)
    {
        return $this->countryRepository->getCountryIdByCode($code)->id;
    }

}
