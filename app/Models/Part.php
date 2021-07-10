<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'code',
        'description',
        'alias',
        'name',
        'category',
        'unit',
        'import_price',
        'retail_price',
        'sale_price',
        'DVT'
    ];

    public function getImportPriceAttribute($value)
    {
        $intVal = intval($value);
        if ($intVal > 0) return number_format($intVal, 0, '', ',');
        return $value;
    }

    public function getRetailPriceAttribute($value)
    {
        $intVal = intval($value);
        if ($intVal > 0) return number_format($intVal, 0, '', ',');
        return $value;
    }

    public function getSalePriceAttribute($value)
    {
        $intVal = intval($value);
        if ($intVal > 0) return number_format($intVal, 0, '', ',');
        return $value;
    }
}
