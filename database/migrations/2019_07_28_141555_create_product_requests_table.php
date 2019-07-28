<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('weight'); // in grame
            $table->integer('protein'); // per 100 g
            $table->integer('fat'); // per 100 g
            $table->integer('carbo'); // per 100 g
            $table->integer('kcal'); // per 100 g
            $table->string('barcode');
            $table->string('image');
            $table->integer('category'); // 1 - mancare sanatoasa / 2 - intre sanatos si nesanatos / 3 - nesanatoasa
            $table->integer('type'); // 1 - de mancat / 2 - de baut
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
        Schema::dropIfExists('product_requests');
    }
}
