<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            //['score','comentary','handbag_id','user_id']
            $table->bigIncrements('id');
            $table->text('comentary');
            $table->integer('score');
            $table->bigInteger('handbag_id',)->unsigned();
            $table->foreign('handbag_id')->references('id')->on('handbags');
            $table->bigInteger('user_id',)->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('orders');
    }
}
