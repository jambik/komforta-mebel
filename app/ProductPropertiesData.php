<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPropertiesData extends Model
{
    protected $table = 'product_properties_data';

    protected $fillable = [
        'category_id',
        'property',
        'value',
        'name',
        'text',
        'title',
        'keywords',
        'description',
    ];
}
