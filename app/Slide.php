<?php

namespace App;

use App\Traits\ImagableTrait;
use App\Traits\ResourceableTrait;
use Illuminate\Database\Eloquent\Model;
use Rutorika\Sortable\SortableTrait;

class Slide extends Model
{
    use ImagableTrait, SortableTrait, ResourceableTrait;

    protected $table = 'slides';

    protected $fillable = [
        'title',
        'text',
        'url',
        'image'
    ];
}
