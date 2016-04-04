<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $table = 'articles';

    protected $fillable = ['name', 'slug', 'text', 'title', 'keywords', 'description'];

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];
}
