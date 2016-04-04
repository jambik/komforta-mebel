<?php

namespace App;

use App\Traits\ImagableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model implements SluggableInterface
{
    use NodeTrait, ImagableTrait, SluggableTrait;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'about',
        'title',
        'keywords',
        'description',
        'image',
        'parent_id',
        '_lft',
        '_rgt'
    ];

    protected $appends = ['text', 'img_url'];

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    public function getTextAttribute()
    {
        return $this->name;
    }
}
