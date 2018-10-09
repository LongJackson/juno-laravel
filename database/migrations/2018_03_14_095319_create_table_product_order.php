<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_order', function (Blueprint $table) {
            $table->integer('prod_id')
                    ->unsigned()
                    ->nullable();
            $table->foreign('prod_id')
                    ->references('prod_id')
                    ->on('product')
                    ->onDelete('cascade');
            $table->integer('order_id')
                    ->unsigned()
                    ->nullable();
            $table->foreign('order_id')
                    ->references('order_id')
                    ->on('orders')
                    ->onDelete('cascade');
            $table->integer('qty');
            $table->integer('price');
            $table->text('options');
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
        Schema::dropIfExists('product_order');
    }
}
