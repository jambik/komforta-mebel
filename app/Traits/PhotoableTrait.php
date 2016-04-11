<?php

namespace App\Traits;

use App\Photo;
use File;
use Illuminate\Http\Request;

trait PhotoableTrait
{
    /**
     * Boot events
     */
    public static function bootPhotoableTrait()
    {
        static::deleted(function (self $model){
            $model->deletePhotos();
        });
    }

    /**
     * Photos relation
     *
     * @return mixed
     */
    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }

    /**
     * Save photo
     *
     * @param Request $request
     * @return mixed
     */
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

    /**
     * Delete photo
     *
     * @param $id
     */
    public function deletePhoto($id)
    {
        $photo = $this->photos()->findOrFail($id);

        $this->deletePhotoFile($photo);
        $this->deletePhotoModel($photo);
    }

    /**
     * Delete photo file
     *
     * @param Photo $photo
     * @return bool
     */
    public function deletePhotoFile(Photo $photo)
    {
        return File::delete($this->imagePath().DIRECTORY_SEPARATOR.$photo->image);
    }

    /**
     * Delete photo model
     *
     * @param Photo $photo
     * @return bool|null
     */
    public function deletePhotoModel(Photo $photo)
    {
        return $photo->delete();
    }

    /**
     * Delete all photos
     *
     * @return bool|null
     */
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
