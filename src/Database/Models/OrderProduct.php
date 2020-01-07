<?php

namespace AvoRed\Framework\Database\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'product_id',
        'order_id',
        'qty',
        'price',
        'tax_amount',
    ];

    /**
     * Order Product belongs to one order.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Order Product belongs to one Product.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = (is_float($value)) ? $value : floatval(preg_replace("/[^-0-9\.]/","", $value));
    }
}
