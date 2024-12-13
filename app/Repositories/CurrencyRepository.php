<?php

namespace App\Repositories;

use App\Models\Currency;
use App\Repositories\Contracts\CurrencyRepositoryInterface;

class CurrencyRepository implements CurrencyRepositoryInterface
{
    public function getAllCurrencies()
    {
        return Currency::all();
    }

    public function findCurrencyById($id)
    {
        return Currency::findOrFail($id);
    }

    public function findCurrencyByCode($code)
    {
        return Currency::where('currency_code', $code)->first();
    }

    public function createCurrency(array $data)
    {
        return Currency::create($data);
    }

    public function updateCurrency(array $data)
    {
        $currency = $this->findCurrencyById($data['id']);
        $currency->update($data);
        return $currency;
    }

    public function deleteCurrency($id)
    {
        $currency = $this->findCurrencyById($id);
        $currency->delete();
    }
    // In CurrencyService

public function getBaseCurrency()
{
    return Currency::where('is_base_currency', true)->first();
}
}
