<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function product()
{
    return $this->belongsTo(Product::class);
}
protected static function booted()
{
    static::created(function ($transaction) {
        $product = $transaction->product;
        $product->quantity += $transaction->type === 'sale' ? -$transaction->quantity : $transaction->quantity;
        $product->save();
    });
}
}
