<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class ProductProperties extends Model
{
    protected $table = 'product_properties';

    protected $fillable = [
        'style',
        'material',
        'price',
        'equipment',
        'size',
        'color',
        'purpose',
        'type',
        'kind',
        'doors',
        'product_id',
    ];

    public static function boot()
    {
        parent::boot();

        static::saved(function (self $model) {
            $propertiesList = trans('vars.properties');
            $slugAttributes = [];
            $propertiesValues = request('properties');

            foreach ($propertiesList as $property => $propertyName) {
                $slugAttributes[$property.'_slug'] = str_slug($propertiesValues[$property]);
            }

            DB::table($model->getTable())
                ->where('id', $model->id)
                ->update($slugAttributes);
        });
    }

    /**
     * Get product category.
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
