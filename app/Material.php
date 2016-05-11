<?php

namespace App;

use App\Traits\ResourceableTrait;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use ResourceableTrait;

    protected $table = 'materials';

    protected $fillable = ['name'];
}
