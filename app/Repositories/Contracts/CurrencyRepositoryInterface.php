<?php

namespace App\Repositories\Contracts;
use App\Models\Currency;

interface CurrencyRepositoryInterface
{
    public function getAllCurrencies();
    public function findCurrencyById($id);
    public function findCurrencyByCode($code);
    public function createCurrency(array $data);
    public function updateCurrency(array $data);
    public function deleteCurrency($id);
    public function getBaseCurrency();
}
