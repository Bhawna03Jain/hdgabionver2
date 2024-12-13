<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name', 'value', 'product_id'];

    // Define the relationship to Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
