<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name','article_no','hs_code','sku','total_price', 'category_id', 'stock', 'is_active','should_display','main_image','relevant_images'];

    // Define the relationship to Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function attributes()
{
    return $this->hasMany(Attribute::class);
}
public function materialConfig()
{
    return $this->hasMany(BoqConfig::class);
}
public function transactions()
{
    return $this->hasMany(Transaction::class);
}
}
