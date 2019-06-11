<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductToMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_to_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('menu_id')->unsigned(); // id - ul menu - ului
            $table->integer('product_id')->unsigned(); // id - ul produsului 
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
        Schema::dropIfExists('product_to_menus');
    }
}
