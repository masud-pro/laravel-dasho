<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'featured_image',
        'origin_price',
        'price',
        'quantity',
        'supplier_id',
        'brand_id',
        'category_id',
        'description',
    ];
}
