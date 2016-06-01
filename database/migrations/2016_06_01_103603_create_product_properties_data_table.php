<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPropertiesDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_properties_data', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('category_id')->default(0);
            $table->string('property')->default('');
            $table->string('value')->default('');

            $table->string('name')->default('');
            $table->mediumText('text')->default('');
            $table->string('title')->default('');
            $table->string('keywords')->default('');
            $table->string('description')->default('');

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
        Schema::drop('product_properties_data');
    }
}
