<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'status',
        'total',
        'product_count',
        'payment_method',
        'notes',
        'user_id',

        'contact_id',
        'shipping_fullname',
        'shipping_city',
        'shipping_postcode',
        'shipping_address',
        'shipping_phone',
        'shipping_notes'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')
            ->withPivot('product_quantity');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
