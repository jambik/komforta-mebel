<?php

namespace App;

use App\Traits\ResourceableTrait;
use Illuminate\Database\Eloquent\Model;

class CupboardHeight extends Model
{
    use ResourceableTrait;

    protected $table = 'cupboard_heights';

    protected $fillable = ['name'];
}
