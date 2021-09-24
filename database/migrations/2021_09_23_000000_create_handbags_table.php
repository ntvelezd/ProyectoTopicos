<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHandbagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('handbags', function (Blueprint $table) {
            //['name', 'price', 'style', 'color', 'score', 'texture','image']
            $table->bigIncrements('id');
            $table->text('name');
            $table->integer('price');
            $table->text('style');
            $table->text('color');
            $table->integer('score');
            $table->text('texture');
            $table->text('image');
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
        Schema::dropIfExists('handbags');
    }
}
