<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxesConfig extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'percentage',
        'cost',
        'boq_config_id',
    ];

    public function boqConfig()
    {
        return $this->belongsTo(BoqConfig::class);
    }
}
