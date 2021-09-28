<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            //['quantity', 'order_id', 'handbag_id', 'accesory_id']
            $table->bigIncrements('id');
            $table->integer('quantity');
            $table->bigInteger('order_id',)->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->bigInteger('handbag_id')->unsigned()->nullable();
            $table->foreign('handbag_id')->references('id')->on('handbags');
            $table->bigInteger('accesory_id')->unsigned()->nullable();
            $table->foreign('accesory_id')->references('id')->on('accesories');
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
        Schema::dropIfExists('items');
    }
}
