<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price_buy',
        'price_sell',
        'stock',
        'image',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->code = strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 6));
            while (Product::where('code', $product->code)->exists()) {
                $product->code = strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 6));
            }
        });

//
//        static::deleting(function ($product) {
//            $product->categories()->detach();
//        });
    }

    public function orders():BelongsToMany{
        return $this->belongsToMany(Order::class, 'order_items', 'order_id', 'product_id')->withPivot('quantity', 'price_sell', 'price_buy', 'id')->withTimestamps();
    }

}
