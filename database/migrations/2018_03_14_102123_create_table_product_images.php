<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->integer('prod_id')
                    ->unsigned()
                    ->nullable();
            $table->foreign('prod_id')
                    ->references('prod_id')
                    ->on('product')
                    ->onDelete('cascade');
            $table->integer('img_id')
                    ->unsigned()
                    ->nullable();
            $table->foreign('img_id')
                    ->references('img_id')
                    ->on('images')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('product_images');
    }
}
