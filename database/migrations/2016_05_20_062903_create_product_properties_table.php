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

            $table->string('style');
            $table->string('material');
            $table->string('price');
            $table->string('equipment');
            $table->string('size');
            $table->string('color');
            $table->string('purpose');
            $table->string('type');
            $table->string('kind');
            $table->string('doors');

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
