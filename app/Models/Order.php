<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'order_id',
        'price',
        'name',
        'email',
        'phone',
        'shipping_address',
        'status',
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function isUnpaid()
    {
        return $this->status == config('common.order.status.unpaid');
    }

    public function isPaid()
    {
        return $this->status == config('common.order.status.paid');
    }

    public function isCancel()
    {
        return $this->status == config('common.order.status.destroy');
    }

    public function isPaypal()
    {
        return $this->status == config('common.order.status.paypal');
    }
}
