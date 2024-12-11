<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoqConfig extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'margin_factor',
        'json_format',
    ];

    protected $casts = [
        'json_format' => 'array', // Automatically cast JSON to an array
    ];
    public function materialConfigs()
    {
        return $this->hasMany(MaterialConfig::class);
    }

    public function manufacturingConfigs()
    {
        return $this->hasMany(ManufacturingConfig::class);
    }

    public function taxesConfigs()
    {
        return $this->hasMany(TaxesConfig::class);
    }
}
