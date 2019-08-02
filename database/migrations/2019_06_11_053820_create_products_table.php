<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('price');
            $table->integer('restaurant_id'); // id-ul restaurantului care adauga produsul
            $table->integer('weight'); // in grame
            $table->integer('protein'); // per 100 g
            $table->integer('fat'); // per 100 g
            $table->integer('carbo'); // per 100 g
            $table->integer('kcal'); // per 100 g
            $table->string('barcode');
            $table->integer('product_type')->default(1); // 1 - mic dejum / 2 - amiaza / 3 - cina / 4 - snack
            $table->string('image') -> default('product_picture.png');
            $table->integer('category'); // 1 - mancare sanatoasa / 2 - intre sanatos si nesanatos / 3 - nesanatoasa
            $table->integer('type'); // 1 - de mancat / 2 - de baut
            $table->integer('todo')->default(1); // 1 - de mancat / 2 - de baut
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
