<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'provider_id',
        'sub_id',
        'good_price',
        'bad_price',
        'name',
        'year',
        'code'
    ];
}
