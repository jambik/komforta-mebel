<?php

namespace App;

use App\Traits\ImagableTrait;
use App\Traits\PhotoableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model implements SluggableInterface
{
    use ImagableTrait, PhotoableTrait, SluggableTrait;

    protected $table = 'galleries';

    protected $fillable = ['name', 'slug', 'text', 'image'];

    protected $appends = ['img_url'];

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];
}
