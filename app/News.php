<?php

namespace App;

use App\Traits\ImagableTrait;
use App\Traits\ResourceableTrait;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use ImagableTrait, ResourceableTrait;

    protected $table = 'news';

    protected $fillable = ['title', 'text', 'image', 'published_at'];

    protected $dates = ['created_at', 'updated_at', 'published_at'];

    protected $appends = ['img_url'];
}
