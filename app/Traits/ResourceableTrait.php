<?php

namespace App\Traits;

use Flash;

trait ResourceableTrait
{
    /**
     * Boot events
     */
    public static function bootResourceableTrait()
    {
        static::created(function ($model){
            Flash::success("Запись #{$model->id} сохранена");
        });

        static::updated(function ($model){
            Flash::success("Запись #{$model->id} обновлена");
        });

        static::deleted(function ($model){
            Flash::success("Запись #{$model->id} удалена");
        });
    }
}
