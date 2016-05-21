<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProperties extends Model
{
    protected $table = 'product_properties';

    protected $fillable = [
        'style',
        'material',
        'price',
        'equipment',
        'size',
        'color',
        'purpose',
        'type',
        'kind',
        'doors',
        'product_id',
    ];

    /**
     * Get product category.
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
