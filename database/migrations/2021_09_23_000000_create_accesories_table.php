<?php
<<<<<<<< HEAD:database/migrations/2021_09_23_000000_create_accesories_table.php

========
>>>>>>>> 019c4790aa2941cbe8322bb8cd45bee9e887ad36:database/migrations/2021_09_23_000000_create_accessories_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccesoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<<< HEAD:database/migrations/2021_09_23_000000_create_accesories_table.php
        Schema::create('accesories', function (Blueprint $table) {
========

>>>>>>>> 019c4790aa2941cbe8322bb8cd45bee9e887ad36:database/migrations/2021_09_23_000000_create_accessories_table.php
            //['name', 'price','image']
            Schema::create('accessories', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->text('name');
            $table->integer('price');
            $table->text('image');
            $table->timestamps();
<<<<<<<< HEAD:database/migrations/2021_09_23_000000_create_accesories_table.php
        });
========

     });

>>>>>>>> 019c4790aa2941cbe8322bb8cd45bee9e887ad36:database/migrations/2021_09_23_000000_create_accessories_table.php
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accessories');
    }
<<<<<<<< HEAD:database/migrations/2021_09_23_000000_create_accesories_table.php
}
========

}
>>>>>>>> 019c4790aa2941cbe8322bb8cd45bee9e887ad36:database/migrations/2021_09_23_000000_create_accessories_table.php
