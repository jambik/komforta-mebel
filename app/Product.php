<?php

namespace App;

use App\Traits\ImagableTrait;
use App\Traits\PhotoableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements SluggableInterface
{
    use ImagableTrait, PhotoableTrait, SluggableTrait;

    protected $table = 'products';

    protected $fillable = ['name', 'slug', 'category_id', 'price', 'brief', 'text', 'available', 'title', 'keywords', 'description', 'image'];

    protected $casts = [
        'price' => 'float',
        'available' => 'boolean',
        'category_id' => 'int',
    ];

    protected $appends = ['img_url'];

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    /**
     * Get product category.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
