<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarginFactorConfig extends Model
{
    use HasFactory,SoftDeletes;

    // Define the table associated with the model
    protected $table = 'margin_factors';

    // Define the fillable properties
    protected $fillable = [
        'country_id',
        'margin_factor',
    ];

    // Define relationships
    public function country()
    {
        return $this->belongsTo(Country::class); // Assuming the Country model exists
    }
}
