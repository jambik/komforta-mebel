<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('price')->default(0);
            $table->tinyInteger('material')->default(0);
            $table->text('brief')->default('');
            $table->mediumText('text')->default('');
            $table->boolean('available')->default(true);
            $table->string('title')->default('');
            $table->string('keywords')->default('');
            $table->string('description')->default('');
            $table->string('image')->default('');
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::drop('products');
    }
}
