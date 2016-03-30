<?php

namespace App\Traits;

use App\Photo;
use File;
use Illuminate\Http\Request;

trait PhotoableTrait
{
    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }

    public function savePhoto(Request $request)
    {
        $imageName      = strtolower(class_basename($this)).'-'.$this->id;
        $imageExtension = strtolower($request->file('photo')->getClientOriginalExtension());

        $photoFile = $request->file('photo')->move($this->imagePath(), $imageName.'-'.uniqid().'.'.$imageExtension);

        $item = $this->photos()->create([
            'image'   => $photoFile->getFilename(),
            'img_url' => $this->imageUrl(),
        ]);

        return $item['image'];
    }

    public function deletePhoto($id)
    {
        $photo = $this->photos()->findOrFail($id);

        $this->deletePhotoFile($photo);
        $this->deletePhotoRow($photo);
    }

    public function deletePhotoFile(Photo $photo)
    {
        return File::delete($this->imagePath().DIRECTORY_SEPARATOR.$photo->image);
    }

    public function deletePhotoRow(Photo $photo)
    {
        return $photo->delete();
    }

    public function deletePhotos()
    {
        if ($this->photos->count()) {
            foreach ($this->photos as $photo) {
                $this->deletePhoto($photo->id);
            }

            return true;
        }

        return null;
    }

}
