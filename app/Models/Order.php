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
}
