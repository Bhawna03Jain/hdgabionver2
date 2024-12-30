<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialConfig extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'item_code',
        'article_no',
        'hs_code',
        'item_name',
        'length',
        'no',
        'length_formula',
        'no_formula',
        'weight_per_cm',
        'unit_price',
        'weight_kg',
        'price',
        'margin_factor',
        'selling_price',
        'specs',
        'sides',
        'maze',
        'common',
        'boq_config_id',
        'weight_kg_formula',
        'price_formula',
    ];

    public function boqConfig()
    {
        return $this->belongsTo(BoqConfig::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

