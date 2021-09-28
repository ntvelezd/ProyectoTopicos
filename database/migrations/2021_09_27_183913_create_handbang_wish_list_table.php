<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHandbangWishListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('handbag_wish_list', function (Blueprint $table) {
            $table->bigInteger('wish_list_id')->unsigned();
            $table->bigInteger('handbag_id')->unsigned();
            $table->id();
            $table->timestamps();
            $table->foreign('wish_list_id')->references('id')->on('wish_lists');
            $table->foreign('handbag_id')->references('id')->on('handbags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('handbang_wish_list');
    }
}
