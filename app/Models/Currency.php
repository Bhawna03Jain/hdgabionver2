<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'currencies';

    // Fillable fields for mass assignment
    protected $fillable = [
        'currency_code',
        'currency_name',
        'currency_symbol',
        'is_base_currency',
    ];

    // Define the inverse relationship with ExchangeRate for target currency
    public function exchangeRates()
    {
        return $this->hasMany(ExchangeRate::class, 'currency_id');
    }

    // Define the inverse relationship with ExchangeRate for base currency
    public function baseExchangeRates()
    {
        return $this->hasMany(ExchangeRate::class, 'base_currency_id');
    }

    // Optionally, you can define a method to check if this currency is a base currency
    public function isBaseCurrency()
    {
        return $this->is_base_currency;
    }
}
