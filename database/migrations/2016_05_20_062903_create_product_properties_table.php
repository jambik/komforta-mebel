<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_properties', function (Blueprint $table) {
            $table->increments('id');

            $table->string('style')->default('');
            $table->string('style_slug')->default('');
            $table->string('material')->default('');
            $table->string('material_slug')->default('');
            $table->string('price')->default('');
            $table->string('price_slug')->default('');
            $table->string('equipment')->default('');
            $table->string('equipment_slug')->default('');
            $table->string('size')->default('');
            $table->string('size_slug')->default('');
            $table->string('color')->default('');
            $table->string('color_slug')->default('');
            $table->string('purpose')->default('');
            $table->string('purpose_slug')->default('');
            $table->string('type')->default('');
            $table->string('type_slug')->default('');
            $table->string('kind')->default('');
            $table->string('kind_slug')->default('');
            $table->string('doors')->default('');
            $table->string('doors_slug')->default('');

            $table->integer('product_id')->unsigned()->unique();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->index('product_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_properties');
    }
}
