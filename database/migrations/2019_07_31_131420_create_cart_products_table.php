<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_products', function (Blueprint $table) {
            $table -> increments('id');
            $table -> unsignedInteger('user_id');
            $table -> unsignedInteger('product_id');
            $table -> unsignedInteger('quantity') -> nullable();
            $table -> softDeletes();
            $table -> timestamps();

            $table -> foreign('user_id') -> references('id') -> on('users') -> onDelete('cascade');

            $table -> foreign('product_id') -> references('id') -> on('products') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_products');
    }
}
