<?php

namespace App;

use App\Traits\ImagableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{

    use ImagableTrait;

    protected $table = 'products';

    protected $fillable = ['name', 'category_id', 'price', 'brief', 'text', 'available', 'title', 'keywords', 'description', 'image'];

    protected $casts = [
        'price' => 'float',
        'available' => 'boolean',
        'category_id' => 'int',
    ];

    protected $appends = ['img_url'];


    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }

    public function savePhoto(Request $request)
    {
        $imageName      = strtolower(class_basename($this)).'-'.$this->id;
        $imageExtension = strtolower($request->file('photo')->getClientOriginalExtension());

        $photo = $request->file('photo')->move($this->imagePath(), $imageName.'-'.uniqid().'.'.$imageExtension);

        $item = $this->photos()->create([
            'image'    => $photo->getFilename(),
            'img_url' => $this->imageUrl(),
        ]);

        return $item['image'];
    }

}
