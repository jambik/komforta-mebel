<?php

namespace App;

use App\Traits\ImagableTrait;
use App\Traits\PhotoableTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use ImagableTrait, PhotoableTrait;

    protected $table = 'products';

    protected $fillable = ['name', 'category_id', 'price', 'brief', 'text', 'available', 'title', 'keywords', 'description', 'image'];

    protected $casts = [
        'price' => 'float',
        'available' => 'boolean',
        'category_id' => 'int',
    ];

    protected $appends = ['img_url'];

}
