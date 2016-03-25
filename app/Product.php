<?php

namespace App;

use App\Traits\ImagableTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use ImagableTrait;

    protected $table = 'products';

    protected $fillable = ['name', 'category_id', 'price', 'brief', 'text', 'available', 'title', 'keywords', 'description', 'image'];

}
