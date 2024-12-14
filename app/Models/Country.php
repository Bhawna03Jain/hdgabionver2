<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['code', 'name','timezone'];

    // Add relationships if needed
       // Relationship with TaxRate
    //    public function taxRates()
    //    {
    //        return $this->hasMany(TaxRate::class);
    //    }
    public function marginFactors()
    {
        return $this->hasOne(MarginFactorConfig::class);
    }
}
