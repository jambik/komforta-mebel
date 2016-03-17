<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'title',
        'keywords',
        'description',
        'about',
        'parent_id',
        '_lft',
        '_rgt'
    ];

    protected $appends = ['text'];

    public function getTextAttribute()
    {
        return $this->name;
    }

}
