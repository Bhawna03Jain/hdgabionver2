<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Locale extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'locale_code',
        'language',
        'country_id',
        'date_format',
        'time_format',
        'currency_id',
        'timezone',
        'direction',
        'hostname',
        'logo',
        'favicon'
    ];

    // Relationship to Country
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // Relationship to Currency
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
