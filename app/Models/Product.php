<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name', 'description', 'price', 'category_id', 'stock', 'is_active','main_image','relevant_images'];

    // Define the relationship to Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function attributes()
{
    return $this->hasMany(Attribute::class);
}
}
