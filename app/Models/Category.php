<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'parent_id', 'category_name', 'category_image', 'description',
        'url', 'meta_title', 'meta_description', 'meta_keywords', 'status'
    ];
    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }
    // Relationship to parent category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Relationship to children categories
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Recursive relationship for fetching descendants
    public function descendants()
    {
        return $this->children()->with('descendants');
    }
    // public function attributes()
    // {
    //     return $this->belongsToMany(Attribute::class, 'category_attribute');
    // }
    /**
     * Boot method to set up model event listeners.
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            if ($category->isForceDeleting()) {
                $category->children()->forceDelete(); // Permanently delete children if force deleting
            } else {
                $category->children()->delete(); // Soft delete children if soft deleting
            }
        });

        static::restoring(function ($category) {
            $category->children()->withTrashed()->restore(); // Restore children when the parent is restored
        });
    }
}
