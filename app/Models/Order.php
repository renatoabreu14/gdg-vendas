<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['order_date', 'customer_id', 'user_id', 'order_status_id', 'order_payment_id'];

    public function customer():BelongsTo{
        return $this->belongsTo(Customer::class);
    }

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function orderStatus():BelongsTo{
        return $this->belongsTo(OrderStatus::class);
    }

    public function orderPayment():BelongsTo{
        return $this->belongsTo(OrderPayment::class);
    }

    public function items():BelongsToMany{
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id')->withPivot('quantity', 'price_sell', 'price_buy', 'id')->withTimestamps();
    }
}
