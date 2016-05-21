<?php

namespace App;

use App\Traits\ImageableTrait;
use App\Traits\PhotoableTrait;
use App\Traits\ResourceableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model implements SluggableInterface
{
    use ImageableTrait, PhotoableTrait, SluggableTrait, ResourceableTrait, SearchableTrait;

    protected $table = 'products';

    protected $fillable = ['name', 'slug', 'category_id', 'price', 'price_type', 'material_id', 'brief', 'text', 'available', 'title', 'keywords', 'description', 'image'];

    protected $casts = [
        'price' => 'integer',
        'available' => 'boolean',
        'category_id' => 'int',
    ];

    protected $appends = ['img_url'];

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    protected $searchable = [
        'columns' => [
            'name' => 30,
            'brief' => 20,
            'text' => 10,
        ],
    ];

    /**
     * Get product category.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get product category.
     */
    public function material()
    {
        return $this->belongsTo('App\Material');
    }

    /**
     * Get product category.
     */
    public function properties()
    {
        return $this->hasOne('App\ProductProperties');
    }
}
