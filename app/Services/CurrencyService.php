<?php

namespace App\Services;

use App\Repositories\Contracts\CurrencyRepositoryInterface;

class CurrencyService
{
    protected $currencyRepository;

    public function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    // Get all currencies
    public function getAllCurrencies()
    {
        return $this->currencyRepository->getAllCurrencies();
    }

    // Find a currency by ID
    public function getCurrencyById($id)
    {
        return $this->currencyRepository->findCurrencyById($id);
    }

    // Find a currency by code
    public function getCurrencyByCode($code)
    {
        return $this->currencyRepository->findCurrencyByCode($code);
    }

    // Create a new currency
    public function createCurrency(array $data)
    {
        return $this->currencyRepository->createCurrency($data);
    }

    // Update an existing currency
    public function updateCurrency(array $data)
    {
        return $this->currencyRepository->updateCurrency($data);
    }

    // Delete a currency
    public function deleteCurrency($id)
    {
        return $this->currencyRepository->deleteCurrency($id);
    }
    public function getBaseCurrency(){
        return $this->currencyRepository->getBaseCurrency();
    }
}
