<?php

namespace App;

use App\Traits\ImagableTrait;
use Illuminate\Database\Eloquent\Model;
use Rutorika\Sortable\SortableTrait;

class Slide extends Model
{
    use ImagableTrait, SortableTrait;

    protected $table = 'slides';

    protected $fillable = [
        'title',
        'text',
        'url',
        'image'
    ];
}
