<?php

use Illuminate\Support\Facades\Schema;
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
            $table->bigIncrements('id');
            /*$table->string('image_1', 100)->nullable();
            $table->string('image_2', 100)->nullable();
            $table->string('image_3', 100)->nullable();
            $table->string('image_4', 100)->nullable();*/

            $table->string('title', 100);
            $table->string('catalog', 100);
            $table->string('category', 100);

            /*$table->string('color', 100)->nullable();*/

            $table->string('brand', 100);

            /*$table->string('size', 100)->nullable();*/

            $table->integer('price');


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
        Schema::dropIfExists('products');
    }
}
