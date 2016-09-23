<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price',
        'image',
        'quantity',
        'rate_average',
        'rate_count',
        'view_count',
        'status',
    ];
}
