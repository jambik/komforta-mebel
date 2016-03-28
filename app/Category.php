<?php

namespace App;

use App\Traits\ImagableTrait;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait, ImagableTrait;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'about',
        'title',
        'keywords',
        'description',
        'image',
        'parent_id',
        '_lft',
        '_rgt'
    ];

    protected $appends = ['text', 'imgUrl'];

    public function getTextAttribute()
    {
        return $this->name;
    }

}
