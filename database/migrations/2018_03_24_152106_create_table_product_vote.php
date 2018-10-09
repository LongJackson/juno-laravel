<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductVote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_vote', function (Blueprint $table) {
            $table->integer('prod_id')
                ->unsigned()
                ->nullable();
            $table->foreign('prod_id')
                ->references('prod_id')
                ->on('product')
                ->onDelete('cascade');
            $table->integer('vote_id')
                ->unsigned()
                ->nullable();
            $table->foreign('vote_id')
                ->references('vote_id')
                ->on('votes')
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
        Schema::dropIfExists('product_vote');
    }
}
