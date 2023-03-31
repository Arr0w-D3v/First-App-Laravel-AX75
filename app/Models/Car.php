<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    //protected $table = 'table_cars'; // if you want to use a different table name

    protected $fillable = [
        'brand',
        'name',
        'color',
        'year',
        'price_hvat',
        'price_vat',
        'description',
        'is_active',
    ];

    protected $casts = [
       'is_active' => 'boolean',
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];
}
